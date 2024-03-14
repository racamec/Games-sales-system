<?php
 echo "<a class='btn btn-primary btn-sm' href='  /userpage.php'> User Page </a>";
$title = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $title = $_POST['title'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Queries</title>
    <style>
        body {

            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .query-box {
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid black;
            /* Add a border */
            padding: 10px;
        }

        .query-box h2 {
            margin-top: 0;
            font-size: 18px;
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

        label {
            margin-left: 150px;
            padding: 5px;
            margin-bottom: 5px;

        }

        input[type="text"],
        input[type="password"] {
            padding: 5px;
            width: 200px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <form method="post" action="">

        <label for="title">Game title:</label>
        <input type="text" id="title" name="title">
        <button type="submit">Submit</button>
    </form>
    <div class="content">
        <?php

        include "connection.php";

        //$userID = $_GET['user_id'];
        // $title = $_GET['title'];
        $queries = array(

            "SELECT game.title, AVG(review.rating) AS average_rating
            FROM review
            JOIN game ON review.game_id = game.game_id
            WHERE game.title='$title ';
            ",


            "SELECT * FROM game WHERE YEAR(release_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(release_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH);",

            "SELECT       `title`
            FROM     `game`
            GROUP BY `title`
            ORDER BY COUNT(*) DESC
            LIMIT    10;
        "

           

        );

        $titles = array(

            "The average rating for a particular game.",
            "All games released in the past month.",
            "The top 10 most purchased games of all time",
            

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