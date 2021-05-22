<section class="hero-wrap hero-wrap-2" style="background-image: url('../images/gallery.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="video-gallery">Video Gallery <i class="ion-ios-arrow-forward"></i></a></span> <span>Image Gallery <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Gallery</h1>
          </div>
        </div>
      </div>
    </section>

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
       
      echo '<a '.$image['image']. '"><img src="../images/'.$image['image'] . '" width="350" height="350" "></a>';
      // echo '<a '. $video['video'].'"><img src="../../images/video/'. $video["video"]  .'" width="100%" height="200px" controls></a>';

            // echo '</div></div></div></div>';
      // echo '<a '. $video "../../images/video/". $animals['video']  .'" width="100%" height="200px" controls>Video Not Found</video></td>';

    }

   
     
      // echo '<a href="../images/'.$image['image']. '"><img src="../images/'.$image['image'] . '" style="width:400px; "/>';
  }




?>   
<br>

</ul>
        </div>
      </div>

		</section>



