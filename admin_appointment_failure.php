<?php
include('redirect.php');
session_start();
if (!isset ($_SESSION['logged_in']) || $_SESSION["logged_in"] != true) {
    redirectWithoutMessage("admin_login.php");
    exit();
}

include ("db_connection.php");

if (isset ($_GET["id"])) {
    $appointment_id = $_GET['id'];
    $status = 'Failure';
    $approve = "UPDATE `appointments` SET `donated`='$status' WHERE `appointment_id` = '$appointment_id'";
    $statement = $conn->prepare($approve);
    $statement->execute();
    redirect('admin_manage_appointments.php','Appointment was not Successful');
}