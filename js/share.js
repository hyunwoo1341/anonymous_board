
function copy_to_clipboard() {

	myInput.type = "text";
	$("#myInput").val(document.location.href);

	//url 복사
	var copyText = document.getElementById("myInput");
	copyText.select();
	document.execCommand("Copy");

	$(".share_ok").html("url이 복사되었습니다. url을 공유해 주세요.");
}
