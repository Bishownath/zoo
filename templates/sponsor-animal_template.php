

<?php
  
  // require '../templates/assets.php';
  require "../db/dbconnect.php";


  function animalname($id){
  // global $pdo;
  require "../db/dbconnect.php";
  
  $stmt = $pdo->prepare("SELECT * FROM animals_tbl WHERE id=?");
  $stmt->execute([$id]); 
  $user = $stmt->fetch();

  return ($user['name']);
  
}






function animalImage($id){
  // global $pdo;
  require '../db/dbconnect.php';
  $stmt = $pdo->prepare("SELECT * FROM animals_tbl WHERE id=?");
  $stmt->execute([$id]); 
  $user = $stmt->fetch();

  return ($user['a_image']);
  // return ($user['name']);
  
}


function sponsorname($id){

  global $pdo;

  $stmt = $pdo->prepare(" SELECT * FROM sponsor_tbl WHERE id=:id ");
  $stmt->execute([$id]); 
  $user = $stmt->fetch();

  return ($user['company_name']);
  return $id;

}




                                
                                                


$sponsor = $pdo->prepare('SELECT * FROM  sponsor_tbl where status="Yes"'); 
$sponsor->execute();

foreach ($sponsor as $sponsors) {
   
   echo "<li style='list-style:none;'>";



// if (file_exists('../images/' . animalImage($sponsors['id'])  )) {
//       echo '<a href="https://github.com/"><img src="../images/'.animalImage($sponsors['image']) . '" style="border-radius:10px; width:150px; "></a>';
//     }

//    echo animalImage($sponsors['id']);
   
                                    
    

                                




    echo '<div class="details" style=" text-align:left;">';
    echo '<b style="font-size:15px;"> Company Name: <b style="color:#ac5861">' . 
   $sponsors['company_name'] . '</b> </b> <br>';

    echo '<b style="font-size:15px;"> Company Address: <b style="color:#ac5861">' . 
   $sponsors['company_address'] . '</b> </b><br>';

    echo '<b style="font-size:15px;"> Image: <b style="color:#ac5861">' . 
   $sponsors['a_image'] . '</b> </b><br> ';

   echo '<b style="font-size:15px;"> Sponsored Animal: <b style="color:#ac5861">' . 
   animalname($sponsors['aid']) . '</b> </b> <br><br>';

    
    
    
    

    echo '</div>';
    echo "</li>";



 }


  ?>

