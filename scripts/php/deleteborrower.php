<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `borrower` WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if($result){
        header('location:../../views/borrower.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
