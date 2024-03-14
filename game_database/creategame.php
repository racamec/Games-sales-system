<?php
include "connection.php";


$release_date ="";
$genre="";
$description="";
$title ="";
$price="";

$errorMessage="";
$successMessage="";


if( $_SERVER['REQUEST_METHOD'] == 'POST'){
  
    $release_date=$_POST["release_date"];
    $genre=$_POST["genre"];
    $description=$_POST["description"];
    $title=$_POST["title"];
    $price=$_POST["price"];

    $Lastgame_id = $connection->query("SELECT MAX(game_id) FROM game")->fetch_assoc()["MAX(game_id)"];

    $game_id = $Lastgame_id + 1;

if(empty( $game_id) || empty( $release_date) ||empty( $genre) ||empty( $description)  ||  empty( $title)  ||  empty( $price)){
    $errorMessage= "All the fields are required";
  
}

else{
    $sql = "INSERT INTO game (game_id,release_date, genre,game.description,title,price) " ." VALUES ('$game_id','$release_date', '$genre', '$description', '$title','$price')";

    $result=$connection->query($sql);



if(!$result){
    $errorMessage="Invalid query: " . $connection->error;
   
}else{
    $successMessage="game added correctly";
    header("location:  /game.php");
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
    <title>Create game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> </script>
</head>
<body>
<div class="container my-5">
<h2> New game </h2>

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
        <a calss="btn btn-outline-primary" href="/game.php" role ="button">Cancel </a>
    </div>
</div>





</form>
</div>
</body>
</html>
