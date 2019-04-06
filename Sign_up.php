<?php
echo "<link rel=stylesheet href='css/style.css' type='text/css'>";

//디비 연결 인크루드
include "mydb.php";
include "include/include_html.php";
$pdo = db_connect();
?>

<body class="index">
	<div class="section section-full-screen section-signup sign_up">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="card card-signup form">
						<form action="insert.php" class="form" method="POST" name="sign_up" onSubmit="return formChk();">
							<div class="header header-primary text-center">
								<h3>회원가입 페이지</h3>
								<div class="social-line">
									<i class="material-icons">assignment</i>
								</div>
							</div>

							<div class="content">
								<div class="input-group id">
									<span class="input-group-addon">
									</span>
									<input type="text" class="form-control" name="id" id="id" placeholder="아이디">
									<span class="id_check btn btn-primary">아이디 중복확인</span>
									<p class="id_check_result"></p>
								</div>

								<div class="input-group ps">
									<span class="input-group-addon">
									</span>
									<input type="password" name="password"  placeholder="비밀번호" class="form-control">
									<input type="password" name="password_confirm"  placeholder="비밀번호 확인" class="form-control">
									<input type="text" name="name" placeholder="이름" class="form-control">
									<input type="text" name="e_mail" value="" class="form-control e_mail" placeholder="이메일">
									<span class="email_check btn btn-primary">이메일 중복확인</span><br>
									<p class="email_check_result"></p>
									<select name="sign_up_qna"  class="custom-select">
										<option value="" selected>질문을 골라주세요.</option>
										<option value="treasure">당신의 보물 1호는?</option>
										<option value="pet">당신의 애완동물 이름은?</option>
										<option value="food">좋아하는 음식은?</option>
										<option value="car">좋아하는 차 종류는?</option>
								  	</select>
									<input type="textarea" name="sign_up_anwser" placeholder="답변" class="form-control sign_up_anwser"><br>
								</div>
							</div>
							<div class="footer text-center">
								<input type="submit" class="submit btn btn-primary" name="" value="회원가입"><br>
								<input type="hidden" name="sign_up" value="sign_up">
								<a href="index.php">뒤로가기</a></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>
<script src="js/Sign_up.js"></script>
