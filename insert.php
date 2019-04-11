<?php
	session_start();
	include 'mydb.php';
	$pdo = db_connect();


	//질문할 시
	if(isset($_POST['action_qna']) && $_POST['action_qna'] === "qna"){

	//질문한 내용 db에 넣기 ㅇ.
	$sql = "INSERT INTO qna_list (qna,id) VALUES (:qna,:id)";
	$stmh = $pdo->prepare($sql);
	$stmh->bindValue(':qna',$_POST['qna'],PDO::PARAM_STR);
	$stmh->bindValue(':id',$_POST['Id'],PDO::PARAM_STR);
	$stmh->execute();
	$hostname=$_SERVER["HTTP_REFERER"];
	// echo "<script>
	// 			alert('질문되었습니다. 상대방의 답변을 기다려주세요');
	// 			window.histroy.go(-1);
	// 			</script>";

	// $_SERVER["HTTP_REFERER"] 현재 페이지로 오기전 주소값.
	header('Location: ' . $_SERVER["HTTP_REFERER"] );
	// window.location.href = "$_SERVER['HTTP_REFERER']";

	}

	//답변하기 누를 시
	if(isset($_POST['action']) && $_POST['action'] == "answer_update"){
		//질문/답변한 내용을 디비에 넣는다.
		// echo "질문 :" .$_POST['answer_qna'];
		// echo "답변 :" .$_POST['answer'];

		$sql = "INSERT INTO qna_answer (qna,answer,id) VALUES (:answer_qna,:answer,:id)";
		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':answer_qna',$_POST['answer_qna'],PDO::PARAM_STR);
		$stmh->bindValue(':answer',$_POST['answer'],PDO::PARAM_STR);
		$stmh->bindValue(':id',$_POST['answer_qna_id0'],PDO::PARAM_STR);
		$stmh->execute();

		$sql = "Delete FROM qna_list Where _id = :id";
		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':id',$_POST['answer_qna_id'],PDO::PARAM_STR);
		$stmh->execute();
		// echo "<script>
		// 			alert('답변되었습니다.');
		// 			window.location = list.php".$_SESSION['id']."
		//       </script>";
		header('Location: ' . $_SERVER["HTTP_REFERER"] );
	}
	//거절하기 누를 시
	if(isset($_SERVER['QUERY_STRING'])){
		$sql = "Delete FROM qna_list Where _id = :id";
		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':id',$_SERVER['QUERY_STRING'],PDO::PARAM_STR);
		$stmh->execute();
		 echo "<script>
        	history.back();
		      </script>";
	}

	//회원가입
	if(isset($_POST['sign_up']) && $_POST['sign_up'] == "sign_up"){
		$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

		//입력받은 아이디 / 비밀번호는 디비에 넣는다.
		//비밀번호는 해쉬화
		$sql = "INSERT INTO Login (id,password) VALUES (:id,:password);	";
		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':id',$_POST['id'],PDO::PARAM_STR);
		$stmh->bindValue(':password',$hash,PDO::PARAM_STR);
		$stmh->execute();

		$sql1 = "INSERT INTO user_info (id,name,qna,answer,email) VALUES (:id,:name,:qna,:answer,:email);";
		$stmh = $pdo->prepare($sql1);
		$stmh->bindValue(':id',$_POST['id'],PDO::PARAM_STR);
		$stmh->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
		$stmh->bindValue(':qna',$_POST['sign_up_qna'],PDO::PARAM_STR);
		$stmh->bindValue(':answer',$_POST['sign_up_anwser'],PDO::PARAM_STR);
		$stmh->bindValue(':email',$_POST['e_mail'],PDO::PARAM_STR);
		$stmh->execute();

		echo "<script>
			alert('회원가입 되었습니다.');
			window.location = 'index.php';
			</script>";
		}


	//아디/비번 찾기
	if(isset($_POST['find']) && $_POST['find'] == 'find'){
	// 디비에서 이름/qna(select) / answer의 값이 일치하는 것을 찾는다.

		$sql = "select * from user_info where name = :name AND qna = :qna AND answer = :answer AND email = :email";

		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
		$stmh->bindValue(':qna',$_POST['sign_up_qna'],PDO::PARAM_STR);
		$stmh->bindValue(':answer',$_POST['sign_up_anwser'],PDO::PARAM_STR);
		$stmh->bindValue(':email',$_POST['email'],PDO::PARAM_STR);

		try
		{
		$stmh->execute();

		}
		catch (PDOException $e)
		{
			return "some fail-messages";
			// echo $e->getMessage();
		}

		$row = $stmh->fetch(PDO::FETCH_ASSOC);
		$id =$row['id'];
		// 값이 있으면 새로운 페이지에서 아이디 값을 뱉고 새 비밀번호 입력하게 한다.
		if(isset($row['id'])){
			header("Location:"."change_ps.php?$id");
		}else{
			 echo "<script>
				alert('맞는 정보가 없습니다.');
				window.location = 'find.php';
				</script>";
		}
	}

	//비밀번호 변경
	if(isset($_POST['change_ps']) && $_POST['change_ps'] == 'change_ps'){
		$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
	//비밀번호는 Login 테이블 변경하려는 아이디값 찾고 해쉬 넣어서 업데이트
		$sql = "UPDATE Login SET password = :password WHERE id = :id";

		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(':password',$hash,PDO::PARAM_STR);
		$stmh->bindValue(':id',$_POST['change_id'],PDO::PARAM_STR);
		$stmh->execute();

		 echo "<script>
				alert('비밀번호가 변경 되었습니다.');
				window.location = 'index.php';
				</script>";
	}
?>
