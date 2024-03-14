<?php
session_start();
$user_id=$_POST['user_id'];
include "connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if (empty($username)) {
        header("Location: userlogin.php?error=User Name is required");
        exit();
    } else if (empty($password)) {
        header("Location: userlogin.php?error=Password is required");
        exit();
    } else {
      
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $connection->query($sql);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];

            header("Location: userpage.php?user_id=$_SESSION[user_id]");
            exit();
        } else {
            header("Location: userlogin.php?error=Incorrect User name or password");
            exit();
        }
    }
} else {
    header("Location: userlogin.php");
    exit();
}
?>
