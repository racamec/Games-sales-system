
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
 <?php echo "<a class='btn btn-primary btn-sm' href='  /userpage.php'> User Page </a>";?>
   <h2> List of games </h2>
 
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
        session_start();
       

        if (isset($_SESSION['user_id']) ) {
          $user_id =  $_SESSION['user_id'];
        }
        

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
        
             <a class='btn btn-primary btn-sm' href='  /purchaseuser.php?game_id=$row[game_id]&user_id=$user_id&purchase_amount=$row[price]'>Purchase</a>
             <a class='btn btn-primary btn-sm' href='  /reviewuser.php?game_id=$row[game_id]&user_id=$user_id'>Review</a>
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