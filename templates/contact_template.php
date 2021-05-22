

<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/gallery.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Contact</h1>
          </div>
        </div>
      </div>
    </section>

   

<section class="ftco-section bg-light">
</section>
<?php 


if(  isset($_POST['name']) && isset($_POST['email']) 
 &&  isset($_POST['subject'])   &&  isset($_POST['pnumber']) && isset($_POST['message'])     ){ //if condition is used with isset and setting the fullname and address and email and comment 

  require '../db/dbconnect.php'; //connection

 $insertCom = $pdo->prepare('INSERT INTO contact_tbl (name, email, subject, pnumber, message) 
                VALUES (:name, :email, :subject, :pnumber, :message)'); //inserting into table contact with values 

 if(  $insertCom->execute([ 'name'=>$_POST['name'] , 'email'=>$_POST['email'] , 
              'subject'=>$_POST['subject'] ,'pnumber'=> $_POST['pnumber'],'message'=> $_POST['message']  ]) ){

// unset($_POST); //unsetting the post method 
 echo '<div class="alert alert-primary" role="alert" ">
          Message has been sent !
      </div>';
 }

}

?>

<section id="contact" class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(../images/bg-deer.jpg);">

			<div class="overlay"></div>
    	<div class="container">
    		<div class="row d-md-flex justify-content-end">
    			<div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate">

    				<h2 class="mb-4">Contact Us</h2>
    				<form id="contact" action="" method="POST">
    					<div class="row">
    						<div class="col-md-12">
									<div class="form-group">
			    					<div class="form-field">
	          					<div class="select-wrap">
	                      <div ></div>

	                      	
	                    </div>
			              </div>
			    				</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
			             
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" required data-rule="minlen:4" data-msg="Please enter at least 4 chars"  value="<?php  if(isset( $_POST["hiddenName"])){  echo $_POST["hiddenName"]; }?>"   required ><br>

                <div class="validation"></div>



			            </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">

			              
 <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required data-rule="email" data-msg="Please enter a valid email"   value="<?php if(isset( $_POST["hiddenEmail"])){  echo $_POST["hiddenEmail"]; }?>"   required ><br>


                <div class="validation"></div>


			            </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
			    					<div class="input-wrap">
			            		<!-- <div class="icon"><span class="fa fa-calendar"></span></div> -->
			            		 

                       <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject" required data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"    value="<?php  if(isset( $_POST["hiddenSubject"])){  echo $_POST["hiddenSubject"]; }?>"   required ><br>

                       <div class="validation"></div>

		            		</div>
			    				</div>
								</div>


                


								<div class="col-md-6">
									<div class="form-group">
			    					<div class="input-wrap">
			            		<!-- <div class="icon"><span class="fa fa-clock-o"></span></div> -->
			            		

                      <input type="number" class="form-control" name="pnumber" id="phone" placeholder="Phone Number" required data-rule="minlen:4" data-msg="Please enter at least 10 numbers"    value="<?php  if(isset( $_POST["hiddenPnumber"])){  echo $_POST["hiddenPnumber"]; }?>"   required ><br>

                       <div class="validation"></div>


		            		</div>
			    				</div>
								</div>

                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-wrap">
                      <!-- <div class="icon"><span class="fa fa-calendar"></span></div> -->
                       
<!-- 
                       <input type="text" class="form-control" name="message" id="message" placeholder="Enter Message" required data-rule="minlen:4" data-msg="Please enter at least 8 chars "    value="<?php  //if(isset( $_POST["hiddenMessage"])){  echo $_POST["hiddenMessage"]; }?>"   required ><br>
 -->
                       <textarea type="text" class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"   value="<?php  if(isset( $_POST["hiddenMessage"])){  echo $_POST["hiddenMessage"]; }?>"   required ></textarea><br>

                       <div class="validation"></div>

                    </div>
                  </div>
                </div>
								
                <!-- <div class="map">
    <img src="../images/zooMap.bmp" alt="zooMap" width="260" height="260" style="border-radius: 10px; margin-left: 8px; margin-top: 0px; margin-bottom: 30px;">

    <a href="../images/zooMap.bmp" class="icon image-popup d-flex justify-content-center align-items-center" alt="zooMap" width="260px" height="260px" style="border-radius: 10px; margin-left: 8px; margin-top: 0px; margin-bottom: 30px;">
                <span class="fa fa-expand"></span>
              </a>

   </div> -->

   

  
     <div class="validation"></div>

     

              <br><br>


								<div class="col-md-12">
									<div class="form-group">
			              <div class="text-center"><button type="submit" value="Send" name="submit" class="btn btn-success py-3 px-4">Send </button></div>
			            </div>
								</div>
    					</div>
	          </form>
    			</div>
    		</div>
    	</div>
    </section>





