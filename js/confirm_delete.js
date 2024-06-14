function confirm_delete() {
  let con = confirm("Do You Really want to Delete?");
  if (con) {
    return true;
  } else {
    return false;
  }
}
function confirm_cancel() {
  let connn = confirm("Do You Really want to Cancel the Appointment?");
  if (connn) {
    return true;
  } else {
    return false;
  }
}
