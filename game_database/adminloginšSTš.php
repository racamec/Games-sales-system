<?php 

session_start(); 

include "connection.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $password = validate($_POST['password']);

    if (empty($username)) {

        header("Location: adminlogin.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: adminlogin.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM user WHERE username='admin' AND password='admin'";
        $result=$connection->query($sql);
        //$result = mysqli_query($connnection, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $username && $row['password'] === $password) {

                echo "Logged in!";

                $_SESSION['username'] = $row['username'];


                $_SESSION['aid'] = $row['aid'];

                header("Location: adminpage.php");

                exit();

            }else{

                header("Location: adminlogin.php?error=Incorect User name or password");

                
                exit();

            }

        }else{

            header("Location: adminlogin.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: adminlogin.php");

    exit();

}

?>