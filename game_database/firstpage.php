<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAME WORLD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #000;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        main {
            max-width: 1500px;
            margin: 20px auto;
            padding: 0 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f44336;
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .game-screenshot {
            max-width: 33%;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h1>GAME WORLD</h1>

    </header>

    <main>
        <h1>Welcome to Game World!</h1>

        <img src="images/1.jpeg" alt="Game Screenshot" class="game-screenshot">
        <img src="images/toplu.jpeg" alt="Game Screenshot" class="game-screenshot">
        <img src="images/3.jpeg" alt="Game Screenshot" class="game-screenshot">
        <p>Log in now and choose one of the dozens of games to start the fun.</p>

     <?php
     echo "
        <a class='btn btn-primary btn-sm' href='adminlogin.php' >Admin Login</a>
        <a class='btn btn-primary btn-sm' href='userlogin.php' >User Login</a>
        <a class='btn btn-primary btn-sm' href='signup.php' >Sign up </a>
        ";
            ?>
       
    </main>

</body>

</html>