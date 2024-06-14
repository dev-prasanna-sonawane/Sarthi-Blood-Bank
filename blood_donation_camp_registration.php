<!-- Camp Registration -->
<?php
include 'db_connection.php';
//Query Execution

try {
  if (isset ($_POST['c_register'])) {
    // Prepare and execute query
    $org_name = $_POST['org_name'];
    $o_name = $_POST['o_name'];
    $o_mobile_no = $_POST['o_mobile_no'];
    $o_email = $_POST['o_email'];
    $co_name = $_POST['co_name'];
    $co_mobile_no = $_POST['co_mobile_no'];
    $c_name = $_POST['c_name'];
    $c_address = $_POST['c_address'];
    $c_date = $_POST['c_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $query = "INSERT INTO `camp_details` ( `org_name`, `o_name`, `o_mobile_no`, `o_email`, `co_name`, `co_mobile_no`, `camp_name`, `camp_address`, `camp_date`,`camp_start_time` ,`camp_end_time`) VALUES ('$org_name', '$o_name', '$o_mobile_no', '$o_email', '$co_name', '$co_mobile_no', '$c_name', '$c_address','$c_date','$start_time','$end_time')";

    if ($conn->query($query)) {
      echo "<script >alert('Registration Succesfull');</script>";
    } else {
      echo "<script>alert('Registration Failed !!!')</script>";
    }
  }
} catch (PDOException $e) {
  echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blood Donation Camp Registration</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" tyep="text/css" href="css/forms.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
  <header>
    <?php include 'header.php'; ?>
  </header>
  <main>
    <h1> Blood Donation Camp Registration Form</h1>
    <form id="camp_form" action="" method="post" onsubmit="return validate_form()">
    
        <h4>Organization Details</h4>
   
      <label for="org_name">Organization Name :</label>
      <input id="org_name" name="org_name" type="text" required value="<?php if (isset($_POST['org_name'])){echo ($_POST['org_name']);} ?>"><span id="org_name_error_logo"><img src="assets/images/cross.png"></span>
      <div id="org_name_err_msg" class="error"></div>

      <label for="o_name">Organizer Name :</label>
      <input id="o_name" name="o_name" type="text" required value="<?php if (isset($_POST['o_name'])){echo ($_POST['o_name']);} ?>"><span id="o_name_error_logo"><img src="assets/images/cross.png"></span>
      <div id="o_name_err_msg" class="error"></div>

      <label for="o_mobile_no">Organizer Mobile No :</label>
      <input id="o_mobile_no" name="o_mobile_no" type="number" required value="<?php if (isset($_POST['o_mobile_no'])){echo ($_POST['o_mobile_no']);} ?>"><span id="o_mobile_no_error_logo"><img src="assets/images/cross.png"></span>
      <div id="o_mobile_no_err_msg" class="error"></div>

      <label for="o_email">Organizer Email id :</label>
      <input type="email" id="o_email" name="o_email"  required value="<?php if (isset($_POST['o_email'])){echo ($_POST['o_email']);} ?>"><span id="o_email_error_logo"><img src="assets/images/cross.png"></span>
      <div id="o_email_err_msg" class="error"></div>

      <label for="co_name">Co-Organizer Name :</label>
      <input id="co_name" name="co_name" type="text" required value="<?php if (isset($_POST['co_name'])){echo ($_POST['co_name']);} ?>"><span id="co_name_error_logo"><img src="assets/images/cross.png"></span>
      <div id="co_name_err_msg" class="error"></div>

      <label for="co_mobile_no">Co-Organizer Mobile No :</label>
      <input id="co_mobile_no" name="co_mobile_no" type="number" required value="<?php if (isset($_POST['co_mobile_no'])){echo ($_POST['co_mobile_no']);} ?>"><span id="co_mobile_no_error_logo"><img src="assets/images/cross.png"></span>
      <div id="co_mobile_no_err_msg" class="error"></div>

        <h4>Camp Details</h4>
     
      <label for="c_name">Camp Name :</label>
      <input id="c_name" name="c_name" type="text" required value="<?php if (isset($_POST['c_name'])){echo ($_POST['c_name']);} ?>"><span id="c_name_error_logo"><img src="assets/images/cross.png"></span>
      <div id="c_name_err_msg" class="error"></div>
      
      <label for="c_address" id="c_address">Camp Address :</label>
      <input id="c_address" name="c_address" type="text" class="address" required value="<?php if (isset($_POST['c_address'])){echo ($_POST['c_address']);} ?>"></input>
      <div class="error"></div>
      
      <label for="c_date">Camp Date :</label>
      <input id="c_date" name="c_date" type="date" required value="<?php if (isset($_POST['c_date'])){echo ($_POST['c_date']);} ?>"><span id="c_date_error_logo"><img src="assets/images/cross.png"></span>
      <div id="c_date_err_msg" class="error"></div>
      
      <label for="start_time">Camp Start Time :</label>
      <input id="start_time" name="start_time" type="time" required value="<?php if (isset($_POST['start_time'])){echo ($_POST['start_time']);} ?>">
      <div class="error"></div>

      <label for="end_time">Camp End Time :</label>
      <input id="end_time" name="end_time" type="time" required value="<?php if (isset($_POST['end_time'])){echo ($_POST['end_time']);} ?>"><span id="c_end_time_error_logo"><img src="assets/images/cross.png"></span>
      <div id="c_end_time_err_msg" class="error"></div>

      <br>
      <input name="c_register" value="Register" class="buttons" type="submit">
      <input name="c_reset" value="Cancel" class="buttons" type="reset" onclick="Clear()">

    </form>
  </main>
  <footer>
    <?php include 'footer1.php'; ?>
  </footer>
  <script src="js/camp_form_validation.js"></script>
</body>
</html>