<?php

include 'connection.php';
$id = $_GET['updateid'];

$sql = "SELECT * FROM `issue` WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$borrowid = $row['Borrower_id'];
$bookid = $row['Book_id'];
$datev = $row['Issued_datetime'];
$periodv = $row['Period'];

if(isset($_POST['submit'])){
    $book = $_POST['book'];
    $borrower = $_POST['borrower'];
    $period = $_POST['period'];
    $date = $_POST['issuedate'];

    $sql = "UPDATE `issue` SET `Borrower_id` = '$borrower', Book_id = '$book', Issued_datetime = '$date', Period = '$period' WHERE id = $id";
    $result = mysqli_query($con,$sql);

    if(!$result){
        die(mysqli_error($con));
    } else {
        header('location:../../views/issue.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued</title>
    <?php include '../components/css.php'; ?>
</head>
<body>
<div class="container">
        <h1 class="my-3">Edit Issued</h1>
        <h6>Fill all fields to edit a issued.</h6>
        <hr class="mb-4">
        <form method="post">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Book</label>
                <select class="form-select" id="inputGroupSelect01" name="book">
                        <?php
                            $sql="SELECT * FROM `book`";
                            $result = mysqli_query($con, $sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $bookname=$row['Book_Name'];
                                    $test = $id . ': '. $bookname;
                                    if($bookid == $id){
                                        echo '<option value="'.$id.'" selected>'.$test.'</option>';
                                    } else {
                                        echo '<option value="'.$id.'">'.$test.'</option>';
                                    }
                                    
                                }
                            }
                        ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Borrower</label>
                <select class="form-select" id="inputGroupSelect01" name="borrower">
                        <?php
                            $sql="SELECT * FROM `borrower`";
                            $result = mysqli_query($con, $sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $fname=$row['Fname'];
                                    $lname=$row['Sname'];
                                    $test = $id . ': '. $fname . ' ' . $lname;
                                    if($borrowid == $id){
                                        echo '<option value="'.$id.'" selected>'.$test.'</option>';
                                    } else {
                                        echo '<option value="'.$id.'">'.$test.'</option>';
                                    }
                                }
                            }
                        ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Date</span>
                <input type="date" id="birthday" name="issuedate" value=<?php echo $datev ?>>
            </div>
            <div class="input-group pb-3">
                <span class="input-group-text">Period</span>
                <input type="text" aria-label="First name" class="form-control" name="period" value=<?php echo $periodv ?>>
            </div>
            <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>
            <a href="../../views/issue.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
        </form>
    </div>
    <?php include '../components/scripts.php'; ?>
</body>
</html>