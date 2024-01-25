<?php 
include'db_connect.php';
$id=$_GET['message_id'];
 ?>
 <?php  
 $delete=$con->query("DELETE from messages where message_id='$id'");
 if ($delete) {
 header("location:dashbord.php");
 }
 else{
 	echo "not";
 }
?>