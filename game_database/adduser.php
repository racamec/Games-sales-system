<?php
include "connection.php";


$username ="";
$password="";
$email="";
$date_of_birth ="";
$country="";

$errorMessage="";
$successMessage="";


if( $_SERVER['REQUEST_METHOD'] == 'POST'){
   
    $username=$_POST["username"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    $date_of_birth=$_POST["date_of_birth"];
    $country=$_POST["country"];


    $Lastuser_id = $connection->query("SELECT MAX(user_id) FROM user")->fetch_assoc()["MAX(user_id)"];

    $user_id = $Lastuser_id + 1;



if(empty( $user_id) || empty( $username) ||empty( $password) ||empty( $email)  ||  empty( $date_of_birth)  ||  empty( $country)){
    $errorMessage= "All the fields are required";
   
}

else{
    $sql = "INSERT INTO user (user_id,username, password,email,date_of_birth,country) " ." VALUES ('$user_id','$username', '$password', '$email', '$date_of_birth','$country')";

    $result=$connection->query($sql);



if(!$result){
    $errorMessage="Invalid query: " . $connection->error;
    
}

else{
    $successMessage="user added correctly";
    header("location:   /users.php");
    exit;
}

}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> </script>
</head>
<body>
<div class="container my-5">
<h2> New user </h2>

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
    <label class ="col-sm-3 col-form-label"> email </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label">date of birth </label>
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
