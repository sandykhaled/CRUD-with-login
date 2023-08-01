<?php session_start();
if(!isset($_COOKIE['fname'])){
  header("Location:login.php");
}
require('db.php');
$pdo=new db();
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
              <h1>Edit Student
                <a href="index.php" class="btn btn-danger float-end">Back</a>
              </h1>
            </div>
            <div class="card-body">

               <form action="code.php" method="post">
                  <?php
                  if(isset($_GET['$err'])){
                    $errorArray=json_decode($_GET['$err'],true);
                    var_dump($errorArray);
                   }
                  $id=$_GET['id'];
                   $statement=$pdo->get_data('std4',"id=$id");


                  // $query="select * from std4 where id=:std_id LIMIT 1";
                  // $statement=$conn->prepare($query);
                  // $data=[':std_id'=>$id];
                  // $statement->execute($data);
                  $result=$statement->fetch(PDO::FETCH_ASSOC);

                  ?>
                  <input type="hidden" name="std_id" value="<?= $result['id']?>">
               First Name <input type="text" name="fname" class="form-control" value="<?= $result['fname']?>">
                Last Name <input type="text" name="lname" class="form-control" value="<?= $result['lname']?>">
               Email <input type="email" name="email" class="form-control" value="<?=$result['email'] ?>">
               Password <input type="password" name="password"class="form-control" value="<?= $result['pass']?>">
               Address <input type="text" name="address"class="form-control" value="<?= $result['address']?>">
               Gender <br>
               Male<input type="radio" name="gender" value ="<?=$result['gender']?>" >
               Female<input type="radio" name="gender" value="<?=$result['gender']?>">
               <br>
               department <br><input type="text" name="department"class="form-control" >
               <br>
      
               <div class="mt-3">
            <button class="btn btn-primary" name="update_Studnet_btn" type="submit">Submit</button>
          </div>
        </form>
            </div>

        </div>
      </div>
    </div>
  </div>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
   
</body>
</html>