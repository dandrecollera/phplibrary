<?php
$con = new mysqli('localhost', 'root', '', 'library_management');

if(!$con){
    die(mysqli_error($con));
}
?>