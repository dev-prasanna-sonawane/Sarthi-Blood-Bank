<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blood Stock</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/tables.css">
  <link rel="stylesheet" type="text/css" href="css/blood_availability.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
  <header>
    <?php include 'header.php'; ?>
  </header>
  <main>
    <h2>Blood Availability</h2>
    <div id='blood_availability_container'>
      <div id='blood_availability_sub_container'>
        <?php
        //    Connect to database
        include 'db_connection.php';

        try {
          // Prepare and execute query      
          $q = "Select * from `blood_stock`";
          $res = $conn->query($q);
          while ($row = $res->fetch()) {
            echo "<div class='blood_availability_cells'>
                          <h2>" . $row['blood_group'] . "</h2>
                          <h6>" . $row['units'] . " Units(400ml)</h6></div>
                        ";
          }
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
        ?>
      </div>
    </div>
  </main>
  <footer>
    <?php include 'footer1.php'; ?>
  </footer>
</body>

</html>