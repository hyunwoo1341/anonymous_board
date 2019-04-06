<?php
echo "<link rel=stylesheet href='css/style.css' type='text/css'>";
include "include/include_html.php";

?>

<body class="index">
	<div class="section section-full-screen section-signup find">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="card card-signup">
						<form class="form" method="post" name="find_form" action="insert.php" onSubmit="return formChk()">
							<div class="header header-primary text-center">
								<h3>아이디/비밀번호 찾기</h3>
								<div class="social-line">
									<i class="material-icons">face</i>
								</div>
							</div>

							<div class="content">
								<div class="input-group id">
									<span class="input-group-addon">
									</span>
									<input type="text" class="form-control" name="name" placeholder="이름">
									<input type="text" name="email" value="" class="form-control" placeholder="Email">
									<p class="find_p">회원가입 하셨을때 선택하셨던 질문답변을 적어주세요.</p><br>
									<select name="sign_up_qna"  class="custom-select">
										<option value="" selected>질문을 골라주세요.</option>
										<option value="treasure">당신의 보물 1호는?</option>
										<option value="pet">당신의 애완동물 이름은?</option>
										<option value="food">좋아하는 음식은?</option>
										<option value="car">좋아하는 차 종류는?</option>
							  	</select>
										<input type="textarea" class="form-control" name="sign_up_anwser" placeholder="답변"><br>
								</div>
							</div>
							<div class="footer text-center">
								<input type="submit" class="btn btn-primary" name="" value="찾기"><br>
								<input type="hidden" name="find" value="find">
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
<script src="js/find.js"></script>
