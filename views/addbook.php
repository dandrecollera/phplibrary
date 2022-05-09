<?php

include '../scripts/php/connection.php';

if(isset($_POST['submit'])){
    $bookname = $_POST['bookname'];
    $bookcode = $_POST['code'];

    $sql = "INSERT INTO `book`(Book_Name, Book_Code) VALUES('$bookname', '$bookcode')";
    $result = mysqli_query($con,$sql);

    if(!$result){
        die(mysqli_error($con));
    } else {
        header('location:./book.php');
    }
}

?>

<?php $homest = true?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <?php include '../scripts/components/css.php'; ?>
</head>
<body>
    <?php include '../scripts/components/nav.php';  ?>
    <div class="container">
        <h1 class="my-3">Add Books</h1>
        <h6>Fill all fields to add a book.</h6>
        <hr class="mb-4">
        <form method="post">
            <div class="input-group pb-3">
                <span class="input-group-text">Book Name</span>
                <input type="text" aria-label="First name" class="form-control" name="bookname">
            </div>
            <div class="input-group pb-3">
                <span class="input-group-text">Book Code</span>
                <input type="text" aria-label="Age" class="form-control" name="code">
            </div>
            <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>
            <a href="./book.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
        </form>

    </div>

    <?php include '../scripts/components/scripts.php'; ?>
</body>
</html>