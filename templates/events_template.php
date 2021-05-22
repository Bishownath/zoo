 <section class="hero-wrap hero-wrap-2" style="background-image: url('../images/gallery.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Events <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Events</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			
          <div class="heading-section pt-md-5">
              <h2 class="mb-4">Upcoming events</h2>
            </div>


<section class="bg-light" style="width: 300vw;" >
            <ul>

    			  <?php
  
  // require '../templates/assets.php';
  require "../db/dbconnect.php";
  $events = $pdo->prepare("SELECT * FROM events where archive= '1'");

  $events->execute();


  foreach ($events as $aow) {
    
     echo '<section class="ftco-section ">
      <div class="container"> 
      <div class="row">
          <div class="col">
            <div class="">';

    if (file_exists('../images/' . $aow['image'])) {
      echo '<a '.$aow['image']. '"><img src="../images/'.$aow['image'] . '" " style="width:500px;" <br><br><br> ';
      // echo '</div></div>';
    }
    echo '</div></div></div></div>';
    echo' <div style="text-align:left;" class="text-secondary">
      <div class="row">
          <div class="col">
            <div class=""> ';

    echo '<b> Name: <b>' . $aow['title'] . '</b> </b> <br>';
    echo '<b> Event Description: <b>' . $aow['description'] . '</b> </b> <br>';
    echo '<b> Event Duration: <b>' . $aow['duration'] . ' Day(s)</b> </b> <br>';
    echo '<b> Event Date: <b>' . $aow['dates'] . '</b> </b>';
    
    

    echo '</div></div></div></div>
    </section>';
    


  }


  ?>
</ul>
</section> <br><br><br><br>

        </div>
    	</div>
    </section>



