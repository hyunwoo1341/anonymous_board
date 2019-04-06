<?php
	include 'mydb.php';
	$pdo = db_connect();


	if (isset($_POST['id'])) {
		$idch = $_POST['id'];

		$sql = "SELECT * FROM Login WHERE id = :id";
		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':id',$idch,PDO::PARAM_STR);
		$stmh->execute();
		$row = $stmh->fetch(PDO::FETCH_ASSOC);

		// 아이디 중복 확인
			if($idch == ""){
			echo "<p class='0'>아이디를 입력해주세요</p>";
			}else if ($row == 0){
			echo "<p class='1'>사용가능 합니다</p>";
			}else{
			echo "<p class='0'>중복된 아이디가 있습니다</p>";
			}
	}
?>

<!-- 이메일 중복확인 -->
<?php
if (isset($_POST['email_val'])) {
	$emailch = $_POST['email_val'];

	$sql = "SELECT * FROM user_info WHERE email = :email";
	$stmh = $pdo->prepare($sql);
	$stmh->bindValue(':email',$emailch,PDO::PARAM_STR);
	$stmh->execute();
	$row = $stmh->fetch(PDO::FETCH_ASSOC);

	if ($emailch == "") {
		echo "<p class='0'>이메일을 입력 해주세요</p>";
	}else if ($row == 0) {
		echo "<p class='1'>사용가능 합니다.</p>";
	}else{
		echo "<p class='0'>중복된 이메일이 있습니다.</p>";
	}
}
 ?>
