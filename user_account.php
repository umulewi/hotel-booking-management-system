<?php 
include'db_connect.php';
if (isset($_POST['signup'])) {
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $dateofbirth=$_POST['dateofbirth'];
  $password=$_POST['password'];
  $confirmpassword=$_POST['confirmpassword'];
if ($password==$confirmpassword) { 
$insert=mysqli_query($con,"INSERT INTO users  VALUES ('','$firstname','$lastname','$telephone','$email','$address','$dateofbirth','$password','$confirmpassword')");
echo "<script>alert('YOU HAVE SUCCESSFULL REGISTERED SO GO TO LOGIN')<script>";
}
else{
  echo "<script>alert(' THE VALUE OF password : '+'$password' +' AND confirmation_password '+'$confirmpassword'+ ' is not the same  try again!! ');</script>";

 
  //echo $password; echo "is not equal to "; echo $confirmpassword; echo "<br>";

  echo "</script>";
}
}
     



 ?>
