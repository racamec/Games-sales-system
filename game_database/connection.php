<?php 
    $servername = "localhost";
    $username = "root";
    $password = "170509";
    $db_name = "game_database";  
    $connection = mysqli_connect($servername, $username, $password, $db_name,3307);
    if($connection->connect_error){
        die("Connection failed".$connection->connect_error);
    }
    echo "";
    
    ?>