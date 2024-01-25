<?php 
include'db_connect.php';
$room_id=$_GET['room_id'];
 ?>
 <?php  
 
 $delete=$con->query("DELETE FROM features where room_id='$room_id'");
 $delete=$con->query("DELETE from guest where room_id='$room_id'");
 $delete=$con->query("DELETE from rooms where room_id='$room_id'");
 if ($delete) {
 header("location:dashbord.php");
 }
 else{
 	echo "not";
 }
?>