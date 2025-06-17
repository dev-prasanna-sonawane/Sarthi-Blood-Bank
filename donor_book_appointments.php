<!-- Request For Appointment-->
<?php
include 'redirect.php';
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION["logged_in"] != true) {
    redirectWithoutMessage("donor_login.php");
    exit();
}

include 'db_connection.php';

//Query Execution
try {

    if (isset($_POST['a_request'])) {
        // Prepare and execute query
        $d_id = $_SESSION['donor_id'];
        $d_name = $_SESSION['donor_name'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];
        $appointment_id = rand(1, 1000);
        $status = 'Pending';
        $rejected = 'Rejected';
        $approved = 'Approved';
        $donated = 'Success';
        $not_donated = 'Failure';
        $exists = "SELECT * FROM `appointments` WHERE (`donor_id`='$d_id') AND (((`status`='$status') AND (donated='$status')) OR ((`status`='$approved') AND (`donated`='$status')))";
        $res = $conn->query($exists);
        $count = $res->rowCount();
        if ($count == 0) {
            $query = "INSERT INTO `appointments` (`donor_id`,`donor_name`, `appointment_id`, `appointment_date`,`appointment_time`, `status`,`donated`) VALUES ('$d_id','$d_name', '$appointment_id', '$appointment_date','$appointment_time','$status','$status')";
            if ($conn->query($query)) {
                redirect('donor_dashboard.php','Appointment Request Submitted');
            } else {
                onlyAlertMessage('An Error occured while Requesting an Appointment, Please Try Again!');
            }
        } else {
            onlyAlertMessage('You Already have an Appointment, Please Try Again after the Appointment!');
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
        <title>Book Appointment</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" tyep="text/css" href="css/forms.css">
        <link rel="stylesheet" tyep="text/css" href="css/donor.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
    </head>

    <body>
        <header>
            <h1>
                <img src="assets/images/back.jpeg" alt="Back Button" id="backbtn" class="logos" onclick="history.back()">
                <a class="links" id="main_heading_link" href="donor_dashboard.php">Sarthi Blood Bank </a>
            </h1>
            <nav id="donor_nav">
                <a id="donor_appointment" class="nav_li_links links nav_element" href="donor_book_appointments.php"> Book Appointment</a>
                <a style="color:let(--color);" class="links nav_element" href="logout.php">Logout</a>
            </nav>
        </header>
        <main>
            <h1> Request for Blood Donation Appointment</h1>

            <form id="appointment_form" method="post" action="" onsubmit="return validate_form()">

                <label for="appointment_date">Enter the Date :</label>
                <input type="date" id="appointment_date" name="appointment_date" value="<?php if (isset($_POST['appointment_date'])) {
                        echo ($_POST['appointment_date']);
                                } ?>" title="Date should be in the Future" required><span id="appointment_date_error_logo"><img src="assets/images/cross.png"></span>
                <div id="date_err_msg" class="error"></div>

                <label for="appointment_date">Enter the Time :</label>
                <input type="time" id="appointment_time" name="appointment_time" value="<?php if (isset($_POST['appointment_time'])) {
                                echo ($_POST['appointment_time']);
                                } ?>" required><span id="appointment_time_error_logo"><img src="assets/images/cross.png"></span>
                            <div id="time_err_msg" class="error"></div>
                
            
                <input name="a_request" value="Request" class="buttons" type="submit">
                <input name="a_reset" value="Cancel" class="buttons" type="reset">
            </form>
        </main>
        <footer>
            <div>Copyright &copy; 2024. All rights reserved.</div>
            <div> &reg;Designed And Developed By <strong>
                    <emp>Prasanna Sonawane</emp>
                </strong>.</div>
        </footer>
        <script src="js/appointment_validation.js"></script>
        <script >
            document.querySelectorAll('.nav_li_links').forEach(link => {
                if (link.href == window.location.href) {
                    link.classList.add('active');
                }
            });
        </script>
    </body>

</html>