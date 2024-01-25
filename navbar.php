
<?php 
session_start();
?>
<!-- php user login codes  -->
<?php
include'db_connect.php';
error_reporting(0);
if (isset($_POST['user_login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $select=$con->query("SELECT * FROM users where email='$email' and password='$password'");
  $rows=mysqli_fetch_array($select);
  if ($rows['email'] == $email AND $rows['password'] == $password) {
    $_SESSION['email'] = $email;
    //header("location:rooms.php");
    echo "<script>window.location.replace('rooms.php')</script>";
  }else{
   echo "<script>alert('INCORRECT USERNAME AND PASSWORD');</script>";
    
  }
  }

 ?>

<!-- php admin login codes  -->
<?php
include'db_connect.php';
error_reporting(0);
if (isset($_POST['admin_login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $select=$con->query("SELECT * FROM admin where username='$username' and password='$password'");
  $rows=mysqli_fetch_array($select);
  if ($rows['username'] == $username AND $rows['password'] == $password) {
    $_SESSION['username'] = $username;
    //header("location:rooms.php");
    echo "<script>window.location.replace('dashbord.php')</script>";
  }else{
    echo "<script>";
    echo 'alert("incorrect username and password")';
    echo "</script>";
    
  }
  }
  ?>
  <!-- php user create account-->
  <?php 
include'db_connect.php';
if (isset($_POST['user_signup'])) {
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
echo "<script>alert('WELL REGISTERED');</script>";
}
else{
  echo "<script>alert(' THE VALUE OF password : '+'$password' +' AND confirmation_password '+'$confirmpassword'+ ' is not the same  try again!! ');</script>";

 
  //echo $password; echo "is not equal to "; echo $confirmpassword; echo "<br>";

  echo "</script>";
}
}
     



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ONLINE HOTEL BOOKING ROOM MS</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="nav/css/bootstrap.min.css">
    <link rel="stylesheet" href="nav/css/style.css">
    <link rel="stylesheet" href="nav/css/responsive.css">
    <link rel="stylesheet" href="nav/css/custom.css">
<style type="text/css">
    
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
    

</head>

<header class="main-header">
       
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="nav/logo/logoo.png" class="logo" alt="" style="width: 8rem; height: 6rem;"></a>
                </div>

<div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp" style="margin-right: 3rem">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="rooms.php"> rooms</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact_us.php">contact Us</a></li>
                        
                    </ul>

                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#userloginModel">Login
          
</button>
<button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#signupModel" style="margin-right: -6rem">signup
          
</button>
                </div>

            </div></nav>

<body>
<div class="modal fade" id="userloginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi-person-circle fs-3 me-2"></i> user login</h5>
             <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close">
             </button>
           </div>
           <div class="modal-body">
            <form method="post">
            <div class="mb-3">
              <label class="form-label">Email </label>
              <input type="email" name="email" class="form-control shadow-none" required>
            </div>
            <div class="mb-4">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control shadow-none" required>
            </div>
            <button type="submit" name="user_login" class="btn" style="background-color:#b0b435"><b>Login</b></button>
        </form>
            
              
              <button class="btn" data-bs-target="#userloginModel2" data-bs-toggle="modal" style="margin-left: 8rem;margin-top: -3.5rem; background-color:#b0b435"><b>ADMIN LOGIN</b></button>
           
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="userloginModel2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="userloginModelLabel2">
          <i class="bi-person-circle fs-3 me-2"></i>ADMIN LOGIN</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
        <div class="mb-3">
              <label class="form-label">Username </label>
              <input type="text" name="username" class="form-control shadow-none" re4>
            </div>
            <div class="mb-4">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control shadow-none" required>
            </div>
            <input type="submit" name="admin_login" value="Login" style="background-color:#b0b435" class="btn">
            </form>
        

      </div>
      <div class="modal-footer">
        <button class="btn" data-bs-target="#userloginModel" data-bs-toggle="modal" style="background-color:#b0b435"><b>Back to user</b> </button>
      </div>
 
    </div>
  </div>
</div>

</body>







            <!-- Modal -->


<div class="modal fade" id="signupModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <form method="post">

      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi-person fs-3 me-2"></i> Registration </h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button> 
      </div>
      <div class="modal-body">
        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">NB:your details must much to the one you have on your ID
        </span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 ps-0 mb-3">
                   <label class="form-label">FIRST NAME </label>
  <input type="text" name="firstname" class="form-control shadow-none" required> 
                </div>
                <div class="col-md-6 p-0">
                   <label class="form-label">LAST name</label>
  <input type="text" name="lastname" class="form-control shadow-none" required> 
                </div>
                <div class="col-md-6 ps-0 mb-3">
                   <label class="form-label">TELEPHONE </label>
  <input type="number" name="telephone" class="form-control shadow-none" required> 
                </div>
                
                <div class="col-md-12 p-0 ">
                   <label class="form-label">Email </label>
  <input type="email" name="email" class="form-control shadow-none" required> 
                </div>
                <div class="col-md-6 ps-0  mb-3">
                   <label class="form-label">address</label>
  
  <textarea name="address" class="form-control shadow-none" rows="1" required></textarea>
                </div>
                <div class="col-md-6 p-0 ">
                   <label class="form-label">DATE OF BIRTH </label>
  <input type="date" id="register" name="dateofbirth" class="form-control shadow-none" required>

</div>
<div class="col-md-6 ps-0 mb-3">
                   <label class="form-label">PASSWORD </label>
  <input type="password" name="password" class="form-control shadow-none" required> 
                </div>
                <div class="col-md-6 p-0">
                   <label class="form-label">CONFIRM PASSORD</label>
  <input type="password" name="confirmpassword" class="form-control shadow-none" required> 
                </div>
               

            
        </div>
        <div class="text-center my-1">
           
           
           <input type="submit" name="user_signup" value="Login" style="background-color:#b0b435" class="btn">
           
            
        </div>
    </div></div></form>
      
    </div>
  </div>
</div>
            

        </header>
</html>



 <script>
   // Get today's date in the format YYYY-MM-DD
    var today = new Date().toISOString().split("T")[0];

    // Get the date input element
    var dateInput = document.getElementById("register");

    // Set the minimum value of the date input to today's date
    dateInput.setAttribute("max", today);

    // Function to handle the input event
    function handleDateInput(event) {
      // Get the selected date value
      var selectedDate = event.target.value;

      // Disable past dates
      if (selectedDate < today) {
        // Clear the selected value
        dateInput.value = "";
      }
    }
 </script>

<!-- ALL JS FILES -->
    <script src="nav/js/jquery-3.2.1.min.js"></script>
    <script src="nav/js/popper.min.js"></script>
    <script src="nav/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
           