
<?php  
session_start();
if(isset($_SESSION['email'])) {

$user=$_SESSION['email'];
 }
elseif(isset($_SESSION['username'])) {
 
  $admin=$_SESSION['username'];

}
else{
  header("location:index.php");
}

 ?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
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

                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#userloginModel">Logout
          
</button>

          
</button>
                </div>

            </div></nav>

<body>
<div class="modal fade" id="userloginModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
            <i class="bi-person-circle fs-3 me-2"></i> LOGOUT</h5>
             <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close">
             </button>
           </div>
           <div class="modal-body">
            <form method="post" action="user_logout.php">
            <div class="mb-3">
              <p>do you real wanna logout </p>
            </div>
            
            <button type="submit" name="user_logout" class="btn" style="background-color:#b0b435;">Logout</button>
            
        </form>
            
              
              
           
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
              <input type="text" name="password" class="form-control shadow-none" required>
            </div>
            <input type="submit" name="admin_login" value="login">
            </form>
        

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#userloginModel" data-bs-toggle="modal">Back to user </button>
      </div>
 
    </div>
  </div>
</div>

</body>







            <!-- Modal -->


<div class="modal fade" id="signupModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <form method="post" action="user_account.php">

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
  <input type="date" name="dateofbirth" class="form-control shadow-none" required>
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
           
           <button type="submit" name="signup" class="btn btn-primary">signup</button>
           
           
            
        </div>
    </div></div></form>
      
    </div>
  </div>
</div>
            

        </header>
</html>

<!-- user login php-->  


 <!-- admin alogin-->

 <?php 


  ?>

<!-- ALL JS FILES -->
    <script src="nav/js/jquery-3.2.1.min.js"></script>
    <script src="nav/js/popper.min.js"></script>
    <script src="nav/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
           