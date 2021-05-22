<div class="hero-wrap js-fullheight" style="background-image: url('../images/bg-tig.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-11 ftco-animate text-center">
          	<h1 class="mb-4"><br><span>Claybrook<br></span>ZOO</h1>
            <h1 class="mb-4" style="font-size: 30px;"><span>Call of</span> the Wild</h1>
            <!-- <p><a href="#" class="btn btn-primary mr-md-4 py-3 px-4">Learn more <span class="ion-ios-arrow-forward"></span></a></p> -->
          </div>
        </div>
      </div>
    </div>




<!-- Animal of the week -->

                <?php require 'weeklyFeatured_template.php'; ?></a>


            

<!-- gallery start -->
<section class="ftco-section bg-light">
      <div class="contain er ">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Animal Gallery</h2>
          </div>
        </div>
          <section class="ftco-section">
      <div class="container">
        <div class="row">
       
<ul class="" style=" text-align: center; list-style: none; ">

      <?php 
// include database connection 
include "../db/dbconnect.php"; 
 
// select the image 
// $query = "select * from gallary WHERE id = :id"; 
 $gallery = $pdo->prepare("SELECT * FROM gallary WHERE archive='1'");

  $gallery->execute();
  $gallary= $gallery->fetchAll();




  foreach ($gallary as $image) {
    
    if (file_exists('../images/' . $image['image'])) {
       
      echo '<a '.$image['image']. '"><img src="../images/'.$image['image'] . '"width="350" height="350" "></a>';

            // echo '</div></div></div></div>';

    }
     
      // echo '<a href="../images/'.$image['image']. '"><img src="../images/'.$image['image'] . '" style="width:400px; "/>';
  }




?>   
<br>


</ul>

        </div>
        <button type="button" class="btn btn-dark"><a href="gallery">View Gallery</a></button>
      </div>

    </section>

      </div>
    </section>


    <!-- gallery end -->
	

<section class="ftco-section testimony-section">
</section>
    <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img">
		<img src="../images/area.png" width="800">   
    	<div class="overlay">

<div class="container">
        
          <div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate">
            <h2 class="mb-4">Map of Zoo</h2>
          

          <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m8!1m3!1d51835.090377246364!2d-88.592261!3d35.709168!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d35.7084019!2d-88.6342208!5e0!3m2!1sen!2snp!4v1591619183328!5m2!1sen!2snp" width="600" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


        </div>
      </div>
         
      </div>
    	
    </section>


<section class="ftco-section bg-light testimony-section">
</section>