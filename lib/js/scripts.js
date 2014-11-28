function validate(){
  var hasError = false;
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  
  var nameVal=$("#fullName").val();
  if(nameVal==''){
    $("#error1").html('Please enter your name.');
     hasError = true;
  }else{
    $("#error1").html('');
  }
        
  var emailVal=$("#emailAddr").val();
  if(emailVal==''){
    $("#error2").html('Please enter your email address.');
    hasError = true;
  }else if(!emailReg.test(emailVal)){
    $("#error2").html('Pleas enter a valid email address.');
    hasError = true;
  }else{
    $("#error2").html('')
  }
  
  var phoneVal=$("#phoneNum").val();
  if(phoneVal==''){
    $("#error3").html('Please enter your phone number.');
    hasError = true;
  }else{
    $("#error3").html('');
  }
  
  var messageVal=$("#messageText").val();
  if(messageVal==''){
    $("#error4").html('Please enter your message.');
    hasError = true;
  }else{
    $("#error4").html('');
  }
  
  if(hasError==false){
    $(".error").hide();
    return true;
  }else{
    $(".error").show();
    return false;
  }
}
