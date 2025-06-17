<?php
//    Connect to database
include 'db_connection.php';
include 'redirect.php';

try {
    session_start();
    if (!isset($_SESSION['email'])) {
        redirectWithoutMessage('donor_password_reset_question.php');
        exit();
    } else {
        if (isset($_POST['pass_reset_submit'])) {
            $demail = $_SESSION['email'];
            $dpassword = password_hash($_POST['d_password'],PASSWORD_BCRYPT);
            $query = "UPDATE `donor_details` SET `donor_password`='$dpassword' WHERE `email`='$demail'";
            $res = $conn->query($query);
            if ($res) {
                redirect('donor_login.php',"Password Updated Successfully");
            } else {
                onlyAlertMessage('An Error occured while Updating the Password, Please Try Again!');
            }
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
        <link rel="stylesheet" tyep="text/css" href="css/style.css">
        <link rel="stylesheet" tyep="text/css" href="css/forms.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
    </head>

    <body>
        <header>
            <?php include 'header.php' ?>
        </header>
        <main>
            <h1>Reset Password</h1>
            <form action="" method="post" class="login" onsubmit="return validateform()">
            
                <label for="d_password">Password :</label>
                <input type="password" id="d_password" name="d_password" required value="<?php if (isset($_POST['d_password'])){echo ($_POST['d_password']);} ?>" placeholder='*****'><span id="password_error_logo"><img
                        src="assets/images/cross.png"></span>
                        <div id="password_err" class="error"></div>

                <label for="d_cpassword">Confirm Password :</label>
                <input type="password" id="d_cpassword" name="d_cpassword" required value="<?php if (isset($_POST['d_cpassword'])){echo ($_POST['d_cpassword']);} ?>" placeholder='*****'><span id="cpassword_error_logo"><img
                        src="assets/images/cross.png"></span>
                        <div id="cpassword_err" class="error"></div>
                        <div id="password_match_err" class="error"></div>

                <input class="buttons" name="pass_reset_submit" type="submit" value="Submit">
                <input class="buttons" name="pass_reset_reset" type="reset" value="Cancel">
            </form>
        </main>
        <footer>
            <?php include 'footer1.php'; ?>
        </footer>
    
        <script> 
            function validateform() {
                var returnvalue = true;
                var pass = document.getElementById("d_password").value;
                var cpass = document.getElementById("d_cpassword").value;

                if (pass.length < 8 || pass.length > 15) {
                    document.getElementById("password_err").innerHTML =
                        "*Password Should be between 8 to 15 Characters";
                    document.getElementById("d_password").style.color = "red";
                    document.getElementById("d_password").style.fontWeight = "bold";
                    document.getElementById("password_error_logo").style.display = "inline";
                    returnvalue = false;
                } else {
                    document.getElementById("password_err").innerHTML = "";
                    document.getElementById("d_password").style.color = "black";
                    document.getElementById("d_password").style.fontWeight = "normal";
                    document.getElementById("password_error_logo").style.display = "none";
                }

                if (cpass.length < 8 || cpass.length > 15) {
                    document.getElementById("cpassword_err").innerHTML =
                        "* Confirm Password Should be between 8 to 15 Characters";
                    document.getElementById("d_cpassword").style.color = "red";
                    document.getElementById("d_cpassword").style.fontWeight = "bold";
                    document.getElementById("cpassword_error_logo").style.display = "inline";
                    returnvalue = false;
                } else if (pass != cpass){
                    document.getElementById("cpassword_err").innerHTML = "";
                    document.getElementById("d_cpassword").style.color = "black";
                    document.getElementById("d_cpassword").style.fontWeight = "normal";
                    document.getElementById("cpassword_error_logo").style.display = "none";

                    document.getElementById("cpassword_err").innerHTML =
                        "*Passwords does Not Match";
                    document.getElementById("d_cpassword").style.color = "red";
                    document.getElementById("d_cpassword").style.fontWeight = "bold";
                    document.getElementById("cpassword_error_logo").style.display = "inline";
                    returnvalue = false;
                }
                else {
                    document.getElementById("cpassword_err").innerHTML = "";
                    document.getElementById("d_cpassword").style.fontWeight = "normal";
                    document.getElementById("d_cpassword").style.color = "black";
                    document.getElementById("cpassword_error_logo").style.display = "none";
                }

                return returnvalue;
            }
            </script>
    </body>
</html>