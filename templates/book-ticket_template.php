<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/gallery.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Ticket <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Ticket</h1>
          </div>
        </div>
      </div>
    </section>

 <section id="tickets" class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 style="margin-top: -80px;">Book Ticket</h2>
            <b  style="color:green; font-size: 30px;">1 Day Pass</b>

          </div>
        </div>
        <div  class="row"  style="margin-left: 180px;display: flex; text-align: center; width: 60vw;">
          <div class="row-md-4 ftco-animate">
            <div class="block-7">
              <!-- <div class="img" style="background-image: url(../images/ticket.jpg);"></div> -->
              <img src="../images/ticket.jpg" height="300" width="770">
              <div class="text-center p-4">
                <span class="excerpt d-block"></span>
                <span class="price"><sup>£</sup> <span class="number">15.00</span><samp>/mos</samp>
              
                <ul class="pricing-text mb-5">
                  <li><span class="fa fa-check mr-2"></span>£ 6.00 Regular</li>
                  <li><span class="fa fa-check mr-2"></span>£ 3.00 Student</li>
                  <li><span class="fa fa-check mr-2"></span>£ 2.00 Children</li>
                  <!-- <li><span class="fa fa-check mr-2"></span>Free Supports</li> -->
                </ul>

</span>
</div>
</div>
</div>
              <!-- <a href="../templates/user/tickets_template.php" class="btn btn-primary d-block px-2 py-3">Buy Ticket</a> -->



<!--  -->
<?php 


if(  isset($_POST['name']) && isset($_POST['ticket_type']) 
 &&  isset($_POST['ticket_number'])   &&  isset($_POST['dates']) ){ //if condition is used with isset and setting the fullname and address and email and comment 

  require '../db/dbconnect.php'; //connection

 $insertCom = $pdo->prepare('INSERT INTO tickets (name, ticket_type, ticket_number, dates,other) 
                VALUES (:name, :ticket_type, :ticket_number, :dates, :other)'); 

 if(  $insertCom->execute([ 'name'=>$_POST['name'] , 'ticket_type'=>$_POST['ticket_type'] , 
              'ticket_number'=>$_POST['ticket_number'] ,'dates'=> $_POST['dates'],'other'=> $_POST['other']]) ){

// unset($_POST); //unsetting the post method 
 echo '<div class="alert alert-primary" role="alert" ">
          Your ticket has been booked !
      </div>';

 }
 // header("Location:index.php");

}

?>

<!--  -->
<!--  form start-->
<!-- <strong style="float: left;"> Book Tickets </strong><br><br> -->
<form method="POST">
  <!-- Firstname -->
  <div class="form-group">
    <!-- <h1 style="color: #00af; margin-left: 490px; margin-top: -100px;">Add Events</h1><br><br> -->

    <label for="" style="  margin-left: 0px;display: flex; text-align: center; width: 50vw;">Name </label>
  <input type="text" class="form-control" name="name" aria-describedby=""  value="<?php  if(isset( $_POST["hiddenName"])){  echo $_POST["hiddenName"]; }?>"  style="background: #fff;  margin-left: 0px;display: flex; text-align: center; width: 50vw;" required placeholder="Buyer name"><br>
    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>







<!-- select person -->
 <div class="form-group">
    <label for="" style="  margin-left: 0px;display: flex; text-align: center; width: 50vw;">Ticket Type</label>
    <select type="text" name="ticket_type"  class="form-control" value="<?php  if(isset( $_POST["hiddenTicket"])){  echo $_POST["hiddenTicket"]; }?>"  required><br>
    
      <option value="regular">Regular</option>
      <option value="student">Student</option>
      <option value="children">Children</option>

    </select>
    <!-- <input type="password" class="form-control" id=""> -->
  </div><br>



<!-- Ticket count  -->
   <div class="form-group">
    <label for=""  style="  margin-left: 0px;display: flex; text-align: center; width: 50vw;">Number of Ticket</label>
    <input type="number" name="ticket_number"  class="form-control"  value="" style="background: #fff;  margin-left: 0px;display: flex; text-align: center; width: 50vw;" required placeholder="Number of required ticket"><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>




  <!-- Date  -->
   <div class="form-group">
    <label for=""  style="  margin-left: 0px;display: flex; text-align: center; width: 50vw;">Date</label>
    <input type="date" name="dates"  class="form-control"  value="" style="background: #fff;  margin-left: 0px;display: flex; text-align: center; width: 50vw;" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  <!-- Description  -->
   <div class="form-group">
    <label for=""  style="  margin-left: 0px;display: flex; text-align: center; width: 50vw;">Other</label>
    <input type="text" name="other"  class="form-control"  value="" style="background: #fff;  margin-left: 0px;display: flex; text-align: center; width: 50vw;" required placeholder="Make some query regarding ticket"><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


  


<!--  -->
   <div class="form-group">
   <input type="hidden" name="editOf"  class="form-control" value="" style="background: #fff;  margin-left: 0px;display: flex; text-align: center; width: 50vw;" required><br>
  </div>





  <!-- Submit button -->
 <div class="form-group">
    
    <input type="submit" name=""  class="btn btn-success d-block px-2 py-3"  value="Buy Ticket"   style="  margin-left: 0px;display: flex; text-align: center; width: 50vw;" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form> 
          </div>
        </div>
      </div>
      </section>