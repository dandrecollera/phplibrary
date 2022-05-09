<?php include '../scripts/php/connection.php' ?>

<?php $homest = true?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrower</title>
    <?php include '../scripts/components/css.php'; ?>
</head>
<body>
    <?php include '../scripts/components/nav.php';  ?>
    <div class="container">
        <h1 class="my-3">Borrower</h1>
        <a href="./addborrower.php"><button type="button" class="btn btn-outline-primary mt-2">Add Borrower</button></a>
        <hr class="mb-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Operation</th>
                </tr>
                </thead>
            <tbody>
                <?php
                    $sql="SELECT * FROM `borrower`";
                    $result = mysqli_query($con, $sql);

                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
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
                                    <td>
                                        <button class="btn btn-primary"><a href="../scripts/php/updateborrower.php?updateid='.$id.'" class="text-light">Update</button>
                                        <button class="btn btn-danger"><a href="../scripts/php/deleteborrower.php?deleteid='.$id.'" class="text-light">Delete</button>
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