<?php 
include'db_connect.php';
$id=$_GET['staff_id'];
 ?>
 <?php  
 
 
 
 $delete=$con->query("DELETE from staff where staff_id='$id'");
 if ($delete) {
 header("location:dashbord.php");
 }
 else{
 	echo "not";
 }
?>