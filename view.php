<?php if(!isset($_COOKIE['fname'])){
    header("Location:login.php");
}?>
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
    <div class="card">
      <div class="card-header">
        <h1>view
          <a href="index.php" class="btn btn-danger float-end">Back</a>
        </h1>
      </div>

    <div class="card-body">
<table class="table table-bordered table-hover">
    <thead>
      <tr>
         <th>ID</th>
         <th>FirstName</th>
         <th>LastName</th>
         <th>Email</th>
         <th>Password</th>
         <th>Address</th>
         <th>Gender</th>
         <th>Department</th>
    
      </tr>
    </thead>
    <tbody>
<?php
require('db.php');
$id=$_GET['id'];
$pdo=new db();
$pdo->get_connection();
$statement=$pdo->get_data('std4',"id=$id");
// $query="SELECT * FROM std4 WHERE id=$id";
// $statement=$conn->prepare($query);
// $statement->execute();
$result=$statement->fetch(PDO::FETCH_ASSOC);
foreach($result as $item)
echo "<td>$item</td>";

?>

</tbody>

</table>
</div>
  </div>
  </div>
<script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/all.min.js"></script>
   
</body>
</html>