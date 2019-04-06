function formChk(){
  if(document.find_form.sign_up_qna.value==="" || document.find_form.sign_up_qna.value.replace(/(\s*)/g, "")===""){
   alert("질문을 골라주세요");
   find_form.sign_up_qna.focus();
   return false;
 }
 
}
