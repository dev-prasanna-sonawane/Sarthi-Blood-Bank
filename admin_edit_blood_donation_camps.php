<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION["logged_in"] != true) {
    header("Location:admin_login.php");
    exit();
}
?>
<!-- Camp Registration -->
<?php
include 'db_connection.php';
//Query Execution

try {
    if (isset($_POST['c_update'])) {


        // Prepare and execute query
        $c_id = $_POST['camp_id'];
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

        $query = "UPDATE `camp_details` SET 
        `org_name`='$org_name',`o_name`='$o_name',`o_mobile_no`='$o_mobile_no', `o_email`='$o_email', `co_name`='$co_name', `co_mobile_no`='$co_mobile_no', `camp_name`='$c_name', `camp_address`='$c_address', `camp_date`='$c_date',`camp_start_time`='$start_time' ,`camp_end_time`='$end_time' WHERE  `camp_id`='$c_id'";
        if ($conn->query($query)) {
            echo "<script>alert('Updated Succesfull');</script>";
        } else {
            echo "<script>alert('Updation Failed !!!')</script>";
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
    <title>Update Blood Donation Camp Details </title>
    <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" tyep="text/css" href="css/forms.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
    <header>
        <?php
        include "admin_header.php"; ?>
    </header>
    <main>
        <h1> Update Blood Donation Camp Details</h1>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM `camp_details` WHERE `camp_id`='$id'";
            $statement = $conn->prepare($query);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC); 
        }
        ?>
        <form id="camp_form" method="post" action="" onsubmit="return validate_form()">
      
                <h4>Organization Details</h4>
          
            <input type="hidden" name="camp_id" value="<?= $result['camp_id']; ?>">
            <label for="org_name">Organization Name :</label>
            <input id="org_name" name="org_name" type="text" value="<?= $result['org_name']; ?>" required><span id="org_name_error_logo"><img src="assets/images/cross.png"></span>
            <div id="org_name_err_msg" class="error"></div>

            <label for="o_name">Organizer Name :</label>
            <input id="o_name" name="o_name" type="text" value="<?= $result['o_name']; ?>" required><span id="o_name_error_logo"><img src="assets/images/cross.png"></span>
            <div id="o_name_err_msg" class="error"></div>

            <label for="o_mobile_no">Organizer Mobile No :</label>
            <input id="o_mobile_no" name="o_mobile_no" type="number" value="<?= $result['o_mobile_no']; ?>" required><span id="o_mobile_no_error_logo"><img src="assets/images/cross.png"></span>
            <div id="o_mobile_no_err_msg" class="error"></div>

            <label for="o_email">Organizer Email Id :</label>
            <input id="o_email" name="o_email" type="email" value="<?= $result['o_email']; ?>" required><span id="o_email_error_logo"><img src="assets/images/cross.png"></span>
            <div id="o_email_err_msg" class="error"></div>

            <label for="co_name">Co-Organizer Name :</label>
            <input id="co_name" name="co_name" type="text" value="<?= $result['co_name']; ?>" required><span id="co_name_error_logo"><img src="assets/images/cross.png"></span>
            <div id="co_name_err_msg" class="error"></div>

            <label for="co_mobile_no">Co-Organizer Mobile No :</label>
            <input id="co_mobile_no" name="co_mobile_no" type="number" value="<?= $result['co_mobile_no']; ?>" required><span id="co_mobile_no_error_logo"><img src="assets/images/cross.png"></span>
            <div id="co_mobile_no_err_msg" class="error"></div>

                <h4>Camp Details</h4>
            
            <label for="c_name">Camp Name :</label>
            <input id="c_name" name="c_name" type="text" value="<?= $result['camp_name']; ?>" required><span id="c_name_error_logo"><img src="assets/images/cross.png"></span>
            <div id="c_name_err_msg" class="error"></div>

            <label for="c_address" id="c_address">Camp Address :</label>
            <input id="c_address" name="c_address" type="text" value="<?= $result['camp_address']; ?>" required>
            <div  class="error"></div>
            
            <label for="c_date">Camp Date :</label>
            <input id="c_date" name="c_date" type="date" value="<?= $result['camp_date']; ?>" required><span id="c_date_error_logo"><img src="assets/images/cross.png"></span>
            <div id="c_date_err_msg" class="error"></div>
            
            <label for="start_time">Camp Start Time :</label>
            <input id="start_time" name="start_time" type="time" value="<?= $result['camp_start_time']; ?>" required>
            <div  class="error"></div>

            <label for="end_time">Camp End Time :</label>
            <input id="end_time" name="end_time" type="time" value="<?= $result['camp_end_time']; ?>" required><span id="c_end_time_error_logo"><img src="assets/images/cross.png"></span>
            <div id="c_end_time_err_msg" class="error"></div>
            
           <br>
            <input name="c_update" value="Update" class="buttons" type="submit">
            <input name="c_reset" value="Cancel" class="buttons" type="reset" >

        </form>
    </main>
    <footer>
        <?php
        include "admin_footer.php";
        ?>
    </footer>
    <script src="js/camp_form_validation.js"></script>
</body>

</html>