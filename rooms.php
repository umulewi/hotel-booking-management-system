
 <?php 
include'room_nav.php';
  ?>
 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php    include'links.php';  ?>
    
 </head>
<body>
  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-0">
          <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
            <div class="container-fluid flex-lg-column align-items-stretch">
              <h4 class="mt-2">FILTERS</h4>
              <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                <form method="post">
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                  <label class="form-label">Check-in</label>
                  <input type="date" id="starting" name="checkin" class="form-control shadow-none mb-3" required>
                  <label class="form-label">Check-Out</label>
                  <input type="date"  id="ending" name="checkout" class="form-control shadow-none" required >
                </div>
                <div class="border bg-light p-3 rounded mb-3">
                  <h5 class="mb-3" style="font-size: 18px;">People</h5>
                   <div class="d-flex">
                    <div class="me-2">
                      <label class="form-label">
                        Adults
                      </label>
                      <input type="number" name="adult" class="form-control shadow-none">
                    </div>
                    <div>
                      <label class="form-label">Children</label>
                      <input type="number" name="childreen" class="form-control shadow-none">
                    </div>
                  </div><br>
                  <input type="submit" name="search" value="SEARCH" class="btn" style="background-color:#b0b435";>
                  
                </div>
              </form>
              </div>
            </div>
          </nav>
        </div>
        <div class="col-lg-9 col-md-12 px-4">
          
          
          <div class="card mb-4 border-0 shadow">
            
            <div class="row g-0 p-3 align-items-center">
              <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                <img src="room1.JPG" class="img-fluid rounded">
              </div>
              <div class="col-md-5 px-lg-3 px-md-3 px-0">
                <h5 class="mb-3"><?php echo $row['room_name'] ?></h5>
                <div class="features mb-4">
                  <h6 class="mb-1">Features:</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['first_feature']; ?>
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['second_feature']; ?>
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['third_feature']; ?>
                  </span>
                </div>
                <div class="guests">
                  <h6 class="mb-1">Guests</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['adult'];?> Adult
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['childreen'];?> Childreen
                  </span>
                </div>
              </div>
              <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                <h6 class="mb-4"><?php echo $row['price'];?> per night </h6>
                <a href="book.php?room_id=<?php echo $row['room_id'] ?>" class="btn btn-sm   shadow-none mb-2" style="background-color: #b0b434;">Book Now</a>
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#MOREDETAILS<?php echo $row['room_id'];?>_">Moredetails</button>
                <?php   include'moredetails.php'; ?>
                
              </div>
            </div></div>
            <?php 
          }

}
else{
   $sql=$con->query("SELECT * from rooms join features on rooms.room_id= features.room_id join guest on rooms.room_id= guest.room_id AND rooms.status='available'"); 

            while($row=mysqli_fetch_assoc($sql)){
            ?>
          <div class="card mb-4 border-0 shadow">
            
            <div class="row g-0 p-3 align-items-center">
              <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                <img src="<?php echo $row['images'];?>" class="img-fluid rounded">
              </div>
              <div class="col-md-5 px-lg-3 px-md-3 px-0">
                <h5 class="mb-3"><?php echo $row['room_name'] ?></h5>
                <div class="features mb-4">
                  <h6 class="mb-1">Features:</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['first_feature']; ?>
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['second_feature']; ?>
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['third_feature']; ?>
                  </span>
                </div>
                <div class="guests">
                  <h6 class="mb-1">Guests</h6>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['adult'];?> Adult
                  </span>
                  <span class="badge rounded-pill bg-light text-dark text-wrap">
                    <?php echo $row['childreen'];?> Childreen
                  </span>
                </div>
              </div>
              <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                <h6 class="mb-4"><?php echo $row['price'];?> per night </h6>
                <a href="book.php?room_id=<?php echo $row['room_id'] ?>" class="btn btn-sm   shadow-none mb-2" style="background-color: #b0b434;">Book Now</a>
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#MOREDETAILS<?php echo $row['room_id'];?>_">Moredetails</button>
                <?php   include'moredetails.php'; ?>
                
              </div>
            </div></div>
            <?php 
          }

}
             ?>
          
        </div>
      </div>
    </div>
  </div>             
  
          
</button> 
   <!-- -->
    </body> </html> 
   

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

<script src="bootstrap/js/date.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>


    

    




