
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
              <h1>Login
                <a href="index.php" class="btn btn-danger float-end">Back</a>
              </h1>
            </div>
            <div class="card-body">
              <?php
              if(isset($_GET['error'])){
                ?>
                <div class="alert alert-success">
                  Invalid Email or Password
                      </div>
                <?php
              }
              ?>
               <form action="code.php" method="post" >
              
               Email <input type="email" name="email" class="form-control" placeholder="Enter Email">
               Password <input type="password" name="password"class="form-control" placeholder="Enter Password">
               
            <button class="btn btn-primary" name="Login" type="submit" value="Login">Submit</button>
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