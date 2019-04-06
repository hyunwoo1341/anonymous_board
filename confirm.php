<?php
session_start();
//1. DB 연결

include 'mydb.php';
$pdo = db_connect();

//세션이 있다면
  if(isset($_SESSION['userId'])){
		$id = $_SESSION['userId'];
		header("Location:"."list.php?$id");
  }else{
	$id = $_POST['id'];
	$password = $_POST['password'];
	$password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);  //비밀번호 해쉬화
  }

  if ($id == "" || $password == "") {
	echo "<script>
		alert(\"아이디와 비밀번호를 입력해 주세요.\");
		history.back();
	  </script>";
  }else {
	//아이디 , 비밀번호 db 확인
	  $sql = "SELECT * FROM Login WHERE id = :id";
	  $stmh = $pdo->prepare($sql);
	  $stmh->bindValue(':id',$id,PDO::PARAM_STR);
	  $stmh->execute();
	  $row = $stmh->fetch(PDO::FETCH_ASSOC);

	  if(password_verify($password,$row['password'])) {
    $_SESSION['userId'] = $id;
		header("Location:"."list.php?$id");
		} else {
			echo "<script>
			alert(\"아이디와 비밀번호를 확인해 주세요.\");
			history.back();
			</script>";
		}

  }
 ?>
