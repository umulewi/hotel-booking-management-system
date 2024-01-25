
<?php 
include'links.php';
include'db_connect.php';
include'room_nav.php';
?>
<?php   
$id=$_GET['staff_id'];
$select=$con->query("SELECT * FROM staff where staff_id='$id'");
$row=mysqli_fetch_array($select);
?>
<form method="post" action="" enctype="multipart/form-data" class="mt-5 mx-auto col-10 col-md-8 col-lg-6">

    <div style="display: flex;"><div style="width:10rem">NAME:</div>
        <input type="text" value="<?php echo $row['name']; ?>" name="name" placeholder="NAME" class="form-control" width="3%">
    </div><br>
   <div style="display: flex;"><div style="width:10rem">Role:</div>
        <input type="text" value="<?php echo $row['role'] ?>" name="role" placeholder="ROLE" class="form-control shadow-none">
    </div><br>
 <div style="display: flex;"><div style="width:10rem">Picture:</div>
        <input type="file"  name="my_image" class="form-control shadow-none">
    </div><br>
    <input type="submit" name="update" value="Update" class="btn" style="background-color:#b0b435;">
</form>
<?php   
if (isset($_POST['update'])) {

    $target_dir = "uploads/"; 
    $target_file = $target_dir . basename($_FILES["my_image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   if (move_uploaded_file($_FILES["my_image"]["tmp_name"], $target_file)){

    $name=$_POST['name'];
    $role=$_POST['role'];
    $insert=$con->query("UPDATE staff set name='$name',role='$role',picture='$target_file' where staff_id='$id'");
    if ($insert) {
    echo "<script>window.location.replace('dashbord.php')</script>";
    }
    else{
        echo "not";
    }}}
 ?>
<?php   include'footer.php'; ?>