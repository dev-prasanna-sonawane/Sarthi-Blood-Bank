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
    <title>Add Blood</title>
     <link rel="stylesheet" tyep="text/css" href="css/style.css">
     <link rel="stylesheet" tyep="text/css" href="css/forms.css">
    <link rel="stylesheet" tyep="text/css" href="css/admin.css">
    <link rel="stylesheet" tyep="text/css" href="css/footer.css">
</head>

<body>
    <header>
        <?php include 'admin_header.php'; ?>
    </header>
    <main>
        <?php
        try {
            include 'db_connection.php';
           
            if (isset ($_POST["add"])) {
                $units = $_POST['units'];
                $id = $_POST['blood_id'];
                
                $query = "SELECT * FROM `blood_stock` WHERE `blood_id`='$id'";
                $statement = $conn->prepare($query);
                $statement->execute();
                $res = $statement->fetch(PDO::FETCH_ASSOC);
                $total = $res['units'] + $units;
                $add = "UPDATE `blood_stock` SET `units`='$total' WHERE `blood_id` = '$id'";
                if ($conn->query($add)) {
                    redirect('admin_dashboard.php','Blood Added Succesfully');
                } else {
                    onlyAlertMessage('An Error Occured While Adding Blood, Please Try Again!');
                }
            }
            if (isset ($_GET["id"])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM `blood_stock` WHERE `blood_id`='$id'";
                $statement = $conn->prepare($query);
                $statement->execute();
                $res = $statement->fetch(PDO::FETCH_ASSOC); //ALL
            }          
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        <form method="post" class="small">
            <input name="blood_id" type="hidden" value=" <?= $res['blood_id'] ?>">
            <label for="units">Enter the Units of Blood to Add :</label>
            <input name="units" type="number" value="<?php if (isset($_POST['units'])){echo ($_POST['units']);} ?>" placeholder="100"><br>
            <input type="submit" name="add" value="Add" class="buttons">
        </form>
    </main>
    <footer>
        <?php
        include "admin_footer.php";
        ?>
    </footer>
</body>
</html>