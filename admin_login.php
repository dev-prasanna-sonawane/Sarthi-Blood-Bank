<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
     <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
    <!-- Header -->
    <header>
        <?php include 'header.php' ?>
    </header>
    <!-- Main Body -->
    <main>
        <h1>Admin Login</h1>
        <form action="" method="post" class="login">
            <label for="admin_name">User Name :</label>
            <input type="text" id="admin_name" name="admin_name" placeholder="Enter Username" required value="<?php if (isset($_POST['admin_name'])){echo ($_POST['admin_name']);} ?>"><br><br>
            <label for="admin_password">Password :</label>
            <input type="password" id="admin_password" name="admin_password" placeholder="Enter Password"
                required value="<?php if (isset($_POST['admin_password'])){echo ($_POST['admin_password']);} ?>"><br><br>
            <input class="buttons" name="admin_submit" type="submit" value="Login">
            <input class="buttons" name="admin_reset" type="reset" value="Cancel">
            <?php
            //    Connect to database
            include 'db_connection.php';
            // Query Execution
            try {
                if (isset ($_POST['admin_submit'])) {
                    $aname = $_POST['admin_name'];
                    $apassword = $_POST['admin_password'];

                    $query = "select * from `admin_details` where admin_name='$aname'";
                    $res = $conn->query($query);
                    $count = $res->rowCount();
                    if ($count == 1) {
                        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                            if ($row['admin_password'] == $apassword) {
                                session_start();
                                $_SESSION['logged_in'] = true;
                                $_SESSION['admin_name'] = $aname;
                                header('Location:admin_dashboard.php');
                            } else {
                                $_SESSION['logged_in'] = false;
                                echo "<script>alert('Incorrect Password')</script> ";
                    
                        
                            }
                        }
                    } else {
                        $_SESSION['logged_in'] = false;
                        echo "<script>alert('Incorrect Username')</script> ";
                    }

                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
        </form>
    </main>
    <!-- Footer -->
    <footer>
        <?php include 'footer1.php'; ?>
    </footer>
</body>

</html>