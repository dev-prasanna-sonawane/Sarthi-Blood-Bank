<?php
session_start();
if (!isset ($_SESSION['logged_in']) || $_SESSION["logged_in"] != true) {
    header("Location:admin_login.php");
    exit();
}
?>
<?php
include ("db_connection.php");

if (isset ($_GET["id"])) {
    $id = $_GET['id'];
    $remove = "DELETE FROM `donor_details` WHERE `donor_id` = '$id'";
    $statement = $conn->prepare($remove);
    $statement->execute();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Remove Donors</title>
     <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/tables.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">

</head>

<body>
    <header>
        <?php include 'admin_header.php'; ?>
    </header>
    <main>
        <table id="donor_list">
            <caption>
                <h2>Remove Donors</h2>
            </caption>
            <thead>
                <tr>
                    <th>Donor Id</th>
                    <th>Donor Name</th>
                    <th>Blood Group</th>
                    <th>Mobile Number</th>
                    <th>Alternate Mobile Number</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                //    Connect to database
                include 'db_connection.php';

                try {
                    // Prepare and execute query                          
                    $q = "Select donor_id,donor_name,age,gender,blood_group,mobile_no,alternate_mobile_no,address from `donor_details`";
                    $res = $conn->query($q);
                    while ($row = $res->fetch()) {
                        echo "
                        <tr>
                        <td>" . $row['donor_id'] . "</td>
                            <td>" . $row['donor_name'] . "</td>
                            <td>" . $row['blood_group'] . "</td>
                            <td>" . $row['mobile_no'] . "</td>
                            <td>" . $row['alternate_mobile_no'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['gender'] . "</td>
                            <td>" . $row['age'] . "</td>
                            <td>
                            <a href='admin_remove_donor.php?id=". $row['donor_id'] ."' class='remove' onclick=' return confirm_delete()'>Remove</a></td> 
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
        <?php include 'admin_footer.php'; ?>
    </footer>
    <script src="js/confirm_delete.js"></script>
</body>

</html>