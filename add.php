<?php session_start();
include 'db.php';
if(isset($_GET['errors']))
{
  $error_array=json_decode($_GET['errors'],true);
  var_dump($error_array);
}

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
              <h1>Add Student
                <a href="index.php" class="btn btn-danger float-end">Back</a>
              </h1>
            </div>
            <div class="card-body">
            <?php
       if(isset($_GET['$err'])){
        $errorArray=json_decode($_GET['$err'],true);
        var_dump($errorArray);
       }
        
        ?>

               <form action="code.php" method="post" enctype="multipart/form-data">
               First Name <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                Last Name <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
               Email <input type="email" name="email" class="form-control" placeholder="Enter Email">
               Password <input type="password" name="password"class="form-control" placeholder="Enter Password">
               Address <input type="text" name="address"class="form-control" placeholder="Enter Address">
               Gender <br>
              <input type="radio" name="gender" value ="male" >    Male    &nbsp;
              <input type="radio" name="gender" value="female">  Female
              
               <br>Department <br><input type="text" name="department" class="form-control" >
               <br>
                      <input type="file"  name="file-img">
                       <label>Choose file</label>
                    </div>
               
            <button class="btn btn-primary" name="save_Student_btn" type="submit">Submit</button>
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