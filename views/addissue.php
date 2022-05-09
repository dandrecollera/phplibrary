<?php

include '../scripts/php/connection.php';

if(isset($_POST['submit'])){
    $book = $_POST['book'];
    $borrower = $_POST['borrower'];
    $period = $_POST['period'];
    $date = $_POST['issuedate'];

    $sql = "INSERT INTO `issue`(Borrower_id, Book_id, Issued_datetime, Period) VALUES('$borrower', '$book', '$date', '$period')";
    $result = mysqli_query($con,$sql);

    if(!$result){
        die(mysqli_error($con));
    } else {
        header('location:./issue.php');
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
    <?php include '../scripts/components/css.php'; ?>
</head>
<body>
    <?php include '../scripts/components/nav.php';  ?>
    <div class="container">
        <h1 class="my-3">Add Issue Date</h1>
        <h6>Fill all fields to add a issue date.</h6>
        <hr class="mb-4">
        <form method="post">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Book</label>
                <select class="form-select" id="inputGroupSelect01" name="book">
                    <option selected disabled hidden>Choose...</option>
                        <?php
                            $sql="SELECT * FROM `book`";
                            $result = mysqli_query($con, $sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $bookname=$row['Book_Name'];
                                    $test = $id . ': '. $bookname;
                                    echo '
                                        <option value="'.$id.'">'.$test.'</option>
                                    ';
                                }
                            }
                        ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Borrower</label>
                <select class="form-select" id="inputGroupSelect01" name="borrower">
                    <option selected disabled hidden>Choose...</option>
                        <?php
                            $sql="SELECT * FROM `borrower`";
                            $result = mysqli_query($con, $sql);

                            if($result){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['id'];
                                    $fname=$row['Fname'];
                                    $lname=$row['Sname'];
                                    $test = $id . ': '. $fname . ' ' . $lname;
                                    echo '
                                        <option value="'.$id.'">'.$test.'</option>
                                    ';
                                }
                            }
                        ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Date</span>
                <input type="date" id="birthday" name="issuedate">
            </div>
            <div class="input-group pb-3">
                <span class="input-group-text">Period</span>
                <input type="text" aria-label="First name" class="form-control" name="period">
            </div>
            <button type="submit" class="btn btn-outline-primary" name="submit">Submit</button>
            <a href="./issue.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
        </form>
    </div>
    <?php include '../scripts/components/scripts.php'; ?>
</body>
</html>