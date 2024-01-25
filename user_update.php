

<?php 	
include'room_nav.php';
include'db_connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php 	include'links.php'; ?>

</head>
<body>



<?php 

$user_id=$_GET['user_id'];
 $select=$con->query("SELECT * FROM users where user_id=$user_id");
 $row=mysqli_fetch_assoc($select);
?>

<form method="post" action="" class="mt-5 mx-auto col-10 col-md-8 col-lg-6">
            <div class="mb-3" style="display: flex;"><div style="width:10rem">Firstname</div>
              
              <input type="names" name="firstname" value="<?php echo $row['firstname'] ?>"  class="form-control shadow-none">
            </div>
           <div class="mb-3" style="display: flex;"><div style="width:10rem">Lastname</div>
              <input type="text" name="lastname" value="<?php echo $row['lastname'] ?>"  class="form-control shadow-none">
              
            </div>
           <div class="mb-3" style="display: flex;"><div style="width:10rem">Telephone</div>
              <input type="text" name="telephone"  value="<?php echo $row['telephone'] ?>"  class="form-control shadow-none">
              
            </div>
            
           <div class="mb-3" style="display: flex;"><div style="width:10rem">Email</div>
              <input type="email" name="email" value="<?php echo $row['email'] ?>"  class="form-control shadow-none">
              
            </div>
           <div class="mb-3" style="display: flex;"><div style="width:10rem">Addres</div>
              <input type="text" name="address" value="<?php echo $row['address'] ?>"  class="form-control shadow-none">
              
            </div>
            <div class="mb-3" style="display: flex;"><div style="width:10rem">Date-of-birth</div>
              <input type="date" name="dateofbirth" value="<?php echo $row['dateofbirth'] ?>" class="form-control shadow-none">
              
            </div>
            <div class="mb-3" style="display: flex;"><div style="width:10rem">Password</div>
            <input type="text" name="password" value="<?php echo $row['password'] ?>" class="form-control shadow-none"></div>
            <div style="display: flex;"><div style="width:10rem"></div> &nbsp;
                <button type="submit" name="update" class="btn" style="background-color:#b0b435;">Update</button>
              </div>
        </form>


        <?php 

include'footer.php';
  ?>
</body>
</html>
<?php 
if (isset($_POST['update'])) {
  $user_id=$_GET['user_id'];

  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $dateofbirth=$_POST['dateofbirth'];
  $password=$_POST['password'];
  
  $update=$con->query("UPDATE  users set firstname='$firstname',lastname='$lastname',telephone='$telephone',email='$email',address='$address',dateofbirth='$dateofbirth',password='$password',confirmpassword='$password' where user_id='$user_id'");
  if ($update) {
   
    echo "<script>window.location.replace('dashbord.php')</script>";
   
  }
  else{
    echo "not";
  }
  

}


 ?>
 
