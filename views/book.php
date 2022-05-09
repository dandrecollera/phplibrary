<?php include '../scripts/php/connection.php' ?>

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
        <h1 class="my-3">Book</h1>
        <a href="./addbook.php"><button type="button" class="btn btn-outline-primary mt-2">Add Books</button></a>
        <hr class="mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Book</th>
                    <th scope="col">Book Code</th>
                    <th scope="col">Operation</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM `book`";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $id=$row['id'];
                            $bookname=$row['Book_Name'];
                            $bookcode=$row['Book_Code'];
                            echo '
                                <tr>
                                    <td scope="row">'.$id.'</td>
                                    <td>'.$bookname.'</td>
                                    <td>'.$bookcode.'</td>
                                    <td>
                                        <button class="btn btn-primary"><a href="../scripts/php/updatebook.php?updateid='.$id.'" class="text-light">Update</button>
                                        <button class="btn btn-danger"><a href="../scripts/php/deletebook.php?deleteid='.$id.'" class="text-light">Delete</button>
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