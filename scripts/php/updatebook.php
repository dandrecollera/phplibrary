<?php

include 'connection.php';
$id = $_GET['updateid'];


$sql = "SELECT * FROM `book` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$bookn = $row['Book_Name'];
$bookc = $row['Book_Code'];
if(isset($_POST['submit'])){
    $bookname = $_POST['bookname'];
    $bookcode = $_POST['code'];

    $sql = "UPDATE `book` SET Book_Name = '$bookname', Book_Code = '$bookcode' WHERE id = $id";
    $result = mysqli_query($con,$sql);

    if(!$result){
        die(mysqli_error($con));
    } else {
        header('location:../../views/book.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <?php include '../components/css.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="my-3">Edit Books</h1>
        <h6>Fill all fields to edit a book.</h6>
        <hr class="mb-4">
        <form method="post">
            <div class="input-group pb-3">
                <span class="input-group-text">Book Name</span>
                <input type="text" aria-label="First name" class="form-control" name="bookname" value="<?php echo ($bookn)?>">
            </div>
            <div class="input-group pb-3">
                <span class="input-group-text">Book Code</span>
                <input type="text" aria-label="Age" class="form-control" name="code" value=<?php echo ($bookc);?>>
            </div>
            <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>
            <a href="../../views/book.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
        </form>
    </div>
    <?php include '../components/scripts.php'; ?>
</body>
</html>