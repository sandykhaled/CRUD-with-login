<?php
if(!isset($_COOKIE['fname'])){
    header("Location:login.php");
}
require("db.php");
$id=$_GET['id'];
$pdo= new db();
$pdo->get_connection();
$statement=$pdo->delete_data('std4',"id=$id");
$result=$statement->fetch(PDO::FETCH_ASSOC);
header("Location:index.php");
?>