<?php
 echo "<a class='btn btn-primary btn-sm' href='  /userpage.php'> User Page </a>";
session_start();
$user_id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Queries</title>
    <style>
        body {
            background-color: #ffffff;
            /* Set the desired background color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 20px;
        }

        .query-box {
            margin-bottom: 20px;
            border: 1px solid black;
            /* Add a border */
            padding: 10px;
        }

        .query-box h2 {
            margin-top: 0;
            font-size: 18px;
            margin-bottom: 10px;
            text-align: center;
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table td {
            text-align: left;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>



    <div class="content">
        <?php
        include "connection.php";
        //  $user_id = $_GET['user_id'];
        
        $queries = array(

            "SELECT purchase.*, game.title FROM purchase,game WHERE user_id= '$user_id' AND purchase.game_id=game.game_id ;"

        );

        $titles = array(
            "My purchases"
        );




        foreach ($queries as $index => $query) {
            ?>

            <div class="query-box">
                <h2>
                    <?php echo $titles[$index]; ?>
                </h2>
                <?php

                // Execute the SQL query
                $result = $connection->query($query);

                // Display the results
                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    $row = $result->fetch_assoc();
                    echo "<thead><tr>";
                    foreach ($row as $column => $value) {
                        echo "<th>" . $column . "</th>";
                    }
                    echo "</tr></thead>";

                    echo "<tbody>";
                    $result->data_seek(0); // Reset the result pointer
            
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $column => $value) {
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No results found.";
                }

                $result->close();
                ?>
            </div>
            <?php
        }

        $connection->close();
        ?>
    </div>
</body>

</html>