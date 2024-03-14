<?php echo "<a class='btn btn-primary btn-sm' href='  /adminpage.php'> Admin Page </a>"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
 <div class="container my-5">
   <h2> List of games </h2>
   <a class="btn btn-primary" href="/creategame.php" role="button"> Add game</a>
   <table class="table">
   <thead>
      <tr>
        <th>game id</th>
        <th>release date</th>
        <th> genre</th>
        <th>description</th>
        <th>title</th>
        <th>price</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "select * from game";
        $result = $connection->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row=$result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[game_id]</th>
        <td>$row[release_date]</td>
        <td>$row[genre]</td>
        <td>$row[description]</td>
        <td>$row[title]</td>
        <td>$row[price]</td>
        <td>
             <a class='btn btn-primary btn-sm' href='  /editgame.php?game_id=$row[game_id]'> Edit </a>
             <a class='btn btn-primary btn-sm' href='  /deletegame.php?game_id=$row[game_id]'>Delete</a>
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