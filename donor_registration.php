<!-- Donor Registration -->
<?php
include 'redirect.php';
//Db Connection
include 'db_connection.php';
//Query Execution
try {
  if (isset ($_POST['d_register'])) {
    //Take Form Data
    $dname = $_POST['d_name'];
    $dage = $_POST['d_age'];
    $dgender = $_POST['d_gender'];
    $dblood_group = $_POST['d_blood_group'];
    $daddress = $_POST['d_address'];
    $dmobile_no1 = $_POST['d_mobile_no1'];
    $dmobile_no2 = $_POST['d_mobile_no2'];
    $demail = $_POST['d_email'];
    $dpassword = password_hash($_POST['d_password'],PASSWORD_BCRYPT);
    $dpassword_reset_answer = $_POST['password_reset_answer'];
    if(!isset($_POST['donor_list'])){
    $d_list = 'off';
  }
  else{
    $d_list = $_POST['donor_list'];
  }

    // Prepare and execute query
    $exists = "SELECT * FROM `donor_details` WHERE email='$demail'";
    $res = $conn->query($exists);
    $count = $res->rowCount();

    if ($count == 0) {
      $query = "INSERT INTO `donor_details` ( `donor_name`, `age`, `gender`, `blood_group`, `address`, `mobile_no`, `alternate_mobile_no`, `email`, `donor_password`,`password_reset_answer`,`donor_list`) VALUES ('$dname', '$dage', '$dgender', '$dblood_group', '$daddress', '$dmobile_no1', '$dmobile_no2', '$demail','$dpassword','$dpassword_reset_answer','$d_list' )";
      if ($conn->query($query)) {
        redirect('donor_login.php','Donor Registered Successfully');
      } else {
        onlyAlertMessage('An Error occured while Registering the Donor, Please Try Again!');
      }
    }
    else{
      onlyAlertMessage('A Donor with this Email Id already Exists !!!');
    }  
  }
} catch (PDOException $e) {
  echo $e->getMessage();
} ?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donor Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
  </head>

  <body>
    <header>
      <?php include 'header.php'; ?>
    </header>
    <main>
      <h1>Donor Registration Form</h1>
      <form id="donor_form" action="" method="post" onsubmit="return validateform()">
          <h4>Personal Information</h4>
        
        <label for="d_name">Full Name :</label>
              <input type="text" id="d_name" name="d_name" required value="<?php if (isset($_POST['d_name'])){echo ($_POST['d_name']);} ?>" placeholder='Prasanna Sonawane' ><span id="name_error_logo"><img src="assets/images/cross.png"></span><div id="name_err" class="error"></div>  

              <label for="d_age">Age :</label>
              <input type="number" id="d_age" name="d_age" required value="<?php if (isset($_POST['d_age'])){echo ($_POST['d_age']);} ?>" placeholder='25' ><span id="age_error_logo"><img src="assets/images/cross.png"></span>
              <div id="age_err" class="error"></div>  


              <label for="male">Gender :</label>
              <label for="male">Male</label> <input type="radio" id="male" value="Male" name="d_gender" checked>
              <label for="female">Female</label><input type="radio" id="female" value="Female" name="d_gender">
              <label for="others">Others</label><input type="radio" id="others" value="others" name="d_gender"><br>
            
              <label for="d_blood_group">Blood Group :</label>
              <select id="d_blood_group" name="d_blood_group" required value="<?php if (isset($_POST['d_blood_group'])){echo ($_POST['d_blood_group']);} ?>">
                  <option selected>A+</option>
                  <option>A-</option>
                  <option>B+</option>
                  <option>B-</option>
                  <option>AB+</option>
                  <option>AB-</option>
                  <option>O+</option>
                  <option>O-</option>
                </select>
                <div class="error"></div> 

              <label for="d_address">Address :</label>
              <input type="text" id="d_address" name="d_address" value="<?php if (isset($_POST['d_address'])){echo ($_POST['d_address']);} ?>" placeholder='Pune,India' ></input>
              <div class="error"></div> 
              
                  <h4>Contact Information</h4>
        
              <label for="d_mobile_no1">Mobile Number :</label>
              <input type="number" id="d_mobile_no1" name="d_mobile_no1" required value="<?php if (isset($_POST['d_mobile_no1'])){echo ($_POST['d_mobile_no1']);} ?>" placeholder='8955739442' ><span id="mobile_no1_error_logo" ><img src="assets/images/cross.png"></span>
              <div id="mobile_no1_err" class="error"></div>  


              <label for="d_mobile_no2">Alternative Mobile Number :</label>
              <input type="number" id="d_mobile_no2" name="d_mobile_no2" value="<?php if (isset($_POST['d_mobile_no2'])){echo ($_POST['d_mobile_no2']);} ?>" placeholder='9422867445' ><span id="mobile_no2_error_logo"><img src="assets/images/cross.png"></span>
              <div id="mobile_no2_err" class="error"></div>  


              <label for="d_email">Email :</label>
              <input type="email" id="d_email" name="d_email" required value="<?php if (isset($_POST['d_email'])){echo ($_POST['d_email']);} ?>" placeholder='prasanna@sample.com' ><span id="email_error_logo"><img
                      src="assets/images/cross.png"></span>
                      <div id="email_err" class="error"></div> 


              <label for="d_password">Password :</label>
              <input type="password" id="d_password" name="d_password" required value="<?php if (isset($_POST['d_password'])){echo ($_POST['d_password']);} ?>" placeholder='*****' ><span id="password_error_logo"><img src="assets/images/cross.png"></span>
              <div id="password_err" class="error"></div>  


              <label for="d_cpassword">Confirm Password :</label>
              <input type="password" id="d_cpassword" name="d_cpassword" required value="<?php if (isset($_POST['d_cpassword'])){echo ($_POST['d_cpassword']);} ?>" placeholder='*****' ><span id="cpassword_error_logo"><img src="assets/images/cross.png"></span>
              <div id="cpassword_err" class="error"></div>  
              <div id="password_match_err" class="error"></div> 

                  <h4>Security Question</h4>   

              <label for="password_reset_answer">What is your Favourite Programming Language :</label>
              <input type="text" id="password_reset_answer" name="password_reset_answer" placeholder="Lowercase Only" value="<?php if (isset($_POST['password_reset_answer'])){echo ($_POST['password_reset_answer']);} ?>"><span id="password_reset_answer_error_logo"><img src="assets/images/cross.png"></span>
              <div id="password_reset_answer_err" class="error"></div>
              
              <div style="margin: 10px 100px;">
                <input type="checkbox" name="donor_list" id="donor_list">
                <label for="donor_list" id="checkbox_label">
                  I grant permission for this website to display my name  and mobile number in the Donor List, enabling those  in need to reach out to me in times of emergency.
                  <label>
                <div class="error"></div>
              </div>
              
        <input type="submit" name="d_register" value="Register" class="buttons">
        <input type="reset" name="d_reset" value="Cancel" class="buttons">
        <p>Already have an Account? <a href="donor_login.php">Login here</a></p> 
      </form>
    </main>
    <footer>
      <?php include 'footer.php'; ?>
    </footer>
    <script src="js/donor_form_validation.js"></script>
  </body>
</html>