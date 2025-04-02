<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION["logged_in"] != true) {
    header("Location:donor_login.php");
    exit();
}
?>
<?php
include ("db_connection.php");

if (isset ($_GET["id"])) {
    $id = $_GET['id'];
    $remove = "DELETE FROM `appointments` WHERE `appointment_id` = '$id'";
    $statement = $conn->prepare($remove);
    $statement->execute();
}
?>
<!-- // else{ -->
<!-- // Donor Registration -->
<!--  //Db Connection -->
<?php
include 'db_connection.php';
//Query Execution
try {
    if (isset($_POST['d_update'])) {
        //Take Form Data
        $dname = $_POST['d_name'];
        $dage = $_POST['d_age'];
        $dgender = $_POST['d_gender'];
        $dblood_group = $_POST['d_blood_group'];
        $daddress = $_POST['d_address'];
        $dmobile_no1 = $_POST['d_mobile_no1'];
        $dmobile_no2 = $_POST['d_mobile_no2'];
        $demail = $_POST['d_email'];
        $dpassword = $_POST['d_password'];
        $dpassword_reset_answer = $_POST['password_reset_answer'];
        if (!isset($_POST['donor_list'])) {
            $d_list = 'off';
        } else {
            $d_list = $_POST['donor_list'];
        }


        // Prepare and execute query
        $query = "UPDATE `donor_details` SET `donor_name`='$dname',`age`='$dage',`gender`='$dgender', `blood_group`='$dblood_group', `address`='$daddress', `mobile_no`='$dmobile_no1', `alternate_mobile_no`='$dmobile_no2', `email`='$demail', `donor_password`='$dpassword',`password_reset_answer`='$dpassword_reset_answer',`donor_list`='$d_list' WHERE  `email`='$demail'";

        if ($conn->query($query)) {
            echo "<script>alert('Updated Succesfull');</script>";
        } else {
            echo "<script>alert('Updation Failed !!!')</script>";
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" tyep="text/css" href="css/donor.css">
    <link rel="stylesheet" tyep="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="stylesheet" type="text/css" href="css/tables.css">
</head>

<body>
    <header id="donor_header">
        <h1>
            <img src="assets/images/back.jpeg" alt="Back Button" id="backbtn" class="logos" onclick="history.back()">
            <a class="links" id="main_heading_link" href="donor_dashboard.php">Sarthi Blood Bank </a>
        </h1>
        <nav id="donor_nav">
            <a id="donor_appointment" class="nav_li_links links nav_element" href="donor_book_appointments.php"> Book Appointment</a>
            <a class="links" href="logout.php" style="color:var(--color);">Logout</a>
        </nav>
    </header>
    <main>
        <!-- <h1>Welcome
            <?php echo $_SESSION['donor_name'] ?>
        </h1> -->
        <?php
        $accepted = 'Approved';
        $rejected = 'Rejected';
        $status = 'Pending';
        $S = 'Success';
        $F = 'Failure';
        $q = "SELECT * FROM `appointments` WHERE `donor_id`='$_SESSION[donor_id]' ORDER BY `appointment_request_time` desc LIMIT 1";
        $res = $conn->query($q);
        while ($row = $res->fetch()) {
            if (($row['status'] == $accepted) && ($row['donated'] == $status)) {

                echo "<h2>Your Appointment has been Approved.</h2>
                <p>Please visit the<a href='about_us.php'> Blood Bank</a> on " . $row['appointment_date'] . " at " . $row['appointment_time'] . ".<br> For more information on <a href='about_blood_donation_process.php'> Blood Donation Process</a></p>";
            } else if (($row['status'] == $accepted) && ($row['donated'] == $S)) {

                echo "<h2>Thank you for being a lifesaver.</h2>
                   <p> Your willingness to give a part of yourself to help others in need is truly remarkable. <br>Your gift of blood can mean the difference between life and death for someone facing a medical emergency.</p>";
            } else if (($row['status'] == $accepted) && ($row['donated'] == $F)) {

                echo "<h2>Your generosity can make a difference.</h2>
                   <p>I hope this message finds you well. I understand that life can get busy, and sometimes unexpected things happen. However, missing a blood donation appointment can have a significant impact on those in need. Your decision not to attend the appointment might mean that someone else missed out on receiving life-saving blood.

                   Remember that every donation counts. By giving blood, you contribute to saving lives, and your selflessness is commendable. If you missed the appointment due to unforeseen circumstances, consider rescheduling or finding another opportunity to donate.</p>";
            } else if (($row['status'] == $rejected) && ($row['donated'] == $F)) {

                echo "<h2>Your Appointment has been Cancelled.</h2>
                <p>The Requested Date or Time for the Appointment was not Available. So Please select another Date for the Appointment.</p>";
            }
        }
        ?>
        <table id="my_appointments" style="margin:10vh auto;">
            <caption>
                <h2>My Appointments</h2>
            </caption>
            <thead>
                <tr>
                    <th>Appointment Id</th>
                    <th>Requested Appointment Date</th>
                    <th>Requested Appointment Time</th>
                    <th>Status</th>
                    <th>Blood Donated</th>
                    <th colspan="2">Appointment Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Prepare and execute query  
                    $q = "SELECT * FROM `appointments` WHERE `donor_id`='$_SESSION[donor_id]' order by `appointment_request_time` desc";
                    $res = $conn->query($q);
                    $cnt = $res->rowCount();
                    if ($cnt != 0) {
                        while ($row = $res->fetch()) {
                            echo "
                        <tr>
                        <td>" . $row['appointment_id'] . "</td>
                            <td>" . $row['appointment_date'] . "</td>
                            <td>" . $row['appointment_time'] . "</td>
                            <td>" . $row['status'] . "</td>
                            <td>" . $row['donated'] . "</td>";
                            if($row['donated']=='Pending'){ 
                                echo "<td><a href='donor_edit_appointment.php?id=" . $row['appointment_id'] . "' class='edit'>Edit</a></td>
                                 <td><a href='donor_dashboard.php?id=" . $row['appointment_id'] . "' class='remove' onclick='return confirm_cancel()'>Cancel</a></td></tr>";
                            }
                            else if($row['donated']=='Failure'){
                                echo "<td colspan='2'>Appointment is Cancelled</td></tr>";

                            } 
                            else{ 
                                echo "<td colspan='2'>Appointment is Completed</td></tr>";
                            }   
                        }
                    } else {
                        echo "<tr>
                        <td colspan='6'>
                        <strong>You have not Booked any Appointments Yet ! <a href='donor_book_appointments.php'>Book Now</a></strong>
                        </td></tr>";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                ?>
            </tbody>
        </table>
        <h1>Update Details</h1>
        <?php
        $email = $_SESSION['email'];
        $query = "SELECT * FROM `donor_details` WHERE `email`='$email'";
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // print_r($result);

        ?>
        </h1>
        <form id="dashboard" action="" method="post" onsubmit="return validateform()">

            <h4>Personal Information</h4>

            <label for="d_name">Full Name :</label>
            <input type="text" id="d_name" name="d_name" required value="<?= $result['donor_name']; ?>"><span id="name_error_logo"><img src="assets/images/cross.png"></span>
            <div id="name_err" class="error"></div>

            <label for="d_age">Age :</label>
            <input type="number" id="d_age" name="d_age" required value="<?= $result['age']; ?>"><span id="age_error_logo"><img src="assets/images/cross.png"></span>
            <div id="age_err" class="error"></div>

            <label for="male">Gender :</label>
            <input type="text" id="d_gender" value="<?= $result['gender']; ?>" name="d_gender">
            <div  class="error"></div> 

            <label for="d_blood_group">Blood Group :</label>
            <input type="text" id="d_blood_group" name="d_blood_group" value="<?= $result['blood_group']; ?>" required>
            <div  class="error"></div> 

            <label for="d_address">Address :</label>
            <input type="text" id="d_address" name="d_address" value="<?= $result['address']; ?>"></input>
            <div  class="error"></div> 

            <h4>Contact Information</h4>

            <label for="d_mobile_no1">Mobile Number :</label>
            <input type="number" id="d_mobile_no1" name="d_mobile_no1" required value="<?= $result['mobile_no']; ?>"><span id="mobile_no1_error_logo"><img src="assets/images/cross.png"></span>
            <div id="mobile_no1_err" class="error"></div>

            <label for="d_mobile_no2">Alternative Mobile Number :</label>
            <input type="number" id="d_mobile_no2" name="d_mobile_no2" value="<?= $result['alternate_mobile_no']; ?>"><span id="mobile_no2_error_logo"><img src="assets/images/cross.png"></span>
            <div id="mobile_no2_err" class="error"></div>

            <label for="d_email">Email :</label>
            <input type="email" id="d_email" name="d_email" required value="<?= $result['email']; ?>"><span id="email_error_logo"><img src="assets/images/cross.png"></span>
            <div id="email_err" class="error"></div>

            <label for="d_password">Password :</label>
            <input type="text" id="d_password" name="d_password" required value="<?= $result['donor_password']; ?>"><span id="password_error_logo"><img src="assets/images/cross.png"></span>
            <div id="password_err" class="error"></div>

            <label for="d_cpassword">Confirm Password :</label>
            <input type="text" id="d_cpassword" name="d_cpassword" required value="<?= $result['donor_password']; ?>"><span id="cpassword_error_logo"><img src="assets/images/cross.png"></span><div id="password_match_err" class="error"></div>
            <div id="cpassword_err" class="error"></div>

            <h4>Security Question</h4>

            <label for="password_reset_answer">What is your Favourite Programming Language :</label>
            <input type="text" id="password_reset_answer" name="password_reset_answer" placeholder="Lowercase Only" required  value="<?= $result['password_reset_answer']; ?>"><span id="password_reset_answer_error_logo"><img src="assets/images/cross.png"></span>
            <div id="password_reset_answer_err" class="error"></div> 
            
            <label for="donor_list">Donor List Checkbox :</label>
            <input type="text" name="donor_list" id="donor_list" value="<?= $result['donor_list']; ?>">
            <div  class="error"></div> 
            
            <input type="submit" name="d_update" value="Update" class="buttons">
            <input type="reset" name="d_reset" value="Cancel" class="buttons">

        </form>
    </main>
    <footer>
        <div>Copyright &copy; 2024. All rights reserved.</div>
        <div> &reg;Designed And Developed By <strong>
                <emp>Prasanna Sonawane</emp>
            </strong> And Tushar Chavan.</div>
    </footer>
    <script src="js/donor_form_validation.js"></script>
    <script src="js/confirm_delete.js"></script>
    <script>
        document.querySelectorAll('.nav_li_links').forEach(link => {
            if (link.href == window.location.href) {
                link.classList.add('active');
            }
        });
    </script>
</body>

</html>