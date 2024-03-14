<?php echo "<a class='btn btn-primary btn-sm' href='  /adminpage.php'> Admin Page </a>"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container my-5">
    <h2> List of Users </h2>
    <a class="btn btn-primary" href="  /adduser.php" role="button"> Add user</a>
    <table class="table">
      <thead>
        <tr>
          <th>user id</th>
          <th>username </th>
          <th>password</th>
          <th>email</th>
          <th>date of birth</th>
          <th>country</th>
        </tr>
      </thead>
      <tbody>
        <?php
       
        include "connection.php";
        $sql = "select * from user";
        $result = $connection->query($sql);
        if (!$result) {
          die("Invalid query!");
        }
        while ($row = $result->fetch_assoc()) {
          echo "
      <tr>
        <th>$row[user_id]</th>
        <td>$row[username]</td>
        <td>$row[password]</td>
        <td>$row[email]</td>
        <td>$row[date_of_birth]</td>
        <td>$row[country]</td>
        <td>
             <a class='btn btn-primary btn-sm' href='  /edituser.php?user_id=$row[user_id]'>Edit</a>
             <a class='btn btn-primary btn-sm' href='  /deleteuser.php?user_id=$row[user_id]'>Delete</a>
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