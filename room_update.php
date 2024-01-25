

<?php 
include'links.php';
include'db_connect.php';
include'room_nav.php';
?>
<?php
$room_id=$_GET['room_id'];
$sql=$con->query("SELECT * from rooms LEFT JOIN features ON rooms.room_id= features.room_id LEFT JOIN guest ON rooms.room_id= guest.room_id where rooms.room_id='$room_id'");
$row=mysqli_fetch_array($sql);
?>

<form  method="POST" enctype="multipart/form-data" class="mt-5 mx-auto col-10 col-md-8 col-lg-5" style="margin-top: 2rem;">
    <div>
    <div style="display: flex;">
        <div style="width:10rem">IMAGE</div> &nbsp;
    	<input type="file" name="my_image" class="form-control" style="height:3rem" required>
    </div><br>
    <div style="display: flex;">
        <div style="width:10rem">ROOM-NAME</div> &nbsp;
    	<input type="text" name="room_name" value="<?php echo $row['room_name'] ?>" placeholder="ROOM-NAME" class="form-control" >
    </div><br>
    <div style="display: flex;">
        <div style="width:10rem">PRICE</div> &nbsp;
    	<input type="text" name="price" value="<?php echo $row['price'] ?>" placeholder="PRICE" class="form-control shadow-none">
    </div><br>
    <div style="display: flex;">
        <div style="width:10rem">1ST-FEATURE</div> &nbsp;
    	<input type="text" name="first_feature" value="<?php echo $row['first_feature'] ?>" placeholder="FIRST FEATURE" class="form-control shadow-none">
    </div><br>
    <div style="display: flex;">
        <div style="width:10rem">2SEC-FEATURE</div> &nbsp;
    	<input type="text" name="second_feature" value="<?php echo $row['second_feature'] ?>" placeholder="SECOND FEATURE" class="form-control shadow-none">
    </div><br>
    <div style="display: flex;">
        <div style="width:10rem">3RD-FEATURE</div> &nbsp;
    	<input type="select" name="third_feature" value="<?php echo $row['third_feature'] ?>" placeholder="THIRD FEATURE" class="form-control shadow-none"></div><br>
    <div style="display: flex;">
        <div style="width:10rem">No.ADULT</div> &nbsp;
        <input type="text" name="adult" value="<?php echo $row['adult'] ?>" placeholder="No OF ADULT" class="form-control shadow-none">
    </div><br>
    <div style="display: flex;">
        <div style="width:10rem">No.CHILDREEN</div> &nbsp;
        <input type="text" name="childreen" value="<?php echo $row['childreen'] ?>" placeholder="No OF CHILDREEN" class="form-control shadow-none"></div><br>
     <div style="display: flex;"><div style="width:10rem">No.CHILDREEN</div>
        
        <input type="text"  value="<?php echo $row['status'] ?>">
        &nbsp;
        <select name="status" required>
        <option value="available" <?php if ($row['status']=="available") echo "selected";?>> available</option>
        
        <option value="Booked" <?php if ($row['status']=="Booked") echo "selected";?>> Booked</option>
    </select>
</div>
        
           
       
        </div><br>
<div style="display: flex;"><div style="width:10rem"></div> &nbsp;
    <input type="submit" name="update" value="update" class="btn" style="background-color:#b0b435;"></div>
</div>
</form>



<?php 
include'footer.php';
 ?>

<?php 
if (isset($_POST['update'])) {
    $target_dir = "uploads/"; 
    $target_file = $target_dir . basename($_FILES["my_image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   if (move_uploaded_file($_FILES["my_image"]["tmp_name"], $target_file)){ 
   $room_name=$_POST['room_name'];
   $price=$_POST['price'];
   $first_feature=$_POST['first_feature'];
   $second_feature=$_POST['second_feature'];
   $third_feature=$_POST['third_feature'];
   $adult=$_POST['adult'];
   $childreen=$_POST['childreen'];
   $status=$_POST['status'];
   $update=$con->query("UPDATE rooms set images='$target_file',room_name ='$room_name',price='$price',status='$status' WHERE room_id='$room_id'");
  
   $update=$con->query("UPDATE features set first_feature='$first_feature',second_feature='$second_feature',third_feature='$third_feature' WHERE room_id='$room_id'");
   $update=$con->query("UPDATE guest set adult='$adult',childreen='$childreen' WHERE room_id ='$room_id'");
   if ($update) {
    echo "<script>window.location.replace('dashbord.php')</script>";
   }
   else{
    echo "not";
   }}

   
}
 ?>