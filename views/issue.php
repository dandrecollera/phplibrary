<?php include '../scripts/php/connection.php' ?>

<?php $homest = true?>
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
        <h1 class="my-3">Issued</h1>
        <a href="./addissue.php"><button type="button" class="btn btn-outline-primary mt-2">Add Issued Date</button></a>
        <hr class="mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Borrower ID</th>
                    <th scope="col">Book ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Period</th>
                    <th scope="col">Operation</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM `issue`";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
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
                                    <td>
                                        <button class="btn btn-primary"><a href="../scripts/php/updateissue.php?updateid='.$id.'" class="text-light">Update</button>
                                        <button class="btn btn-danger"><a href="../scripts/php/deleteissue.php?deleteid='.$id.'" class="text-light">Delete</button>
                                    </td>
                                </tr>
                            ';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>

    <?php include '../scripts/components/scripts.php'; ?>
</body>
</html>