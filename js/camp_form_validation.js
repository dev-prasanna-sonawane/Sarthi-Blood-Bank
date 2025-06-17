function validate_form() {
  let returnvalue = true;
  let correct_name = /^[a-zA-z ]*$/;
  let returnvalue_org = true;
  let returnvalue_camp = true;
  let org_name = document.getElementById("org_name").value;
  let o_name = document.getElementById("o_name").value;
  let o_mobile_no = document.getElementById("o_mobile_no").value;
  let o_email = document.getElementById("o_email").value;
  let co_name = document.getElementById("co_name").value;
  let co_mobile_no = document.getElementById("co_mobile_no").value;
  let c_name = document.getElementById("c_name").value;
  let c_date = new Date(document.getElementById("c_date").value);
  let today = new Date();
  let c_start_time = document.getElementById("start_time").value;
  let c_end_time = document.getElementById("end_time").value;

  if (!org_name.match(correct_name)) {
    document.getElementById("org_name_err_msg").innerHTML =
      "* Organization Name can only conatin Alphabets";
    document.getElementById("org_name").style.color = "red";
    document.getElementById("org_name").style.fontWeight = "bold";
    document.getElementById("org_name_error_logo").style.display = "inline";
    returnvalue_org = false;
    returnvalue = false;
  } else {
    document.getElementById("org_name_err_msg").innerHTML = "";
    document.getElementById("org_name").style.fontWeight = "normal";
    document.getElementById("org_name").style.color = "black";
    document.getElementById("org_name_error_logo").style.display = "none";
  }
  
  if (!o_name.match(correct_name)) {
    document.getElementById("o_name_err_msg").innerHTML =
    "* Organizer Name can only conatin Alphabets";
    document.getElementById("o_name").style.color = "red";
    document.getElementById("o_name").style.fontWeight = "bold";
    document.getElementById("o_name_error_logo").style.display = "inline";
    returnvalue_org = false;
    returnvalue = false;
  } else {
    document.getElementById("o_name_err_msg").innerHTML = "";
    document.getElementById("o_name").style.fontWeight = "normal";
    document.getElementById("o_name").style.color = "black";
    document.getElementById("o_name_error_logo").style.display = "none";
  }
  
  if (o_mobile_no.length > 10) {
    document.getElementById("o_mobile_no_err_msg").innerHTML =
    "* Organizer Mobile Number Too Big, Mobile Number Should be 10 digits";
    document.getElementById("o_mobile_no").style.color = "red";
    document.getElementById("o_mobile_no").style.fontWeight = "bold";
    document.getElementById("o_mobile_no_error_logo").style.display = "inline";
    returnvalue_org = false;
    returnvalue = false;
  } else if (o_mobile_no.length < 10) {
    document.getElementById("o_mobile_no_err_msg").innerHTML =
    "* Organizer Mobile Number Too Small, Mobile Number Should be 10 digits";
    document.getElementById("o_mobile_no").style.color = "red";
    document.getElementById("o_mobile_no").style.fontWeight = "bold";
    document.getElementById("o_mobile_no_error_logo").style.display = "inline";
    returnvalue_org = false;
    returnvalue = false;
  } else {
    document.getElementById("o_mobile_no_err_msg").innerHTML = "";
    document.getElementById("o_mobile_no").style.fontWeight = "normal";
    document.getElementById("o_mobile_no").style.color = "black";
    document.getElementById("o_mobile_no_error_logo").style.display = "none";
  }
  
  if (o_email.length >30) {
    document.getElementById("o_email_err_msg").innerHTML =
    "* Email should not be bigger than 35 letters";
    document.getElementById("o_email").style.color = "red";
    document.getElementById("o_email").style.fontWeight = "bold";
    document.getElementById("o_email_error_logo").style.display = "inline";
    returnvalue_org = false;
    returnvalue = false;
  }else {
    document.getElementById("o_email").style.fontWeight ="normal";
    document.getElementById("o_email").style.color = "black";
    document.getElementById("o_email_error_logo").style.display = "none";
    document.getElementById("o_email_err_msg").innerHTML = "";
  }
  
  if (!co_name.match(correct_name)) {
    document.getElementById("co_name_err_msg").innerHTML =
    "* Co-Organizer Name can Contain only Alphabets";
    document.getElementById("co_name").style.color = "red";
    document.getElementById("co_name").style.fontWeight = "bold";
    document.getElementById("co_name_error_logo").style.display = "inline";
    returnvalue_org = false;
    returnvalue = false;
  } else {
    document.getElementById("co_name_err_msg").innerHTML = "";
    document.getElementById("co_name").style.fontWeight = "normal";
    document.getElementById("co_name").style.color = "black";
    document.getElementById("co_name_error_logo").style.display = "none";
  }
  
  if (co_mobile_no.length > 10) {
    document.getElementById("co_mobile_no_err_msg").innerHTML =
    "* Co-Organizer Mobile Number Too Big, Mobile Number Should be 10 digits";
    document.getElementById("co_mobile_no").style.color = "red";
    document.getElementById("co_mobile_no").style.fontWeight = "bold";
    document.getElementById("co_mobile_no_error_logo").style.display = "inline";
    returnvalue_org = false;
    returnvalue = false;
  } else if (co_mobile_no.length < 10) {
    document.getElementById("co_mobile_no_err_msg").innerHTML =
    "* Co-Organizer Mobile Number Too Small, Mobile Number Should be 10 digits";
    document.getElementById("co_mobile_no").style.color = "red";
    document.getElementById("co_mobile_no").style.fontWeight = "bold";
    document.getElementById("co_mobile_no_error_logo").style.display = "inline";
    returnvalue_org = false;
    returnvalue = false;
  } else {
    document.getElementById("co_mobile_no_err_msg").innerHTML = "";
    document.getElementById("co_mobile_no").style.fontWeight = "normal";
    document.getElementById("co_mobile_no").style.color = "black";
    document.getElementById("co_mobile_no_error_logo").style.display = "none";
  }
  
  if (!c_name.match(correct_name)) {
    document.getElementById("c_name_err_msg").innerHTML =
    "* Camp Name can Contain only Alphabets";
    document.getElementById("c_name").style.color = "red";
    document.getElementById("c_name").style.fontWeight = "bold";
    document.getElementById("c_name_error_logo").style.display = "inline";
    returnvalue_camp= false;
    returnvalue = false;
  } else {
    document.getElementById("c_name_err_msg").innerHTML = "";
    document.getElementById("c_name").style.fontWeight = "normal";
    document.getElementById("c_name").style.color = "black";
    document.getElementById("c_name_error_logo").style.display = "none";
  }

  if (c_date < today) {
    document.getElementById("c_date_err_msg").innerHTML =
    "* Date should be in the future";
    document.getElementById("c_date").style.color = "red";
    document.getElementById("c_date").style.fontWeight = "bold";
    document.getElementById("c_date_error_logo").style.display = "inline";
    returnvalue_camp= false;
    returnvalue = false;
  } else {
    document.getElementById("c_date_err_msg").innerHTML = "";
    document.getElementById("c_date").style.fontWeight = "normal";
    document.getElementById("c_date").style.color = "black";
    document.getElementById("c_date_error_logo").style.display = "none";
  }

  if (c_start_time >= c_end_time) {
    document.getElementById("c_end_time_err_msg").innerHTML =
      "* End time should be after Start time";
    document.getElementById("end_time").style.color = "red";
    document.getElementById("end_time").style.fontWeight = "bold";
    document.getElementById("c_end_time_error_logo").style.display = "inline";
    returnvalue = false;
  } else {
    document.getElementById("c_end_time_err_msg").innerHTML = "";
    document.getElementById("end_time").style.fontWeight = "normal";
    document.getElementById("end_time").style.color = "black";
    document.getElementById("c_end_time_error_logo").style.display = "none";
  }
 if (returnvalue_org == false) {
   window.scrollTo(0, 200);
 } else if (returnvalue_camp == false) {
   window.scrollTo(0, 770);
 }
  return returnvalue;
}