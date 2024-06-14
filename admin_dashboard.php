<?php
session_start();
if (!isset ($_SESSION['logged_in']) || $_SESSION["logged_in"] != true) {
  header("Location:admin_login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
   <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" type="text/css" href="css/tables.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
  <header>
    <?php include 'admin_header.php'; ?>
  </header>
  <main>
    <h1>Welcome
      <?php echo $_SESSION['admin_name'] ?>
    </h1>
    <table id="blood_stock">
      <caption>
        <h2>Manage Blood Stock</h2>
      </caption>
      <thead>
        <tr>
          <th>Blood Group</th>
          <th>Available Units(400ml)</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          //    Connect to database
          include 'db_connection.php';
        try {
          // Prepare and execute query      
          $q = "Select * from `blood_stock`";
          $res = $conn->query($q);
          while ($row = $res->fetch()) {
            echo "
                <tr>
                <td>" . $row['blood_group'] . "</td>
                <td>" . $row['units'] . "</td>
                 <td>
                    <a href='admin_add_blood.php?id=" . $row['blood_id'] . "' class='edit '>Add</a></td><td>
                    <a href='admin_remove_blood.php?id=" . $row['blood_id'] . "' class='remove '>Remove</a></td>    
                </tr>";
          }
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
        ?>
      </tbody>
    </table>
    </div>
    </div>
  </main>
  <footer id="admin_footer">
    <?php
    include "admin_footer.php";
    ?>
  </footer>
 
</body>

</html>