<?php

include "connection.php";

$game_id="";
$release_date ="";
$genre="";
$description="";
$title ="";
$price="";


$errorMessage="";
$successMessage="";

if($_SERVER["REQUEST_METHOD"]=='GET'){
  if(!isset($_GET['game_id'])){
    header("location:   /game.php");
    exit;
  }
  $game_id = $_GET['game_id'];
  $sql = "select * from game where game_id=$game_id";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();
  
if(!$row){
    header("location:   /game.php");
    exit;
  }
  
  $game_id=$row["game_id"];
  $release_date =$row["release_date"];
  $genre=$row["genre"];
  $description=$row["description"];
  $title =$row["title"];
  $price=$row["price"];



  
}
else{
    $game_id=$_POST["game_id"];
    $release_date =$_POST["release_date"];
    $genre=$_POST["genre"];
    $description=$_POST["description"];
    $title =$_POST["title"];
    $price=$_POST["price"];
    
    do{
        if(empty( $game_id) || empty( $release_date) ||empty( $genre) ||empty( $description)  ||  empty( $title)  ||  empty( $price)){
            $errorMessage= "All the fields are required";
            break;
        }
        $sql = "update game set game_id='$game_id', release_date='$release_date', genre='$genre' , description='$description', title='$title', price='$price' where game_id='$game_id'";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query: " . $connection->error;
            break;
        }

        $successMessage="game updated correctly";

     } while(false);

     header("location:   /game.php");
     exit;

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> </script>
</head>
<body>
<div class="container my-5">
<h2> Edit game </h2>

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
    <input type="hidden" value="<?php echo $game_id; ?>">
    <div class="row md-3">
    <label class ="col-sm-3 col-form-label"> game id </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="game_id" value="<?php echo $game_id; ?>">
</div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label"> release date </label>
    <div class="col-sm-6"><input type="date" class="form-control" name="release_date" value="<?php echo $release_date; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label"> genre </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="genre" value="<?php echo $genre; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label"> description </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label">title </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
    </div>
</div>

<div class="row md-3">
    <label class ="col-sm-3 col-form-label"> price </label>
    <div class="col-sm-6"><input type="text" class="form-control" name="price" value="<?php echo $price; ?>">
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
        <a calss="btn btn-outline-primary" href="  /game.php" role ="button">Cancel </a>
    </div>
</div>





</form>
</div>
</body>
</html>