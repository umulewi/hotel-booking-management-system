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
    <?php  include'links.php'; ?>
    <style>
        *{
            font-family: 'Poppins',sans-serif;
        }
        .h-font{
            font-family: 'Mariend',cursive;
        }
        .x-line{
        	width: 150px;
        	margin: 0 auto;
        	height: 1.7px;
        }
        .box{
            border-top-color: var(--teal)!important;
        }
    </style>
    <title>
        
    </title>
</head>
<body class="bg-light">
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">ABOUT US</h2>
        <div class="h-line bg-dark"></div>
        <div style=" margin-left: 3rem;margin-right:3rem;">Welcome to the world of modern hospitality! In today's fast-paced digital era, the online hotel booking industry has become a cornerstone of the travel and tourism sector. To cater to the growing demand for seamless and efficient hotel bookings, I am excited to present my project proposal on the topic of "Online Booking Hotel Room Management System."
            
        </div>
        
    </div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
                <?php 
      $sql=$con->query("SELECT * from staff  LIMIT 1");
      while($row=mysqli_fetch_assoc($sql)){
        ?>
                <h3 class="mb-3"><?php  echo $row['name'] ?></h3>
                <p>Our aims is to handle gues's inquiries and resolve any issues that arose promptly and courteously.our didication is ensurering that our guests are in good condition
                </p>
            
            </div>
            <div class="col-lg-4 col-md-4 mb-4 order-lg-2 order-md-1 order-1">
                <img src="<?php echo $row['picture'] ?>" class="w-100">
                <?php   } ?>
            </div>
        </div>
    </div>
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
                    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">management team </h2>
                    <div class="container px-4">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper mb-5">
                                <?php 
      $sql=$con->query("SELECT * from staff");
      while($row=mysqli_fetch_assoc($sql)){
        ?>
                                <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                                    <img src="<?php echo $row['picture'] ?>" class="w-100">
                                    <h5 class="mt-2"><?php  echo $row['role'] ?></h5>
                                </div>
                                
                                
                                
<?php   
}
 ?>
                                
                                
                            </div>
                            <div class="swiper-pagination">
                                
                            </div>
                        </div></div>


<!-- messages-->



<!-- footer-->
<?php include'footer.php';?>
 <script src="bootstrap/js/bootstrap.min.js"></script>
<script src="swiper/swiper-bundle.min.js"></script>
 <script>
    var swiper = new Swiper(".mySwiper", {
      
      
      
      
      
      slidesPerView: "4",
      spaceBetween: 60,
      
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          
        },
        640: {
          slidesPerView: 1,
          
        },
        768: {
          slidesPerView: 2,
          
        },

        1024: {
          slidesPerView: 3,
          
        },
      },
      
    });
  </script>


 </body>
 </html>