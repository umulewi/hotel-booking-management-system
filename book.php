


<?php 
include'room_nav.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?php include'links.php'; ?>
</head>
<body>
<?php 

include'db_connect.php';
$room_id=$_GET['room_id'];
$select=mysqli_query($con,"SELECT * FROM rooms");
$row=mysqli_fetch_array($select);
?>




<form method="post" action="" enctype="multipart/form-data" class="mt-5 mx-auto col-10 col-md-8 col-lg-6">
            <div class="mb-3">
              
              <input type="names" name="names" placeholder="Names" class="form-control shadow-none" required>
            </div>
            <div class="mb-4">
              <input type="email" name="email" placeholder="Email" class="form-control shadow-none" required>
              
            </div>
            <div class="mb-4">
              <input type="text" name="telephone"  placeholder="Telephone" class="form-control shadow-none" required>
              
            </div>
            <label>Upload Your Image:</label>

            <div class="mb-4" style="display:flex;">
              
              <input type="file" name="image" class="form-control shadow-none" required>
              
            </div>
            
            <div class="mb-4">

              <input type="text" name="address" placeholder="Address" class="form-control shadow-none">
              
            </div>
            <div class="mb-4">
             <textarea name="comment" class="form-control z-depth-1 h-font" rows="3" placeholder="write your comment..." name="comment" maxlength="150"></textarea>
            </div>
            <label>Choose Your Starting Date</label>
            <div class="mb-4">

              <input type="date" id="starting-date" name="starting_date" placeholder="Starting Date" class="form-control shadow-none">
              
            </div>
            <label>Choose Your Ending Date</label>
            <div class="mb-4">

              <input type="date" id="ending-date" name="ending_date" placeholder="Ending Date" class="form-control shadow-none">
              
            </div>

            <button type="submit" name="submit" class="btn" style="background-color:#b0b435";>Book Now</button>
        </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
	

$room_id=$_GET['room_id']; 
$names=$_POST['names'];
$email=$_POST['email'];
$telephone=$_POST['telephone'];
$address=$_POST['address'];
$comment=$_POST['comment'];
$starting_date=$_POST['ending_date'];
$ending_date=$_POST['ending_date'];




$target_dir = "booked/"; // specify the directory to which the image should be uploaded
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
$insert=$con->query("INSERT  into booked VALUES('','$room_id','$names','$email','$telephone','$target_file','$address','$comment','$starting_date','$ending_date')");
$insert=$con->query("UPDATE rooms set status='booked' where room_id='$room_id'");
if ($insert === TRUE) {
       echo "<b> your booking process has be sent successful!.</b>";
      } 
      
        else{
          echo "not  booked".mysqli_error($con);
        }}}

 ?>
<?php   
include'footer.php';
 ?>
 <script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/date.js"></script>   
