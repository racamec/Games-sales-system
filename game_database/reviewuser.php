
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Queries</title>
    <style>
        
        body {
            background-color: #ffffff; /* Set the desired background color */
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
            border: 1px solid black; /* Add a border */
            padding: 10px;
        }

        .query-box h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>


    <div class="content">
  
        <?php
        include "connection.php";
        session_start();
  
          $user_id =  $_SESSION['user_id'];
          $game_id = $_GET['game_id'];
          echo "<a class='btn btn-primary btn-sm' href='  /userpage.php'> User Page </a>";
          echo "<a class='btn btn-primary btn-sm' href='  /addreview.php?game_id=$game_id&user_id=$user_id'>Leave a review</a>";
        

       
        $queries = array(

            "SELECT game.title, AVG(review.rating) AS average_rating
            FROM review
            JOIN game ON review.game_id = game.game_id
            WHERE game.game_id = '$game_id';
            ",

            "SELECT * FROM review WHERE game_id='$game_id'"
          
        );

        $titles = array(
            "The average rating",
            "All Reviews"
           
        );
        
        foreach ($queries as $index => $query) {
            ?>
          
        
            <div class="query-box">
                <h2><?php echo $titles[$index]; ?></h2>
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