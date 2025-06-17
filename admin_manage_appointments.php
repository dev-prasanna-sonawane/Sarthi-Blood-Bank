<?php
include 'redirect.php';
session_start();
if (!isset ($_SESSION['logged_in']) || $_SESSION["logged_in"] != true) {
    redirectWithoutMessage("admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Donor Appointments</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/tables.css">
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
    </head>

    <body>
        <header>
            <?php
            include "admin_header.php";
            ?>
        </header>
        <main>
            <table id='Appointments_today'>
            <caption>
                <h2>Todays Appointments</h2>
            </caption>
            <thead>
                <tr>
                    <th>Appointment Id</th>
                    <th>Donor Name</th>
                    <th>Appointment Time</th>
                    <th colspan="2">Blood Donated ?</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    //    Connect to database
                    include 'db_connection.php';
                    try {
                        // Prepare and execute query  
                        $status='Approved';
                        $date= date('y-m-d');
                        $donated = 'Pending';
                        
                        $q = "SELECT * FROM `appointments` WHERE `status`='$status' AND `appointment_date`='$date' AND `donated`='$donated'";
                        $res = $conn->query($q);
                        $cnt=$res->rowCount();
                        if($cnt!=0){
                            while ($row = $res->fetch()) {
                                echo"<tr>
                                <td>" . $row['appointment_id'] . "</td>
                                <td>" . $row['donor_name'] . "</td>
                                <td>" . $row['appointment_time'] . "</td>
                                <td><a href='admin_appointment_success.php?id=" . $row['appointment_id'] . "' class='edit'>Success</a></td> <td>
                                <a href='admin_appointment_failure.php?id=" . $row['appointment_id'] . "' class='remove'>Failure</a></td> 
                                </tr>
                                ";
                            }
                        }
                        else{
                            echo "<tr>
                            <td colspan='4'>
                            <strong>No Appointments Today</strong>
                            </td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
            <table id="Appointments">
                <caption>
                    <h2>Appointment Requests</h2>
                </caption>
                <thead>
                    <tr>
                        <th>Appointment Id</th>
                        <th>Donor Name</th>
                        <th>Requested Appointment Date</th>
                        <th>Requested Appointment Time</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        // Prepare and execute query  
                        $status='Pending';
                        $q = "SELECT * FROM `appointments` WHERE `status`='$status'";
                        $res = $conn->query($q);
                        $cnt=$res->rowCount();
                        if($cnt!=0){
                        while ($row = $res->fetch()) {
                            echo "
                            <tr>
                            <td>" . $row['appointment_id'] . "</td>
                                <td>" . $row['donor_name'] . "</td>
                                <td>" . $row['appointment_date'] . "</td>
                                <td>" . $row['appointment_time'] . "</td>
                            <td>
                                <a href='admin_accept_appointment.php?id=" . $row['appointment_id'] . "' class='edit'>Accept</a></td><td>
                                <a href='admin_reject_appointment.php?id=" . $row['appointment_id'] . "' class='remove'>Reject</a>
                                </td> 
                            </tr>";
                        }
                    }
                    else{
                        echo "<tr>
                        <td colspan='5'>
                        <strong>No Requests for Appointments </strong>
                        </td></tr>";
                    }
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </main>
        <footer>
            <?php
            include "admin_footer.php";
            ?>
        </footer>
    </body>
</html>