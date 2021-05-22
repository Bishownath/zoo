
 <section class="ftco-section ftco-no-pt ftco-no-pb ">
      <div class="container">
        <div class="row d-flex no-gutters">
          <div class="col-md-5 d-flex">
            
          </div>
          <div class="heading-section pt-md-5">
              <h2 class="mb-15">Animal of the Week</h2>
            </div>


<section class="bg-white">
 <ul class="" style=" text-align: center; list-style: none; ">

<?php
  
  // require '../templates/assets.php';
  require "../db/dbConnect.php";
  $weeklyFeatured = $pdo->prepare("SELECT * FROM animal_week WHERE archive='1'");

  $weeklyFeatured->execute();


  foreach ($weeklyFeatured as $aow) {
    echo '<li>';
    echo '<section class="ftco-section">
      <div class="container"> 
      <div class="row">
          <div class="col">
            <div class=""> ';


    if (file_exists('../images/' . $aow['image'])) {
      echo '<a '.$aow['image']. '"><img src="../images/'.$aow['image'] .'" width="550" height="450"<br>';
      echo '</div></div>';
      // echo '</li>';
    }

    echo' <div style="text-align:left;" class="text-secondary">
      <div class="row">
          <div class="col">
            <div class=""> ';
 

    echo '<b> Name:  <b> '  . $aow['title'] . '</b> </b> <br>';
    echo '<b> Species:  <b>' . $aow['species'] . '</b> </b> <br>';
    echo '<b> Announced Date: <b>' . $aow['dates'] . '</b> </b> <br>';
    echo '<b> About: <b>' . $aow['description']. '</b> </b> <br>';
    echo '<b> Gender:   <b>' . $aow['gender']. '</b> </b> <br>';
    echo '<b> Date Joined:  <b>' . $aow['join_date']. '</b> </b><br>';
    echo '<b> Date of Birth: <b>' . $aow['dob']. '</b> </b> <br><br><br>';
    
  
    echo '</div></div></div></div></div></div>';
    echo '</section>';
    echo '</li>';



  }


  ?>
</ul>

</section>

        </div>
      </div>
    </section>