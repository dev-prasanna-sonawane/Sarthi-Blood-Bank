<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Login</title>
     <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
    <link rel="stylesheet" tyep="text/css" href="css/style.css">
    <link rel="stylesheet" tyep="text/css" href="css/forms.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
    <header>
        <?php include 'header.php' ?>
    </header>
    <main id=donor_login>
        <h1>Donor Login</h1>
        <form action="" method="post" class="login">
            
        <label for="donor_email">Email :</label>
            <input type="text" id="donor_email" name="donor_email" placeholder="Enter Email" required value="<?php if (isset($_POST['donor_email'])){echo ($_POST['donor_email']);} ?>"><br><br>
            
            <label for="donor_password">Password :</label>
            <input type="password" id="donor_password" name="donor_password" placeholder="Enter Password"
                required value="<?php if (isset($_POST['donor_password'])){echo ($_POST['donor_password']);} ?>"><br><br>
            
                <a href="donor_password_reset_question.php">Forgot Password?</a><br>
            <input class="buttons" name="donor_submit" type="submit" value="Login">
            <input class="buttons" name="donor_reset" type="reset" value="Cancel">
            <p>Dont have an Account? <a href="donor_registration.php">Register Now</a></p>
            <?php
            //    Connect to database
            include 'db_connection.php';

            try {
                if (isset($_POST['donor_submit'])) {
                    $demail = $_POST['donor_email'];
                    $dpassword = $_POST['donor_password'];

                    $query = "SELECT `donor_id`,`donor_name`,`donor_password`,`email` from `donor_details` where `email`='$demail'";
                    $res = $conn->query($query);
                    $count = $res->rowCount();
                    // echo"$count";
                    // print_r($res);
                    if ($count == 1) {
                        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                            if ($row['donor_password'] == $dpassword) {
                                $dname = $row['donor_name'];
                                $d_id = $row['donor_id'];
                                $email = $row['email'];
                                session_start();
                                $_SESSION['logged_in'] = true;
                                $_SESSION['donor_name'] = $dname;
                                $_SESSION['donor_id'] = $d_id;
                                $_SESSION['email'] = $email;
                                header('Location:donor_dashboard.php');
                            } else {
                                $_SESSION['logged_in'] = false;
                                echo "<script>alert('Incorrect Password !!');</script>";
                            }
                        }
                    } else {
                        $_SESSION['logged_in'] = false;
                        echo "<script>alert('Invalid Email')</script> ";
                    }
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
            ?>
        </form>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>