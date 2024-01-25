
<div class="modal fade" id="MOREDETAILS<?php echo $row['room_id'];?>_" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form method="GET">
            <div class="modal-header">
               <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close">
                  
               </button>
            </div>
            <div class="modal-body">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-9">
                        <img src="<?php echo $row['images'];?>" class="img-fluid rounded">
                     </div>
                     <div class="col-lg-3" style="margin-top:2rem">
                        <div class="border bg-light p-3 rounded mb-3">
                           <h5 class="mb-3" style="font-size: 18px;">
                           AVAILABLE DATE
                        </h5>
                        <label class="form-label">FROM</label><br>
                        <?php    echo $row['check_in']; ?><BR>
                        <label class="form-label">TO</label><br>
                        <?php    echo $row['check_out']; ?>
                     </div>
                     <button class="btn" style="background-color:#b0b435;"><a class="nav-link"  href="book.php?room_id=<?php echo $row['room_id'] ?>">Book Now</a></button>
                  </div>
               </div>
            </div>
         </div>
         <div class="text-center my-1">
            
         </div>
      </form>
   </div>
  </div>
</div>