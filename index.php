<?php
require('db.php');
$errors=[];
ini_set('display-errors','1');
ini_set('display-startup-errors','1');
error_reporting(E_ALL);
session_start();
var_dump($_SESSION['fname']);
if(!isset($_SESSION['fname'])){
    header("Location:login.php");
}
echo 'Hello '.$_COOKIE['fname'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/all.css">
    <link rel="stylesheet" href="style/all.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>

</head>
<body>
    <div class="container">
        <div class="row">
           <div class="col-md12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h1> Registration 
                        <a href="add.php" class="btn btn-primary float-end">Add Student</a>
                    </h1>
                </div>
                <div class="card-body">
                    <table class=" table table-bordered table-striped table-hover">
                        <tr>
                        <th>ID</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Department</th>
                            <th>Img</th>
                           <th>Actions</th>
                        </tr>
                      <?php
                      $pdo=new db();
                      $pdo->get_connection();
                     $statement= $pdo->get_data('std4');
                      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                      if($result)
                      {
                        foreach($result as $key=>$item)
                        {
                            ?>
                            <tr>
                                
                                
                                <td><?=$item['id']?></td>
                                <td><?=$item['fname']?></td>
                                <td><?=$item['lname']?></td>
                                <td><?=$item['email']?></td>
                                <td><?=$item['pass']?></td>
                                <td><?=$item['address']?></td>
                                <td><?=$item['gender']?></td>
                                <td>Open Source</td>
                                <td><img src="./images/$item"></td>
                                <td>
                                <a href="view.php?id=<?= $item['id']?>" class="btn btn-success">View</a>
                                     <a href="edit.php?id=<?= $item['id']?>"class="btn btn-primary">Edit</a>
                                    <a href="delete.php?id=<?= $item['id']?>" class="btn btn-danger">Delete</a>
                            
                            </td>
                            
                           
                            </tr>
                            <?php
                        }
                      }
                      else{
                       
                        
                      ?>
                      <tr>
                        <td colspan="10">No Recorded Found</td>
                      </tr>
                      <?php }?>
                    </table>
                </div>
            </div>
           </div>
        </div>
    </div>
<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/style.js"></script>
   
</body>
</html>
