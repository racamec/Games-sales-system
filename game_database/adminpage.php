<?php echo "<a class='btn btn-primary btn-sm' href='  /firstpage.php'> Home</a>"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome Admin!</title>
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
    <h1>Welcome Admin!</h1>

    <a href="game.php" class="login-button">Games</a>
    <a href="users.php" class="login-button">Users</a>
    <a href="purchase.php" class="login-button">Purchases</a>
    <a href="review.php" class="login-button">Reviews</a>
    <a href="queries.php" class="login-button">Queries</a>
</body>

</html>