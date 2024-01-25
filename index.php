<?php 	
include'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="bootstrap/boxicons/css/boxicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="swiper/swiper-bundle.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/style.css">
<style type="text/css">
	
</style>
<title>hotel booking</title>
<body class="bg-light">
	<div class="container-fluid">
		<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner" style="height:31rem">
				<div class="carousel-item active">
					<img src="images/view1.jpg" class="d-block w-100" style="height: 100%"  alt="...">
				</div>
				<div class="carousel-item">
					<img src="images/view21.jpg" class="d-block w-100" style="height: 100%"  alt="...">
				</div>
				<div class="carousel-item">
					<img src="images/view31.jpg" class="d-block w-100" style="height: 100%"  alt="...">
				</div>
				<div class="carousel-item">
					<img src="images/view4.jpg" class="d-block w-100" style="height: 100%"  alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
</div>
<div class="container" style="margin-top: -50px;">
	<div class="row">
		<div class="col-lg-12 bg-white shadow p-3 rounded">
			<h5 class="mb-4">Checking Room Availability</h5>
			<form method="post" action="rooms.php">
				<div class="row align-items-end">
					<div class="col-lg-4 mb-3">
						<label class="form-label" style="font-weight: 500">check-in </label>
						<input type="date" id="starting" name="checkin" class="form-control shadow-none" required>
					</div>
					<div class="col-lg-4 mb-3">
						<label class="form-label" style="font-weight: 500">check-out </label>
						<input type="date" id="ending" name="check-out" class="form-control shadow-none" required>
					</div>
					<div class="col-lg-3 mb-3">
						<label class="form-label" style="font-weight: 500">Adult </label>
						<select class="form-select shadow-none" required>
							
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select></div>
						<div class="col-lg-1 mb-lg mb-3">
							<button type="submit" name="submit" class="btn" style="background-color:#b0b454"><b>Search</b></button>
						</div>

					
				</div>
			</form>
		</div>
	</div>
</div>
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
<div class="container">
	<div class="row">
    <?php include'db_connect.php'; 
            $sql=$con->query("SELECT * from rooms join features on rooms.room_id= features.room_id join guest on rooms.room_id= guest.room_id WHERE rooms.status = 'AVAILABLE' ORDER BY rooms.room_id DESC LIMIT 3");
            while($row=mysqli_fetch_assoc($sql)){
            ?>
		<div class="col-lg-4 col-md-6 my-3">


			<div class="card border-0 shadow" style="max-width: 350px; margin: auto;">

  <img src="<?php echo $row['images'];?>" class="card-img-top" style="height: 15rem">
  <div class="card-body">
    <h5><?php  echo $row['room_name'] ?></h5>
    <h6 class="mb-4"><?php  echo $row['price'] ?></h6>
    <div class="feature mb-4">
    	<h6 class="mb-1">Features:</h6>
    	<span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
    		<?php echo  $row['first_feature']; ?>

        </span>
        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
    	<?php echo  $row['second_feature']; ?>
        </span><br>
        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
    		<?php echo $row['third_feature']; ?>
        </span>
    </div>
    <div class="facilities mb-4">
    	
    	<h6 class="mb-1">Rating</h6>

    	<span class="badge rounded-pill bg-light">
    	<i class="bi-star-fill text-warning"></i>
    	<i class="bi-star-fill text-warning"></i>
    	<i class="bi-star-fill text-warning"></i></span>
    	


    </div>

<div class="d-flex justify-content-evenly mb-2">

    <a href="book.php?room_id=<?php echo $row['room_id'] ?>" class="btn  custom-bg shadow-none" style="background-color: #b0b435;"><b>Booking</b></a>

    
    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#MOREDETAILS<?php echo $row['room_id'];?>_">Moredetails</button>
                <?php   include'moredetails.php'; ?>
    
</div>
  </div>
</div>

	
		</div>
    <?php 
}
     ?>

<!-- CLOSING-->




		
	</div>
		<div class="col-lg-12 text-center mt-5">
			<a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">
			More Rooms>>></a>
			
		</div>
	</div>
</div>


<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Comments</h2>

<div class="container">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper mb-5">
      <?php 
      $sql=$con->query("SELECT * from booked");
      while($row=mysqli_fetch_assoc($sql)){
        ?>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
       
          <img src="<?php echo $row['image'] ?>" width="100px;" height="100px"; >
          <h6 class="m-0 ms-2"><?php echo $row['names'] ?></h6>
        
        </div>
        <p><?php echo $row['comment'] ?></p>
        <div class="Rating">
        	<i class="bi-star-fill text-warning"></i>
    	<i class="bi-star-fill text-warning"></i>
    	<i class="bi-star-fill text-warning"></i>
        	
        </div>
</div>

<?php 
}
 ?>




        
        
    </div>

    <div class="swiper-pagination"></div>
  </div>
</div>
<!-- end of testomies-->

<!-- find us-->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">find us</h2>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-light rounded ">
			<iframe class="w-100 rounded" height="320px " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63798.177542551086!2d30.042692372502326!3d-2.0007135521899677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca8a4421b2e29%3A0x1b2bae7af1f7dbd0!2sGatenga%2C%20Kigali!5e0!3m2!1sen!2srw!4v1682931303509!5m2!1sen!2srw"loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="col-lg-4 col-md-4">
			
			<div class="bg-white p-4 rounded mb-3">
				<h5> Call us</h5>
				<a href="tel:+250787079467" class="d-inline-block mb-2 text-decoration-none text-dark">
					<i class="bi-telephone-fill"></i>+250787079467
				</a>
				<br>
				<a href="tel:+250787079467" class="d-inline-block mb-2 text-decoration-none text-dark">
					<i class="bi-telephone-fill"></i>+250787079467
				</a>

			</div>
			<div class="bg-white p-4 rounded mb-4">
				<h5> Follow us</h5>
				<a href="https://twitter.com/MC_Lele1" class="d-inline-block mb-3">
					<span class="badge bg-light text-dark fs-6 p-2">
						<i class="bi-twitter me-l"></i>
						Twitter
					</span>

				</a>
				<br>
				<a href="https://www.linkedin.com/in/l-lewis-59454324b/" class="d-inline-block mb-3">
					<span class="badge bg-light text-dark fs-6 p-2">
						<i class="bi-linkedin me-l"></i>
						Linkedin
					</span>

				</a>
				<br>
				<a href="https://www.instagram.com/_lewis.2/" class="d-inline-block mb-3">
					<span class="badge bg-light text-dark fs-6 p-2">
						<i class="bi-instagram me-l"></i>
						Instagram
					</span>

				</a>
				

			</div>
			
		</div>
	</div>
</div>
<!-- end of find us -->
<?php 	
include'footer.php';
 ?>


<script src="bootstrap/js/date.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="swiper/swiper-bundle.min.js"></script>



<script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40, 
        },

        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },
      
    });
  </script>


  <script>
 
    var today = new Date().toISOString().split("T")[0];
    var dateInput = document.getElementById("starting"); 
    dateInput.setAttribute("min", today);
    function handleDateInput(event) { 
      var selectedDate = event.target.value;
      if (selectedDate < today) {  
        dateInput.value = "";
      }
    }
 </script>
 <script>
 
    var today = new Date().toISOString().split("T")[0];
    var dateInput = document.getElementById("ending"); 
    dateInput.setAttribute("min", today);
    function handleDateInput(event) { 
      var selectedDate = event.target.value;
      if (selectedDate < today) {  
        dateInput.value = "";
      }
    }
 </script>
</html>