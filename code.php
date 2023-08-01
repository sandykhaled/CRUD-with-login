<?php
if(!isset($_COOKIE['fname'])){
    header("Location:login.php");
}
require("db.php");
$pdo=new db();
session_start();
ini_set('display-errors','1');
ini_set('display-startup-errors','1');
error_reporting(E_ALL);
if(isset($_POST['update_Studnet_btn'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $department=$_POST['department'];
    $std_id=$_POST['std_id'];
    $pdo->get_connection();
    $statement=$pdo->update_data('std4'," fname='$fname',lname='$lname',email='$email',pass='$pass',address='$address',gender='$gender',department='$department' "," id=$std_id ");
    // $query="update std4 set fname=:fname,lname=:lname,email=:email,pass=:pass,address=:address,gender=:gender,department=:department where id=:std_id";
    // $query_run=$pdo->get_connection()->prepare($query);
    // $data=[
    //     ':std_id'=>$std_id,
    //     ':fname'=>$fname,
    //     ':lname'=>$lname,
    //     ':email'=>$email,
    //     ':pass'=>$pass,
    //     ':address'=>$address,
    //     ':gender'=>$gender,
    //     ':department'=>$department

    // ];
    // $query_excuted=$query_run->execute($data);
    if($statement){
      $_SESSION['message']="Updated Successfully";
      header("Location:index.php");
      exit(0);
    }
    else{

        $_SESSION['message']="Not Updated Successfully";
        header("Location:index.php");
        exit(0);
    }
}


if(isset($_POST['save_Student_btn'])){
  



$errors=[];
ini_set('display-errors','1');
ini_set('display-startup-errors','1');
error_reporting(E_ALL);
echo "<pre>";
var_dump($_FILES);
move_uploaded_file($_FILES['file-img']['tmp_name'],'images/'.$_FILES['file-img']['name']);
echo "</pre>";
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$email=trim($_POST['email']);
$pass=trim($_POST['password']);
$address=trim($_POST['address']);
$gender=trim($_POST['gender']);
$department=trim($_POST['department']);
if(empty($fname)){
    $errors['fname']="Please Enter first name";
}
else{
    if(strlen($fname)<2)
    {
        $errors['fname']="Please enter minimum 2 chars";
    }
}

if(empty($email)){
    $errors['email']="Please Enter Email";
}
else{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email']="Please Enter Validate Email";
    }
}
if(empty($pass)){
    $errors['pass']="Please Enter Password";
}
if(count($errors)>0)
{
    $err=json_encode($errors);
    header("Location:add.php?errors=$err");
}
else{
    $img=$_FILES['file-img']['tmp_name'] ;
    $pdo->get_connection();
    $statement=$pdo->insert_data('std4',"fname,lname,email,pass,address,gender,department,img","'$fname','$lname','$email','$pass','$address','$gender','$department','$img'");
    
    echo "Done";
}
}
if(isset($_POST['Login'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $pdo->get_connection();
     $statement=$pdo->get_data('std4',"email='$email' and pass='$pass'");
  
    $result=$statement->fetch(PDO::FETCH_ASSOC);
    if($result)
     {
        $_SESSION['fname']=$result['fname'];
   setcookie("fname",$result['fname']);
   setcookie("email",$result['email']);
   header("Location:index.php");
    }
   else{
    header("Location:login.php?error");
    }
}

?>