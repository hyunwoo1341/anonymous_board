<?php
echo "<link rel=stylesheet href='css/style.css' type='text/css'>";
$id = $_SERVER['QUERY_STRING'];
include "include/include_html.php";


?>


<!-- <form action="insert.php" method="POST" name="sign_up" onSubmit="return formChk();">
	새 비밀번호:<input type="password" name="password" value="" class="form-control">
	비밀번호 확인: <input type="password" name="password_confirm" value="" class="form-control"><br>
	<input type="submit" name="" value="변경">
	<input type="hidden" name="change_ps" value="change_ps">
	<input type="hidden" name="change_id" value="<?=$id?>">
</form> -->
<body>


<div class="section section-full-screen section-signup">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="card card-signup">
					<form class="form" action="insert.php" method="POST" name="change_pwd" onSubmit="return formChk();">
						<div class="header header-primary text-center">
							<h3>비밀번호 변경</h3>
							<div class="social-line">
							</div>
						</div>
						<div class="content">
							<div class="input-group">
								<span class="input-group-addon">
								</span>
								<h3 class="change_ps_h3">아이디 : <?=$id?></h3>
								<input type="password" name="password"  class="form-control" placeholder="새 비밀번호" value="">
								<input type="password" name="password_confirm"  class="form-control" placeholder="비밀번호 확인" value=""><br>
								<input type="submit" name="" value="변경" class="btn btn-primary">
								<input type="hidden" name="change_ps" value="change_ps">
								<input type="hidden" name="change_id" value="<?=$id?>">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script>

	<script type="text/javascript">
	//유효성 검사
	function formChk(){
		if(document.change_pwd.password.value==="" || document.change_pwd.password.value.replace(/(\s*)/g, "")===""){
		alert("비밀번호를 입력해 주세요");
		change_pwd.password.focus();
		return false;
	 }else if(document.change_pwd.password_confirm.value==="" || document.change_pwd.password_confirm.value.replace(/(\s*)/g, "")===""){
		alert("비밀번호를 입력해 주세요");
		change_pwd.password_confirm.focus();
		return false;
	}else if(document.change_pwd.password.value !== document.change_pwd.password_confirm.value ){
		alert("비밀번호를 동일하게 입력해주세요");
		change_pwd.password_confirm.focus();
		return false;
	 }
	}

	</script>
