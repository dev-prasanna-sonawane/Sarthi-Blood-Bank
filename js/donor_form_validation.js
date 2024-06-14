function validateform() {
  var returnvalue = true;
  var returnvalue_personal=true;
  var returnvalue_contact=true;
  var correct_name = /^[a-zA-z ]*$/;
  var correct_password_reset_answer = /^[a-z+# ]*$/;
  var name = document.getElementById("d_name").value;
  var age = document.getElementById("d_age").value;
  var mob1 = document.getElementById("d_mobile_no1").value;
  var mob2 = document.getElementById("d_mobile_no2").value;
  var email = document.getElementById("d_email").value;
  var pass = document.getElementById("d_password").value;
  var cpass = document.getElementById("d_cpassword").value;
  var password_reset_answer = document.getElementById(
    "password_reset_answer"
  ).value;

  if (!name.match(correct_name)) {
    document.getElementById("name_err").innerHTML =
      "* Name can only contain Alphabets";
    document.getElementById("d_name").style.color = "red";
    document.getElementById("d_name").style.fontWeight = "bold";
    document.getElementById("name_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_personal = false;
  } else {
    document.getElementById("name_err").innerHTML = "";
    document.getElementById("d_name").style.color = "black";
    document.getElementById("d_name").style.fontWeight = "normal";
    document.getElementById("name_error_logo").style.display = "none";
  }
  if (age < 16) {
    document.getElementById("age_err").innerHTML =
      "* You can't Donate Blood , Age should be above 17";
    document.getElementById("d_age").style.color = "red";
    document.getElementById("d_age").style.fontWeight = "bold";
    document.getElementById("age_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_personal = false;
  } else if (age > 100) {
    document.getElementById("age_err").innerHTML = "* Enter a Valid Age";
    document.getElementById("d_age").style.color = "red";
    document.getElementById("d_age").style.fontWeight = "bold";
    document.getElementById("age_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_personal = false;
  } else {
    document.getElementById("age_err").innerHTML = "";
    document.getElementById("d_age").style.color = "black";
    document.getElementById("d_age").style.fontWeight = "normal";
    document.getElementById("age_error_logo").style.display = "none";
  }

  if (mob1.length > 10) {
    document.getElementById("mobile_no1_err").innerHTML =
      "* Mobile Number Too Big, Mobile Number Should be 10 digits";
    document.getElementById("d_mobile_no1").style.color = "red";
    document.getElementById("d_mobile_no1").style.fontWeight = "bold";
    document.getElementById("mobile_no1_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else if (mob1.length < 10) {
    document.getElementById("mobile_no1_err").innerHTML =
      "* Mobile Number Too Small, Mobile Number Should be 10 digits";
    document.getElementById("d_mobile_no1").style.color = "red";
    document.getElementById("d_mobile_no1").style.fontWeight = "bold";
    document.getElementById("mobile_no1_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else {
    document.getElementById("mobile_no1_err").innerHTML = "";
    document.getElementById("d_mobile_no1").style.color = "black";
    document.getElementById("d_mobile_no1").style.fontWeight = "normal";
    document.getElementById("mobile_no1_error_logo").style.display = "none";
  }

  if (mob2.length < 10) {
    document.getElementById("mobile_no2_err").innerHTML =
      "* Alternate Mobile Number Too Small, Mobile Number Should be 10 digits";
    document.getElementById("d_mobile_no2").style.color = "red";
    document.getElementById("d_mobile_no2").style.fontWeight = "bold";
    document.getElementById("mobile_no2_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else if (mob2.length > 10) {
    document.getElementById("mobile_no2_err").innerHTML =
      "* Alternate Mobile Number Too Big, Mobile Number Should be 10 digits";
    document.getElementById("d_mobile_no2").style.color = "red";
    document.getElementById("d_mobile_no2").style.fontWeight = "bold";
    document.getElementById("mobile_no2_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else {
    document.getElementById("mobile_no2_err").innerHTML = "";
    document.getElementById("d_mobile_no2").style.color = "black";
    document.getElementById("d_mobile_no2").style.fontWeight = "normal";
    document.getElementById("mobile_no2_error_logo").style.display = "none";
  }

  if (email.length > 30) {
    document.getElementById("email_err").innerHTML =
      "* Email should not be bigger than 35 letters";
    document.getElementById("d_email").style.color = "red";
    document.getElementById("d_email").style.fontWeight = "bold";
    document.getElementById("email_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else {
    document.getElementById("email_err").innerHTML = "";
    document.getElementById("d_email").style.color = "black";
    document.getElementById("d_email").style.fontWeight = "normal";
    document.getElementById("email_error_logo").style.display = "none";
  }

  if (pass.length < 8 || pass.length > 15) {
    document.getElementById("password_err").innerHTML =
      "*Password Should be between 8 to 15 Characters";
    document.getElementById("d_password").style.color = "red";
    document.getElementById("d_password").style.fontWeight = "bold";
    document.getElementById("password_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else {
    document.getElementById("password_err").innerHTML = "";
    document.getElementById("d_password").style.color = "black";
    document.getElementById("d_password").style.fontWeight = "normal";
    document.getElementById("password_error_logo").style.display = "none";
  }

  if (cpass.length < 8 || cpass.length > 15) {
    document.getElementById("cpassword_err").innerHTML =
      "*Confirm Password Should be between 8 to 15 Characters";
    document.getElementById("d_cpassword").style.color = "red";
    document.getElementById("d_cpassword").style.fontWeight = "bold";
    document.getElementById("cpassword_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else if (pass != cpass) {
    document.getElementById("cpassword_err").innerHTML = "";
    document.getElementById("d_cpassword").style.color = "black";
    document.getElementById("d_cpassword").style.fontWeight = "normal";
    document.getElementById("cpassword_error_logo").style.display = "none";

    document.getElementById("cpassword_err").innerHTML =
      "*Passwords does Not Match!!";
    document.getElementById("d_cpassword").style.color = "red";
    document.getElementById("d_cpassword").style.fontWeight = "bold";
    document.getElementById("cpassword_error_logo").style.display = "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else {
    document.getElementById("cpassword_err").innerHTML = "";
    document.getElementById("d_cpassword").style.color = "black";
    document.getElementById("d_cpassword").style.fontWeight = "normal";
    document.getElementById("cpassword_error_logo").style.display = "none";
  }

  if (!password_reset_answer.match(correct_password_reset_answer)) {
    document.getElementById("password_reset_answer_err").innerHTML =
      "*Security question should only include Lowercase Alphabets and +,#";
    document.getElementById("password_reset_answer").style.color = "red";
    document.getElementById("password_reset_answer").style.fontWeight = "bold";
    document.getElementById("password_reset_answer_error_logo").style.display =
    "inline";
    returnvalue = false;
    returnvalue_contact = false;
  } else {
    document.getElementById("password_reset_answer_err").innerHTML = "";
    document.getElementById("password_reset_answer").style.color = "black";
    document.getElementById("password_reset_answer").style.fontWeight =
      "normal";
    document.getElementById("password_reset_answer_error_logo").style.display =
      "none";
  }

  if(returnvalue_personal==false){
    window.scrollTo(0, 200);
    
  }else if(returnvalue_contact==false)
  {
    window.scrollTo(0,600);
  }
  return returnvalue;
}
