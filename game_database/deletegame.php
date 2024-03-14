
<?php
    include "connection.php";
    if(isset($_GET['game_id'])){
        $game_id = $_GET['game_id'];
        $sql = "DELETE from `game` where game_id=$game_id";
        $connection->query($sql);
    }
    header('location:  /game.php');
    exit;
?>
