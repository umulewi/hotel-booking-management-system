<?php  
session_start();
if (!isset($_SESSION['username'])) {
 header("location:index.php");
}
 ?>

<?php 
    include'links.php';  

     ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="bootstrap/dash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
</head>

<body class="bg-light">
    <div class="menu-wrapper">
        <div class="sidebar-header">
            <div class="sideBar" style="background-color:teal">
                <div class="bg-light"><img src="nav/logo/logoo.png" style="width: 7rem;">
                </div>
                <ul>
                    <li class="selected">
                        <label id="reportButton" onclick="REPORT()" style="cursor: pointer;">
                            <b>REPORT</b>
                        </label>
                    </li>
                    <li class="selected">
                        <label id="toggleButton" onclick="USERS()" style="cursor: pointer;">USERS
                        </label>
                    </li>
                    <li class="selected">
                        <label id="roomButton" onclick="ROOMS()" style="cursor: pointer;">ROOMS
                        </label>
                    </li>
                    <li class="selected">
                        <label id="staffButton" onclick="STAFF()" style="cursor: pointer;">STAFF
                        </label>
                    </li>
                    <li class="selected"> 
                        <label id="customerButton" onclick="CUSTOMER()" style="cursor: pointer;">BOOKED
                        </label>
                    </li>
                    <li class="selected"> 
                        <label id="messageButton" onclick="MESSAGES()" style="cursor: pointer;">MESSAGES
                        </label>
                    </li>
                    <li>
                        <label>
                            <a href="admin_logout.php" class="nav-link">LOGOUT</a>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="backdrop"></div>
            <div class="content">
                <header>
                    <div class="menu-button" id='desktop'>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="menu-button" id='mobile'>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                   
                </header>
                <div class="content-data">
                    <?php if (isset($_GET['error'])): ?>
                        <p><?php echo $_GET['error']; ?></p>
                    <?php endif ?>
                    <!-- REPORT-->
                    <span id="myreport" style="display:">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 mb-4 px-4">
                                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                                        
                                        <h5 class="mt-3">
                                            <?php  
                                            include'db_connect.php';
                                            $select=$con->query("SELECT * from booked");
                                            $count='0';
                                            while($row=mysqli_fetch_assoc($select)){
                                                $count=$count+1;
                                            }
                                            echo "<b>$count</b>". "+ Customers.";
                                            ?>
                                                
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4 px-4">
                                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                                        
                                        <h5 class="mt-3">
                                            <?php  
                                            include'db_connect.php';
                                            $select=$con->query("SELECT * from rooms");
                                            $count='0';
                                            while($row=mysqli_fetch_assoc($select)){
                                                $count=$count+1;
                                            }
                                            echo "<b>$count</b>". "+ Rooms.";
                                            ?>
                                                
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4 px-4">
                                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                                        
                                        <h5 class="mt-3">
                                            <?php  
                                            include'db_connect.php';
                                            $select=$con->query("SELECT * from users");
                                            $count='0';
                                            while($row=mysqli_fetch_assoc($select)){
                                                $count=$count+1;
                                            }
                                            echo "<b>$count</b>". "+ Reviewers.";
                                            ?>
                                                
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4 px-4">
                                    <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                                        
                                        <h5 class="mt-3">
                                            <?php  
                                            include'db_connect.php';
                                    $select=$con->query("SELECT * from staff");
                                    $count='0';
                                    while($row=mysqli_fetch_assoc($select)){
                                        $count=$count+1;
                                    }
                                    echo "<b>$count</b>". "+ Members.";
                                    ?>
                                        
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>
                    <!-- div of users-->
                    <div class="mt-5">
                        <?php
                        include'db_connect.php';
                        ?>
                        <span id="myUsers" style="display:none;">
                            <center><h5 style="color:teal">List Of All Users</h5></center>
                            <table class="table">
                                <tr><th>ID</th><th >FIRSTNAME</th><th>LASTNAME</th><th>TELEPHONE</th><th>GMAIL</th><th>Address</th><th>date of birth</th><th>password</th><th>ACTION</th></tr>
                                <?php 
                                $select=mysqli_query($con,"SELECT * from users");
                                while ($row=mysqli_fetch_array($select)) {
                                    ?>
                                <tr>
                                    <td><?php echo $row['user_id'];?></td>
                                    <td><?php echo $row['firstname'];?></td>
                                    <td><?php echo $row['lastname'];?></td>
                                    <td><?php echo $row['telephone'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['address'];?></td>
                                    <td><?php echo $row['dateofbirth'];?></td>
                                    <td><?php echo $row['password'];?></td>
                                    
                                    <td style="width: -56rem">
                                        <a class="btn custom-bg shadow-none" style="background-color:teal" href="user_delete.php?user_id=<?php echo $row['user_id'];?>"><b>Delete</b>
                                        </a>&nbsp;
                                        <a class="btn custom-bg shadow-none" style="background-color:#b0b435" href="user_update.php?user_id=<?php echo $row['user_id'];?>"><b>Update</b>
                                        </a>
                                    </td>
                                </tr>
                                <?php }
                                ?>
                            </table>
                        </span>
                    </div>
                    <!-- insert all requirements of room -->
                    <div>
                        <span id="myRooms" style="display:none;">
                            <div class="mb-3"><h5 style="color:teal">Add New Room</h5>
                                <form  method="POST" enctype="multipart/form-data" class="form-control" style="width:50%;">
                                    <div>
                                        <input type="file" name="my_image" class="form-control" style="height:3rem">
                                    </div><br>
                                    <div>
                                        <input type="text" name="room_name" placeholder="ROOM-NAME" class="form-control" width="3%">
                                    </div><br>
                                    <div>
                                        <input type="text" name="price" placeholder="PRICE" class="form-control shadow-none">
                                    </div><br>
                                    <div>
                                        
                                        <center><label>STARTING DATE</label></center>
                                        <input type="date" id="starting-date"  name="check_in" placeholder="checkin" class="form-control shadow-none">
                                    </div><br>
                                    <div>
                                        <center><label>ENDING DATE</label></center>
                                        <input type="date" id="ending-date" name="check_out" placeholder="checkout" class="form-control shadow-none">
                                    </div><br>
                                    <div>
                                        <input type="text" name="first_feature" placeholder="FIRST FEATURE" class="form-control shadow-none">
                                    </div><br>
                                    <div>
                                        <input type="text" name="second_feature" placeholder="SECOND FEATURE" class="form-control shadow-none">
                                    </div><br>
                                    <div>
                                        <input type="text" name="third_feature" placeholder="THIRD FEATURE" class="form-control shadow-none">
                                    </div><br>
                                    <div>
                                        <input type="text" name="adult" placeholder="No OF ADULT" class="form-control shadow-none">
                                    </div><br>
                                    <div>
                                        <input type="text" name="childreen" value="<?php echo isset($_POST['childreen']) ? $_POST['childreen'] : 0; ?>" placeholder="No OF CHILDREEN" class="form-control shadow-none">
                                    </div><br>
                                    <input type="submit" name="submit" value="upload" class="btn" style="background-color:#b0b435;">
                                </form>
                            </div>
                            <?php 
                            include'db_connect.php';
                            ?>
                            <?php  
                            if (isset($_POST['submit'])) {
                                $room_name=$_POST['room_name'];
                                $price=$_POST['price'];
                                $checkin=$_POST['check_in'];
                                $checkout=$_POST['check_out'];
                                $status='available';
                                $first_feature=$_POST['first_feature'];
                                $second_feature=$_POST['second_feature'];
                                $third_feature=$_POST['third_feature'];
                                $adult=$_POST['adult'];
                                $childreen=$_POST['childreen'];


                                $target_dir = "uploads/"; 
                                // specify the directory to which the image should be uploaded
                                $target_file = $target_dir . basename($_FILES["my_image"]["name"]);
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                if (move_uploaded_file($_FILES["my_image"]["tmp_name"], $target_file)) {
                                    $sql=$con->query("INSERT INTO rooms(room_id,images,room_name,price,check_in,check_out,status)VALUES ('','$target_file','$room_name','$price','$checkin','$checkout','$status')");
                                    $select=$con->query("SELECT * FROM rooms where room_name='$room_name'");
                                    $row=mysqli_fetch_array($select);
                                    $id=$row['room_id'];
                                    $sql = $con->query("INSERT INTO features VALUES('','$first_feature','$second_feature','$third_feature','$id')");
                                    $sql = $con->query("INSERT INTO guest VALUES('','$adult','$childreen','$id')");
                                    //$sql=$con->query("INSERT INTO guest VALUES('','$_POST[adult]','$_POST[childreen]','$id')");
                                    if ($sql === TRUE) {
                                        echo "new rooms added";
                                    } else {
                                        echo "Error: ".mysqli_error($con);
                                    }}else{
                                        echo " not added";
                                    }
                                }
                                ?>
                                <table class="table">
                                    <tr><th>ID</th><th >ROOM_PICTURE</th><th >NAME</th><th >PRICE</th><th >1ST FEATURE</th><th >2SEC FEATURE</th><th>3RD FEATURE</th><th >NO OF ADULT</th><th >CHILDREN</th><th>S-DATE</th><th>E-DATE</th><th>STATUS</th><th>ACTION</th></tr>
                                    <!-- display all rooms and their description -->
                                    <center><h5 style="color:teal">List Of All Rooms</h5></center>
                                    <?php 
                                    $sql="SELECT * from rooms join features on rooms.room_id= features.room_id join guest on rooms.room_id= guest.room_id";
                                    $result=mysqli_query($con,$sql);
                                    if (mysqli_num_rows($result)>0) {
                                        while($rooms=mysqli_fetch_assoc($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $rooms['room_id'] ?></td>
                                                <td>
                                                    <div class="alb">
                                                        <img style="width: 100px;" src="<?php echo $rooms['images'];?>">
                                                    </div>
                                                </td>
                                                <td><?php echo $rooms['room_name'] ?></td>
                                                <td><?php echo $rooms['price'] ?></td>
                                                <td><?php echo $rooms['first_feature'] ?></td>
                                                <td><?php echo $rooms['second_feature'] ?></td>
                                                <td><?php echo $rooms['third_feature'] ?></td>
                                                <td><?php echo $rooms['adult'] ?></td>
                                                <td><?php echo $rooms['childreen'] ?></td>
                                                <td><?php echo $rooms['check_in'] ?></td>
                                                <td><?php echo $rooms['check_out'] ?></td>
                                                <td><?php echo $rooms['status'] ?></td>

                                                <td><button class="btn"style="background-color:#b0b435"><a class="nav-link" href="room_update.php?room_id=<?php echo $rooms['room_id'] ?>"><b>Update</b></a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button class="btn" style="background-color:teal"><a class="nav-link" href="room_delete.php?room_id=<?php echo $rooms['room_id'] ?>"><b>Delete</b></a>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } }
                                    ?>
                                </table>
                            </span>
                        </div>
                        <div>
                            
                        </div>
                        <!-- staff-->
                        <span id="mystaff" style="display:none;">
                            <h5 style="color:teal">Add New Staff</h5>
                            <div class="mb-3">
                                <form  method="POST" enctype="multipart/form-data" class="form-control" style="width:50%;">
                                    <div>
                                        <input type="text" name="name" placeholder="NAME" class="form-control" width="3%">
                                    </div><br>
                                    <div>
                                        <input type="text" name="role" placeholder="ROLE" class="form-control shadow-none">
                                    </div><br>
                                    <div>
                                        <input type="file" name="picture" class="form-control shadow-none">
                                    </div><br>
                                    <input type="submit" name="staff" value="save" class="btn" style="background-color:#b0b435;">
                                </form>
                            </div>
                            <!--insert new staff-->
                            <?php   
                            include'db_connect.php';
                            if (isset($_POST['staff'])) {
                                $name=$_POST['name'];
                                $role=$_POST['role'];
                                $target_dir = "booked/";
                                $target_file = $target_dir . basename($_FILES["picture"]["name"]);
                                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                                    $insert=$con->query("INSERT  into staff VALUES('','$name','$role','$target_file')");
                                    if ($insert === TRUE) {
                                        echo "new staff member has been added";
                                    } 
                                    else{
                                        echo "not  added";
                                    }}}
                                    ?>
                                    <!-- display staff -->
                                    <center><h5 style="color:teal">List Of All Staff</h5></center>
                                    <table class="table">
                                        <tr><td>STAFF ID</td><td>NAME</td><td>ROLE</td><td>PICTURE</td><td>ACTION</td></tr>
                                        <?php 
                                        include'db_connect.php';
                                        $sql="SELECT * from staff";
                                        $result=mysqli_query($con,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                            while($rooms=mysqli_fetch_assoc($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rooms['staff_id'] ?></td>
                                                    <td><?php echo $rooms['name']?></td>
                                                    <td><?php echo $rooms['role']?></td>
                                                    <td>
                                                        <div class="alb">
                                                            <img style="width: 100px;" src="<?php echo $rooms['picture']?>">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn" style="background-color:teal">
                                                            <a class="nav-link" href="deletestaff.php?staff_id=<?php echo $rooms['staff_id'] ?>">Delete</a>
                                                        </button>
                                                        <button class="btn" style="background-color:#b0b435">
                                                            <a class="nav-link" href="updatestaff.php?staff_id=<?php echo $rooms['staff_id'] ?>">Update</a>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }?>
                                    </table>
                                </span>
                                <!-- messages-->
                                <span id="mymessage" style="display:none;">
                                    <table class="table"><tr><td>#</td><td>MESSAGES</td><td>NAME</td><td>EMAIL</td></tr>
                                        <?php   
                                        $select=$con->query("SELECT * from messages");
                                        while ($row=mysqli_fetch_assoc($select)) {
                                            ?>
                                            <tr>
                                                <td><?php   echo $row['message_id'] ?></td>
                                                <td><?php   echo $row['message'] ?></td>
                                                <td><?php   echo $row['name'] ?></td>
                                                <td><?php   echo $row['email'] ?></td>
                                                <td>
                                                    <button class="btn btn-danger">
                                                        <a class="nav-link" href="deletemessage.php?message_id=<?php echo $row['message_id'] ?>">Delete</a>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php 
                                        } 
                                        ?>
                                    </table>
                                </span>
                                <!-- BOOKED ROOM-->
                                <div class="container">
                                <span id="mycustomer" style="display:none">
                                    <center>
                                        <h5 style="color:teal">List Of booked Rooms</h5>
                                    </center>
                                    <table class="table table-bordered ">
                                        <tr>
                                            <th>ID</th><th>ROOM_PICTURE</th><th>ROOM_NAME</th><th>NAME</th><th>EMAIL</th><th>TELEPHONE</th><th>address</th><th>comment</th><th>CHECKin </th><th>checkout</th>
                                        </tr>
                                        <?php 
                                        include'db_connect.php';
                                        $sql="SELECT * from rooms inner join booked where rooms.room_id = booked.room_id";
                                        $result=mysqli_query($con,$sql);
                                        if (mysqli_num_rows($result)>0) {
                                            while($rooms=mysqli_fetch_assoc($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rooms['room_id'] ?></td>
                                                    <td>
                                                        <div class="alb">
                                                            <img style="width: 200px;" src="<?php echo $rooms['images']?>">
                                                        </div>
                                                    </td>
                                                    <td><?php echo $rooms['room_name']?></td>
                                                    <td><?php echo $rooms['names']?></td>
                                                    <td><?php echo $rooms['email']?></td>
                                                    <td><?php echo $rooms['telephone']?>
                                                        
                                                    </td>
                                                    <td><?php echo $rooms ['address']?>
                                                        
                                                    </td>
                                                    <td><?php echo $rooms ['comment']?>
                                                        
                                                    </td>
                                                    <td><?php echo $rooms ['starting_date']?>
                                                        
                                                    </td>
                                                    <td><?php echo $rooms ['ending_date']?></td>
                                                    <td>
                                                        <button class="btn" style="background-color:teal"><a class="nav-link" href="deletebook.php?room_id=<?php echo $rooms['room_id'] ?>">Delete</a></button>

                                                    </td>
                                                </tr>
                                            <?php } }
                                        ?>
                                    </table>
                                </span>
                                </div>
                    </div>
                </div>
            </div>
        </div>
</body>





<!--script of users-->
<script>
function USERS() {
  var paragraph = document.getElementById("myUsers");
  if (paragraph.style.display === "none") {
    paragraph.style.display = "block";
    document.getElementById("toggleButton").innerHTML = "HIDE USERS";
  } else {
    paragraph.style.display = "none";
    document.getElementById("toggleButton").innerHTML = "<b>SHOW USERS</b>";
  }

}</script> 

<!-- script of rooms--> 
<script>
function ROOMS() {
  var paragraph = document.getElementById("myRooms");
  if (paragraph.style.display === "none") {
    paragraph.style.display = "block";
    document.getElementById("roomButton").innerHTML = "HIDE ROOMS";
  } else {
    paragraph.style.display = "none";
    document.getElementById("roomButton").innerHTML = "<b>SHOW ROOMS</b>";
  }

}</script> 



<script>
function STAFF() {
  var paragraph = document.getElementById("mystaff");
  if (paragraph.style.display === "none") {
    paragraph.style.display = "block";
    document.getElementById("staffButton").innerHTML = "HIDE STAFF";
  } else {
    paragraph.style.display = "none";
    document.getElementById("staffButton").innerHTML = "<b>SHOW STAFF</b>";
  }

}</script>
<script>
function MESSAGES() {
  var paragraph = document.getElementById("mymessage");
  if (paragraph.style.display === "none") {
    paragraph.style.display = "block";
    document.getElementById("messageButton").innerHTML = "HIDE MESSAGES";
  } else {
    paragraph.style.display = "none";
    document.getElementById("messageButton").innerHTML = "<b>SHOW MESSAGES</b>";
  }

}</script>

<script>
function REPORT() {
  var paragraph = document.getElementById("myreport");
  if (paragraph.style.display === "none") {
    paragraph.style.display = "block";
    document.getElementById("reportButton").innerHTML = "HIDE REPORT";
  } else {
    paragraph.style.display = "none";
    document.getElementById("reportButton").innerHTML = "<b>SHOW REPORT</b>";
  }

}</script>

<script>
function BOOKED() {
  var paragraph = document.getElementById("mybooked");
  if (paragraph.style.display === "none") {
    paragraph.style.display = "block";
    document.getElementById("bookedButton").innerHTML = "HIDE BOOKED";
  } else {
    paragraph.style.display = "none";
    document.getElementById("bookedButton").innerHTML = "<b>SHOW BOOKED</b>";
  }

}</script>
<!-- booked-->
<script>
function CUSTOMER() {
  var paragraph = document.getElementById("mycustomer");
  if (paragraph.style.display === "none") {
    paragraph.style.display = "block";
    document.getElementById("customerButton").innerHTML = "HIDE BOOKED";
  } else {
    paragraph.style.display = "none";
    document.getElementById("customerButton").innerHTML = "<b>SHOW BOOKED</b>";
  }

}</script>


<!-- DATE-->

   <script src="bootstrap/js/date.js"></script>            




    <script>
        
        $("#mobile").click(function() {
    $('.sideBar').addClass("showMenu");
    $('.sideBar').removeClass("widthChange");
    $('.backdrop').addClass('showBackdrop')
});
$(".cross-icon").click(function() {
    $('.sideBar').removeClass("showMenu");
    $('.backdrop').removeClass('showBackdrop')
});
$(".backdrop").click(function() {
    $('.sideBar').removeClass("showMenu");
    $('.backdrop').removeClass('showBackdrop')
});
$("#desktop").click(function() {
    $('li label').toggleClass("hideMenuList");
    $('.sideBar').toggleClass("widthChange");
});
$('li').click(function() {
    $('li').removeClass();
    $(this).addClass('selected');
    $('.sideBar').removeClass("showMenu");
});
    </script>


</html>
