<?php include '../scripts/php/connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include '../scripts/components/css.php'; ?>
</head>
<body>
    <?php include '../scripts/components/nav.php'; ?>

    <section class="container">
        <h1 class="my-3">Home Menu</h1>
        <h6>Welcome to the dashboard.</h6>
        <hr class="mb-4">
        <h3 class="mb-4">Dashboard</h3>
        <h4>Book</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Book</th>
                    <th scope="col">Book Code</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $bookcount = 0;
                    $sql="SELECT * FROM `book`";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            if($bookcount != 5){
                                $id=$row['id'];
                                $bookname=$row['Book_Name'];
                                $bookcode=$row['Book_Code'];
                                echo '
                                    <tr>
                                        <td scope="row">'.$id.'</td>
                                        <td>'.$bookname.'</td>
                                        <td>'.$bookcode.'</td>
                                    </tr>
                                ';
                                $bookcount++;
                            }
                        }
                    }
                ?>
            </tbody>
        </table>

        <h4>Borrower</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $borrowercount = 0;
                    $sql="SELECT * FROM `borrower`";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            if($borrowercount != 5){
                                $id=$row['id'];
                                $firstname=$row['Fname'];
                                $lastname=$row['Sname'];
                                $age=$row['Age'];
                                echo '
                                    <tr>
                                        <td scope="row">'.$id.'</td>
                                        <td>'.$firstname.'</td>
                                        <td>'.$lastname.'</td>
                                        <td>'.$age.'</td>
                                    </tr>
                                ';
                                $borrowercount++;
                            }
                        }
                    }
                ?>
            </tbody>
        </table>

        <h4>Issued</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Borrower ID</th>
                    <th scope="col">Book ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Period</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $issuecount = 0;
                    $sql="SELECT * FROM `issue`";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            if($issuecount != 5){
                                $id=$row['id'];
                                $borrowerid=$row['Borrower_id'];
                                $bookid=$row['Book_id'];
                                $date=$row['Issued_datetime'];
                                $period=$row['Period'];
                                echo '
                                    <tr>
                                        <td scope="row">'.$id.'</td>
                                        <td>'.$borrowerid.'</td>
                                        <td>'.$bookid.'</td>
                                        <td>'.$date.'</td>
                                        <td>'.$period.'</td>
                                    </tr>
                                ';
                                $issuecount++;
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </section>

    <?php include '../scripts/components/scripts.php'; ?>
</body>
</html>