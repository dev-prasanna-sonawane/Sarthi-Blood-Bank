<?php
//    Connect to database
include 'db_connection.php';

try {
    if (isset($_POST['d_email']) || isset($_POST['password_reset_answer'])) {
        $d_email = $_POST['d_email'];
        $password_reset_answer = $_POST['password_reset_answer'];
    }
    if (isset($_POST['pass_reset_submit'])) {
        $demail = $_POST['d_email'];
        $dpassword_reset_answer = $_POST['password_reset_answer'];

        $query = "SELECT donor_name,donor_password,email,password_reset_answer FROM `donor_details` WHERE `email`='$demail'";
        $res = $conn->query($query);
        $count = $res->rowCount();
        if ($count != 0) {
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                if ($row['password_reset_answer'] == $dpassword_reset_answer) {
                    $email = $row['email'];
                    session_start();
                    $_SESSION['email'] = $email;
                    header('location:donor_reset_password.php');
                } else {
                    echo "<script>alert('Wrong Answer!');</script>";
                }
            }
        } else {
            echo "<script>alert('Email doesnt Exists!');</script>";
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
    <title>Forgot Password</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
    <link rel="stylesheet" tyep="text/css" href="css/style.css">
    <link rel="stylesheet" tyep="text/css" href="css/forms.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
    <header>
        <?php include 'header.php' ?>
    </header>
    <main>
        <h1>Forgot Password</h1>
        <form action="" method="post" class="login" >
            <label for="d_email">Email :</label>
            <input type="email" id="d_email" name="d_email" required value="<?php if (isset($_POST['d_email'])) { echo ($_POST['d_email']);} ?>"><br>
            
            <label for="password_reset_answer">What is your Favourite Programming Language :</label>
            <input type="text" id="password_reset_answer" name="password_reset_answer" required placeholder="Lowercase Only" value="<?php if (isset($_POST['password_reset_answer'])) {
            echo ($_POST['password_reset_answer']);  } ?>"><br>

            <input class="buttons" name="pass_reset_submit" type="submit" value="Submit">
            <input class="buttons" name="pass_reset_reset" type="reset" value="Cancel">  
        </form>
    </main>
    <footer>
        <?php include 'footer1.php'; ?>
    </footer>
</body>

</html>