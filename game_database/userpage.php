
<?php echo "<a class='btn btn-primary btn-sm' href='  /firstpage.php'> Home</a>"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome User!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            color: #333333;
            text-align: center;
        }

        h2 {
            color: #666666;
            margin-bottom: 10px;
        }

        .login-button {
            display: block;
            width: 200px;
            padding: 10px;
            margin: 10px auto;
            text-align: center;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<h1>Welcome User!</h1>
    <?php
  session_start();
$user_id= $_SESSION['user_id'];

    

   echo' <a href="  /gameuser.php?user_id=' . $user_id . '" class="login-button">Games</a> ';
   echo' <a href="  /mypurchases.php" class="login-button">My Purchases</a> ';
   echo' <a href="queriesuser.php" class="login-button">Queries</a>  ';



    ?>
</body>

</html>