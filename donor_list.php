<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donor List</title>
   <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/tables.css">
 <link rel="stylesheet" type="text/css" href="css/footer.css">
</head>

<body>
  <header>
    <?php include 'header.php'; ?>
  </header>
  <main>
        <table id="donor_list">
          <caption><h2>Donor List</h2></caption>
            <thead>
                <tr>
                    <th>Donor Name</th>
                    <th>Blood Group</th>
                    <th>Mobile Number</th>
                    <th>Alternate Mobile Number</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Age</th>
                    
                </tr>
            </thead>
            <tbody> 
        <?php
               //    Connect to database
            include 'db_connection.php';
            
            try{
                // Prepare and execute query                          
                $q="SELECT `donor_name`,`age`,`gender`,`blood_group`,`mobile_no`,`alternate_mobile_no`,`address` FROM `donor_details` WHERE `donor_list`='on'";
                $res=$conn->query($q);
                while($row=$res->fetch())
                {
                    echo"
                        <tr>
                            <td>".$row['donor_name']."</td>
                            <td>".$row['blood_group']."</td>
                            <td>".$row['mobile_no']."</td>
                            <td>".$row['alternate_mobile_no']."</td>
                            <td>".$row['address']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['age']."</td>
                        </tr>";
                }
           }
           catch(PDOException $e){
            echo $e->getMessage();
           }
            ?> 
        </tbody>
        </table> 
  </main>
  <footer>
    <?php include 'footer1.php'; ?>
  </footer>
</body>
</html>
