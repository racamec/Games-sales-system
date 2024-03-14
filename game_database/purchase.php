<?php echo "<a class='btn btn-primary btn-sm' href='  /adminpage.php'> Admin Page </a>"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchases</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2> List of Purchases </h2>

        <table class="table">
            <thead>
                <tr>
                    <th>purchase id</th>
                    <th>purchase date </th>
                    <th>purchase amount</th>
                    <th>user id</th>
                    <th>game id</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                $sql = "select * from purchase";
                $result = $connection->query($sql);
                if (!$result) {
                    die("Invalid query!");
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
      <tr>
        <th>$row[purchase_id]</th>
        <td>$row[purchase_date]</td>
        <td>$row[purchase_amount]</td>
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