function validate_form() {
  returnvalue = true;
  let a_date = new Date(document.getElementById("appointment_date").value);
  let a_time = document.getElementById("appointment_time").value;
  let [hours, mins] = a_time.split(":");
  let today = new Date();
  if (a_date < today) {
    document.getElementById("date_err_msg").innerHTML =
      "* Date should be in the future!!";
    document.getElementById("appointment_date").style.color = "red";
    document.getElementById("appointment_date").style.fontWeight = "bold";
    document.getElementById("appointment_date_error_logo").style.display =
      "inline";
    returnvalue = false;
  } else {
    document.getElementById("date_err_msg").innerHTML = "";
    document.getElementById("appointment_date").style.fontWeight = "normal";
    document.getElementById("appointment_date").style.color = "black";
    document.getElementById("appointment_date_error_logo").style.display =
      "none";

    const bankOpeningTime = 10;
    const bankClosingTime = 20;
    if (hours < bankOpeningTime || hours >= bankClosingTime) {
      document.getElementById("time_err_msg").innerHTML =
        "*Blood Bank Opens at 10 AM and Closes at 8 PM!!";
      document.getElementById("appointment_time").style.color = "red";
      document.getElementById("appointment_time").style.fontWeight = "bold";
      document.getElementById("appointment_time_error_logo").style.display =
        "inline";
      returnvalue = false;
    } else {
      document.getElementById("time_err_msg").innerHTML = "";
      document.getElementById("appointment_time").style.fontWeight = "normal";
      document.getElementById("appointment_time").style.color = "black";
      document.getElementById("appointment_time_error_logo").style.display =
        "none";
    }
  }
  return returnvalue;
}
