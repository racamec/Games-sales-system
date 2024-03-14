<?php

include "connection.php";

$user_id="";
$username ="";
$password="";
$email="";
$date_of_birth ="";
$country="";



$errorMessage="";
$successMessage="";

if($_SERVER["REQUEST_METHOD"]=='GET'){
  if(!isset($_GET['user_id'])){
    header("location:   /users.php");
    exit;
  }
  $user_id = $_GET['user_id'];
  $sql = "select * from user where user_id=$user_id";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();
  
 if(!$row){
    header("location:   /users.php");
    exit;
  }
  
  $user_id=$row["user_id"];
    $username=$row["username"];
    $password=$row["password"];
    $email=$row["email"];
    $date_of_birth=$row["date_of_birth"];
    $country=$row["country"];




  
}
else{
    $user_id=$_POST["user_id"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    $date_of_birth=$_POST["date_of_birth"];
    $country=$_POST["country"];

    do{
        if(empty( $user_id) || empty( $username) ||empty( $password) ||empty( $email)  ||  empty( $date_of_birth)  ||  empty( $country)){
            $errorMessage= "All the fields are required";
            break;
        }
           
            
        $sql = "update user set user_id='$user_id', username='$username', password='$password' , email='$email', date_of_birth='$date_of_birth', country='$country' where user_id='$user_id'";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query: " . $connection->error;
            break;
        }

        $successMessage="user updated correctly";

     } while(false);

     header("location:   /users.php");
     exit;

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> </script>
</head>
<body>
<div class="container my-5">
<h2> Edit user</h2>

<?php
if(!empty($errorMessage)){
    echo"
<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong> $errorMessage </strong>
<button type='button' class='btn-close' data-bs-dismiss='alert aria-label='Close'> </button>
</div>
    ";
}

?>


<form method="post">
    <input type="hidden" value="<?php echo $user_id; ?>">
    <div class="row md-3">
    <label class ="col-sm-3 col-form-label"> user id </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
</div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label"> username </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label"> password </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="password" value="<?php echo $password; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label"> email</label>
    <div class="col-sm-6"><input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label">date of birth</label>
    <div class="col-sm-6"><input type="date" class="form-control" name="date_of_birth" value="<?php echo $date_of_birth; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label"> country </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="country" value="<?php echo $country; ?>">
    </div>
</div>

<?php
if(!empty($successMessage)){
    echo"
    <div class='row md-3'>
    <div class='offset-sm-3 col-sm-6 '>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong> $successMessage </strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert aria-label='Close'> </button>
    </div>
    </div>
    </div>
    ";
}

?>




<div class="row md-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">submit </button>
        </div>
    <div class="col-sm-3 d-grid">
        <a calss="btn btn-outline-primary" href="  /users.php" role ="button">Cancel </a>
    </div>
</div>





</form>
</div>
</body>
</html>