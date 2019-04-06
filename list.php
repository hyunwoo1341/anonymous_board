<?php
session_start();
include 'mydb.php';
include "include/include_html.php";



// //n분 뒤 세션 종료.
// if(isset($_SESSION['last_action'])){
//     $secondsInactive = time() - $_SESSION['last_action'];
//
//     $expireAfterSeconds = 1800;
//     if($secondsInactive >= $expireAfterSeconds){
//         session_unset();
//         session_destroy();
//     }
//
// }
// $_SESSION['last_action'] = time();

//세션 없을 시 다시 로그인 페이지로.
// if(!isset($_SESSION['userId'])){
// 	header("Location:"."index.php");
// 	exit();
// }


$pdo = db_connect();
?>

<div class="wrapper list">

<div class="side_listBar">
	<ul>
		<li class="top">
			<i class="material-icons">expand_less</i>
			<p class="">맨위로</p>
		</li>
		<br>
		<li class="bottom">
			<i class="material-icons">expand_more</i>
			<p class="">맨아래로</p>
		</li>
	</ul>
</div>

<div class="log_out list">
		<a href="logout.php">< 로그인</a>
</div>


<!-- 링크복사 -->
<div class="container link">
  <div class="row">
    <div class="col">
      <div class="card card-signup">
        <div class="header header-primary text-center">
          <h3>링크 공유</h3>
          <div class="link_share_box">
            <input type="hidden" id="myInput" value="">
            <button onclick="copy_to_clipboard()" class="link_share">링크복사</button><br>
            <span class="share_ok"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- 질문하기 form-->

<div class="container qna">
  <div class="row">
    <div class="col">
      <div class="card card-signup">
        <div class="header header-primary text-center">
          <h3>질문하기</h3>

					<form  action="insert.php" method="post" class="qna_box" name="qna_box" onsubmit="return check('q'); ">
		        <textarea name="qna"  value="" maxlength=120 style="width:50%; color:black"></textarea><br>
		        <input type="submit" name="" value="질문하기" style="color:black">
		        <input type="hidden" name="action_qna" value="qna">
		        <input type="hidden" name="Id" value="<?=$_SERVER['QUERY_STRING']?>">
		      </form>

        </div>
      </div>
    </div>
  </div>
</div>


<?php
//디비에서 질문답변 리스트 가져오기.
$sql = "SELECT * FROM qna_answer Where answer is not null AND id = :id order by _id desc";
$stmh = $pdo->prepare($sql);
$stmh->bindValue(':id',$_SERVER['QUERY_STRING'],PDO::PARAM_STR);
$stmh->execute();
?>
<!-- 질문답변 리스트 -->
<div class="section section-full-screen section-signup list">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card card-signup">
          <div class="header header-primary text-center">
            <h3>질문/답변 리스트</h3>
            <div class="social-line">
              <i class="material-icons">mail</i>
            </div>
          </div>
          <form class="form list" method="post" action="confirm.php">
            <?php
            while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
              ?>

            <div class="content">
              <div class="input-group id">
                <span class="input-group-addon">
                  <i class="material-icons">face</i>
                </span>
                <span><?=$row["qna"]?></span>
              </div>

              <div class="input-group ps">
                <span class="input-group-addon">
                  <i class="material-icons">check</i>
                </span>
                <span><?=$row["answer"]?></span>
              </div>
            </div>
            <hr>
            <?php
          }
        ?>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php
//세션 아이디와 url 파라미터가 같으면 본인.
if(isset($_SESSION['userId']) && $_SESSION['userId'] === $_SERVER['QUERY_STRING']){

	/*본인페이지라면 질문하기 버튼 안보이게*/
	echo "<script>
		$('.container.qna').css('display','none');
		$('.log_out.list a').html('로그아웃');
		</script>";

	//질문한 리스트
	$sql = "SELECT * FROM qna_list Where id = :id order by _id desc";
	$stmh = $pdo->prepare($sql);
	$stmh->bindValue(':id',$_SESSION['userId'],PDO::PARAM_STR);
	$stmh->execute();
	?>
<!-- 보내온 질문/ 답변/거절 폼-->

<div class="container qna_list">
  <div class="row">
    <div class="col">
      <div class="card card-signup">
        <div class="header header-primary text-center">
          <h3>질문 리스트</h3>
          <div class="social-line">
            <i class="material-icons">mail</i>
          </div>
            <div class="my_qna_list">
              <hr>

	<?php
	while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
	  // echo $row["_id"] ." ". $row['qna'];
	?>

      <div class="my_qna_list_box">
        <h2>질문 : <?=$row["qna"]?></h2>
        <a class="answer"> 답변하기 </a>
        <a href="insert.php?<?=$row["_id"]?>" class="reject">&nbsp;&nbsp;거절하기</a>

        <form action="insert.php" method="post" class="answer_box" name="answer_box" onsubmit="return check('a',this)">
          <textarea name="answer" class="my_qna_list_box_textarea"  rows="2" cols="80" value=""></textarea>
          <input type="submit" name="" value="제출">
          <INPUT type="hidden" name="action" value="answer_update">
          <INPUT type="hidden" name="answer_qna" value="<?=$row['qna']?>">
          <INPUT type="hidden" name="answer_qna_id" value="<?=$row['_id']?>">
          <INPUT type="hidden" name="answer_qna_id0" value="<?=$row['id']?>">
        </form>
      </div>
      <hr>

<?php
echo "<br>";
}
?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
  </div>
</div>
<script
src="https://code.jquery.com/jquery-1.12.4.min.js"
integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
crossorigin="anonymous"></script>
<script src="js/share.js"></script>
<script src="js/list.js"></script>
