// form 초기화
document.qna_box.qna.value="";
$(".answer_box textarea").val("");

//사이드바 클릭
$(".side_listBar .home").click(function(){
	var hostUrl = window.location.hostname;
	console.log(hostUrl);
	window.location.href = "logout.php";

});

$(".side_listBar .top").click(function(){
	$('html, body').animate({ scrollTop: 0 }, 'fast');
});

$(".side_listBar .bottom").click(function(){
	$('html, body').animate({ scrollTop: $(document).height() }, 'fast');
});


var answer = $(".answer");
var answer_box = $(".answer_box");


$(".answer").click(function(){
	var status_box = $(this).parent().find(".answer_box");

	//답변하기 누르면 입력창 보여지게 ㅇ
	if(status_box.hasClass("block")){
		status_box.removeClass("block");
		status_box.css("display","none");
	}else{
		status_box.addClass("block");
		status_box.css("display","block");
	}
});

// 텍스트상자 빈칸일 시 submit 안되게
function check($form,select) {

	if($form === "q"){

		if(document.qna_box.qna.value==="" || document.qna_box.qna.value.replace(/(\s*)/g, "")===""){
			alert("공백이네요?");
			qna_box.qna.focus();
			return false;
		}
	alert('질문이 전송되었습니다. 상대방의 답변을 기다려주세요');
	}

//답변하기 빈칸 허용 안되게
	if($form === 'a'){
			var answer_textArea = $(select).find("textarea").val();
			if(answer_textArea === "" || answer_textArea.replace(/(\s*)/g, "")===""){
				alert("빈칸을 채워 주세요");
				return false;
			}
		alert('답변완료');
	}
	
	
}
