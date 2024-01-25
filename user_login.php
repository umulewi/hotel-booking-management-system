<?php 
include'links.php';
include'db_connect.php';
session_start();
error_reporting(0);
if (isset($_POST['login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $select=$con->query("SELECT * FROM users where email='$email' and password='$password'");
  $rows=mysqli_fetch_array($select);
  if ($rows['email'] == $email AND $rows['password'] == $password) {
    $_SESSION['email'] = $email;
    header("location:rooms.php");
  }else{
  	echo "<script>";
    echo 'alert("incorrect")';
    echo "</script>";
    
  }
  }

 ?>

    