<?php
    include "connection.php";
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $sql = "DELETE from `user` where user_id=$user_id";
        $connection->query($sql);
    }
    header('location:  /users.php');
    exit;
?>
