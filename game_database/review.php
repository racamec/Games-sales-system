<?php echo "<a class='btn btn-primary btn-sm' href='  /adminpage.php'> Admin Page </a>"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2> List of Reviews </h2>
        <table class="table">
            <thead>
                <tr>
                    <th>review id</th>
                    <th>review date </th>
                    <th>rating</th>
                    <th>comment</th>
                    <th>user id</th>
                    <th>game id</th>

                </tr>
            </thead>
            <tbody>
                <?php
                
                include "connection.php";
                $sql = "select * from review";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query!");
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
      <tr>
        <th>$row[review_id]</th>
        <td>$row[review_date]</td>
        <td>$row[rating]</td>
        <td>$row[comment]</td>
        <td>$row[user_id]</td>
        <td>$row[game_id]</td>
        <td>
            
          </td>
      </tr>
      ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>