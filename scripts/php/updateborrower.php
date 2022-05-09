<?php

include 'connection.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM `borrower` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$fname = $row['Fname'];
$lname = $row['Sname'];
$agev = $row['Age'];

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];

    $sql = "UPDATE `borrower` SET Fname = '$firstname', Sname = '$lastname', Age = '$age' WHERE id = $id";
    $result = mysqli_query($con,$sql);

    if(!$result){
        die(mysqli_error($con));
    } else {
        header('location:../../views/borrower.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrower</title>
    <?php include '../components/css.php'; ?>
</head>
<body>
<div class="container">
        <h1 class="my-3">Edit Borrower</h1>
        <h6>Fill all fields to edit a borrower.</h6>
        <hr class="mb-4">
        <form method="post">
            <div class="input-group pb-3">
                <span class="input-group-text">First and Last Name</span>
                <input type="text" aria-label="First name" class="form-control" name="firstname" value=<?php echo $fname ?>>
                <input type="text" aria-label="First name" class="form-control" name="lastname" value=<?php echo $lname ?>>
            </div>
            <div class="input-group pb-3">
                <span class="input-group-text">Age</span>
                <input type="text" aria-label="Age" class="form-control" name="age" value=<?php echo $agev; ?>>
            </div>
            <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>
            <a href="../../views/borrower.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
        </form>
    </div>
    <?php include '../components/scripts.php'; ?>
</body>
</html>