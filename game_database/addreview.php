<?php
include "connection.php";
session_start();
  
$user_id =  $_SESSION['user_id'];
$game_id = $_GET['game_id'];

$review_id = "";
$review_date = "";
$rating = "";
$comment = "";




$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $review_date = $_POST["review_date"];
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $user_id = $_POST["user_id"];
    $game_id = $_POST["game_id"];


    $Lastreview_id = $connection->query("SELECT MAX(review_id) FROM review")->fetch_assoc()["MAX(review_id)"];

    $review_id = $Lastreview_id + 1;




    if (empty($review_id) || empty($review_date) || empty($rating) || empty($comment) || empty($user_id) || empty($game_id)) {
        $errorMessage = "All the fields are required";
    } else {
        $sql = "INSERT INTO review (review_id, review_date, rating, comment, user_id, game_id) " . " VALUES ( '$review_id','$review_date', '$rating', '$comment', '$user_id', '$game_id')";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
        } else {
            $successMessage = "Review added correctly";
            header("location:/gameuser.php");
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
    <title>Create review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New review</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
<div class='alert alert-warning alert-dismissible fade show' role='alert'>
<strong>$errorMessage</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>
    ";
        }
        ?>

        <form method="post">
          

            <div class="row md-3">
                <label class="col-sm-3 col-form-label"> review date </label>
                <div class="col-sm-6"><input type="date" class="form-control" name="review_date"
                        value="<?php echo $review_date; ?>">
                </div>
            </div>

            <div class="row md-3">
                <label class="col-sm-3 col-form-label"> rating </label>
                <div class="col-sm-6"><input type="text" class="form-control" name="rating"
                        value="<?php echo $rating; ?>">
                </div>
            </div>

            <div class="row md-3">
                <label class="col-sm-3 col-form-label"> comment </label>
                <div class="col-sm-6"><input type="text" class="form-control" name="comment"
                        value="<?php echo $comment; ?>">
                </div>
            </div>

            <div class="row md-3">
                <label class="col-sm-3 col-form-label">user id </label>
                <div class="col-sm-6"><input type="text" class="form-control" name="user_id"
                        value="<?php echo $user_id; ?>">
                </div>
            </div>

            <div class="row md-3">
                <label class="col-sm-3 col-form-label"> game id </label>
                <div class="col-sm-6"><input type="text" class="form-control" name="game_id"
                        value="<?php echo $game_id; ?>">
                </div>
            </div>


            <?php
            if (!empty($successMessage)) {
                echo "
    <div class='row md-3'>
    <div class='offset-sm-3 col-sm-6'>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$successMessage</strong>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
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
                    <a class="btn btn-outline-primary" href="  /gameuser.php" role="button">Cancel </a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>