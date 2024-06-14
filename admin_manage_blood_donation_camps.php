<?php
session_start();
if (!isset ($_SESSION['logged_in']) || $_SESSION["logged_in"] != true) {
    header("Location:admin_login.php");
    exit();
}
?>
<?php
    include("db_connection.php");

    if(isset($_GET["id"])){
        $id=$_GET['id'];
        $remove="DELETE FROM `camp_details` WHERE `camp_id` = '$id'";
        $statement=$conn->prepare($remove);
        $statement->execute();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blood Donation Camps</title>
     <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
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
        <table id="camp">
             <caption><h2>Upcoming Blood Donation Camps</h2></caption>
            <thead>
                <tr>
                    <th>Camp Id</th>
                    <th>Camp Name</th>
                    <th>Camp Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Organizer Name</th>
                    <th>Organizer Mobile Number</th>
                    <th>Co-Organizer Name</th>
                    <th>Co-Organizer Mobile Number</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //    Connect to database

                try {
                    // Prepare and execute query                          
                    $q = "Select camp_id,camp_name,camp_date,camp_start_time,camp_end_time,o_name,o_mobile_no,co_name,co_mobile_no from `camp_details` order by camp_date";
                    $res = $conn->query($q);
                    while ($row = $res->fetch()) {
                        echo "
                        <tr>
                            <td>" . $row['camp_id'] . "</td>
                            <td>" . $row['camp_name'] . "</td>
                            <td>" . $row['camp_date'] . "</td>
                            <td>" . $row['camp_start_time'] . "</td>
                            <td>" . $row['camp_end_time'] . "</td>
                            <td>" . $row['o_name'] . "</td>
                            <td>" . $row['o_mobile_no'] . "</td>
                            <td>" . $row['co_name'] . "</td>
                            <td>" . $row['co_mobile_no'] . "</td>
                          <td>
                            <a href='admin_edit_blood_donation_camps.php?id=" . $row['camp_id'] . "' class='edit '>Edit</a></td><td>
                            <a href='admin_manage_blood_donation_camps.php?id=". $row['camp_id'] ."' class='remove ' onclick='return confirm_delete()'>Remove</a></td> 
                        </tr>";
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
 <script src="js/confirm_delete.js"></script>
</body>
</html>