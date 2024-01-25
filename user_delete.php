
<?php 
include'db_connect.php';
 ?>
<?php 
session_start();

$user_id=$_GET['user_id'];
$delete=mysqli_query($con,"DELETE FROM users where user_id='$user_id'");
if ($delete) {
	echo "<script>window.location.replace('dashbord.php')</script>";
}
else{

echo "not deleted";
}
?>