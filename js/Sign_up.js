//빈칸 있으면 제출 안됨
//비밀번호 두개 일치 한지 안한지. -->
alert("355");
var click_check = false;
var check_result = "";
var p_class = "";

var click_check_email = false;
var email_check = "";


function formChk(){

	   if(document.sign_up.id.value==="" || document.sign_up.id.value.replace(/(\s*)/g, "")===""){
			alert("아이디를 입력해주세요");
			sign_up.id.focus();
			return false;
	   }else if(document.sign_up.password.value==="" || document.sign_up.password.value.replace(/(\s*)/g, "")===""){
			alert("비밀번호를 입력해 주세요");
			sign_up.password.focus();
			return false;
	   }else if(document.sign_up.password_confirm.value==="" || document.sign_up.password_confirm.value.replace(/(\s*)/g, "")===""){
			alert("비밀번호를 입력해 주세요");
			sign_up.password_confirm.focus();
			return false;
	   }else if(document.sign_up.name.value==="" || document.sign_up.name.value.replace(/(\s*)/g, "")===""){
			alert("성함을 입력해 주세요.");
			sign_up.name.focus();
			return false;
	   }else if(document.sign_up.e_mail.value==="" || document.sign_up.e_mail.value.replace(/(\s*)/g, "")===""){
			alert("이메일을 입력해 주세요.");
			sign_up.e_mail.focus();
			return false;
	   }else if(document.sign_up.sign_up_qna.value==="" || document.sign_up.sign_up_qna.value.replace(/(\s*)/g, "")===""){
 			alert("질문을 골라주세요");
 			sign_up.sign_up_qna.focus();
 			return false;
 		}else if(document.sign_up.sign_up_anwser.value==="" || document.sign_up.sign_up_anwser.value.replace(/(\s*)/g, "")===""){
			alert("질문/답변을 적어주세요");
			sign_up.sign_up_anwser.focus();
			return false;
		}else if(document.sign_up.password.value !== document.sign_up.password_confirm.value ){
		 alert("비밀번호를 동일하게 입력해주세요");
		 sign_up.password_confirm.focus();
		 return false;
		}else if(click_check === false){
			alert("아이디 중복체크 버튼을 눌러주세요");
			return false;
		}else if(click_check_email === false){
			alert("이메일 중복체크 버튼을 눌러주세요");
			return false;
		}else if(p_class === 0){
			alert("다른 아이디를 입력하세요");
			click_check = false;
			return false;
		}else if(email_check === false){
			alert("다른 이메일을 입력해 주세요");
			return false;
		}


	if(document.change_pwd.password.value==="" || document.change_pwd.password.value.replace(/(\s*)/g, "")===""){
	 alert("빈칸을 채워 주세요");
	 change_pwd.password.focus();
	 return false;
	}else if(document.change_pwd.password_confirm.value==="" || document.change_pwd.password_confirm.value.replace(/(\s*)/g, "")===""){
	 alert("빈칸을 채워 주세요");
	 change_pwd.password_confirm.focus();
	 return false;
 }
}

//아이디 중복 체크
	$('.id_check').click(function(){
			click_check = true;
			var regType1 = /^[A-Za-z0-9+]{0,20}$/;
			var id = $('#id').val();

			//한글입력 방지
			if (!regType1.test(id)) {
				p_class = 0;
				$('.id_check_result').html("<p class='0'>영문으로 작성해주세요</p>");

				return false;
			}

      $.ajax({
          type: "post",
          url : "check.php",
          data : {
              id
          },
        success : function s(a){
					$('.id_check_result').html(a);

					if($('.id_check_result').find("p").hasClass("0")){
				   	p_class = 0;
					   }else{
						p_class = 1;
					   }
			},
          error : function error(){ alert('시스템 문제발생');}
      });
  });


//이메일 중복 체크
$('.email_check').click(function(){

	var email_val = $('.form-control.e_mail').val();
	var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;
	if(exptext.test(email_val)==false){

		//이메일 형식이 알파벳+숫자@알파벳+숫자.알파벳+숫자 형식이 아닐경우
		$('.email_check_result').html("이메일 형식이 올바르지 않습니다.");
		sign_up.e_mail.focus();
		email_check = false;
		return false;
	}

	click_check_email = true;
	$.ajax({
			type: "post",
			url : "check.php",
			data : {email_val},
		success : function s(a){


			// 중복된 값이 있으면 상위 변수(email_check)에 false를 넣는다.
			if($('.id_check_result').find("p").hasClass("0")){
					email_check = false;
				 }else{
					 // 사용가능한 이메일이면 email_check 에 true를 넣는다.
				 	email_check = true;
				 }

				 // 결과값 문구가 뜬다.
	 			$('.email_check_result').html(a);
	},
			error : function error(){ alert('시스템 문제발생');}
	});

});






// submit 눌러도 email_check = false면 넘어가지 않게 한다.
//
