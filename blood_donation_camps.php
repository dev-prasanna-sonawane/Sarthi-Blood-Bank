<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Future Camps </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/tables.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
    </head>

    <body>
        <header>
            <?php include 'header.php'; ?>
        </header>
        <main>
            <table id="camp">
                <caption><h2>Upcoming Blood Donation Camps</h2></caption>
                <thead>
                    <tr>
                        <th>Camp Name</th>
                        <th>Camp Address</th>
                        <th>Camp Date<br>(yyyy-mm-dd)</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Organizer Name</th>
                        <th>Organizer Mobile Number</th>
                        <th>Co-Organizer Name</th>
                        <th>Co-Organizer Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //    Connect to database
                    include 'db_connection.php';

                    try {
                        // Prepare and execute query
                        $date=date('y-m-d');                          
                        $q = "SELECT * FROM `camp_details` WHERE `camp_date`>='$date' ORDER BY `camp_date`";
                        $res = $conn->query($q);
                        while ($row = $res->fetch()) {
                            echo "
                            <tr>
                                <td>" . $row['camp_name'] . "</td>
                                <td>" . $row['camp_address'] . "</td>
                                <td>" . $row['camp_date'] . "</td>
                                <td>" . $row['camp_start_time'] . "</td>
                                <td>" . $row['camp_end_time'] . "</td>
                                <td>" . $row['o_name'] . "</td>
                                <td>" . $row['o_mobile_no'] . "</td>
                                <td>" . $row['co_name'] . "</td>
                                <td>" . $row['co_mobile_no'] . "</td>
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
            <?php include 'footer1.php'; ?>
        </footer>
    </body>
</html>