<?php
session_start();

// 세션확인해서 값이 있으면 confirm.php
if(isset($_SESSION['userId'])){
	header("Location:"."confirm.php");
	exit;
}
include "include/include_html.php";
?>

<body class="index">
	<div class="section section-full-screen section-signup">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="card card-signup">
						<form class="form" method="post" action="confirm.php">
							<div class="header header-primary text-center">
								<h3>익명 질문 사이트</h3>
								<div class="social-line">
									<i class="material-icons">mail</i>
								</div>
							</div>

							<div class="content">
								<div class="input-group id">
									<span class="input-group-addon index">
										<i class="material-icons">face</i>
									</span>
									<input type="text" class="form-control" name="id" placeholder="아이디">
								</div>

								<div class="input-group ps">
									<span class="input-group-addon index">
										<i class="material-icons">lock_outline</i>
									</span>
									<input type="password" name="password" placeholder="비밀번호" class="form-control" />
								</div>
							</div>
							<div class="footer text-center">
								<input type="submit" class="btn btn-primary" name="" value="Login">
								<p class="member_p">회원이 아니신가요? <a href="Sign_up.php">회원가입</a></p>
						  	<p>ID를 분실하셨나요? <a href="find.php">아이디/비밀번호 찾기</a></p>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>


</html>
