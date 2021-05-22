


<?php 
	
	require '../../db/dbconnect.php';
	

	if( isset($_POST['name'])  &&  isset($_POST['gender']) && isset($_POST['size'])  && isset($_POST['species']) && isset($_POST['habitat']) && isset($_POST['editOf'])){ 


		if($_POST['editOf'] == ''){
		$insert_animal= $pdo->prepare("INSERT INTO animals_tbl (name,cat_id,loc_id,diet,gender,size,height,weight, dob, species,habitat,image) VALUES (:name,:cat_id,:loc_id,:diet,:gender,:size,:height,:weight, :dob, :species,:habitat, :image)");  
			if(  $insert_animal->execute(['name'=>$_POST['name'],'cat_id'=>$_POST['cat_id'],'loc_id'=>$_POST['loc_id'],'diet'=>$_POST['diet'],'gender'=>$_POST['gender'],'size'=>$_POST['size'],'height'=>$_POST['height'],'weight'=>$_POST['weight'], 'dob'=>$_POST['dob'], 'species'=>$_POST['species'], 'habitat'=>$_POST['habitat'],'image'=>$_POST['image']])){
				
        echo '<div class="alert alert-success" role="alert" >
          New Animal record has been added successfully !
      </div>';
			}	
		}

		else{

	$update_animal = $pdo->prepare("UPDATE animals_tbl SET name=:name,cat_id=:cat_id,loc_id=:loc_id,diet=:diet,gender=:gender, size=:size,height=:height,weight=:weight, dob=:dob, species=:species ,habitat=:habitat, image=:image
								 WHERE id=:id"); 

		if(  $update_animal->execute([ 'id'=>$_POST['editOf'] ,'name'=>$_POST['name'],'cat_id'=>$_POST['cat_id'],'loc_id'=>$_POST['loc_id'],'diet'=>$_POST['diet'], 'gender'=>$_POST['gender'], 'size'=>$_POST['size'],'height'=>$_POST['height'],'weight'=>$_POST['weight'], 'dob'=>$_POST['dob'],
									'species'=>$_POST['species'],'habitat'=>$_POST['habitat'],'image'=>$_POST['image']])){

			echo '<div class="alert alert-success" role="alert">
			  Animal record has been edited successfully !
			</div>';
        
			
			}
	}


}


 ?>
<!-- Starting -->
<main style="width: 50vw; margin:80px; ">
 	<!-- <strong style="color: #00af;">Add Staffs</strong> -->
 <form method="POST">
 	<!-- Firstname -->
  <div class="form-group">
  	<h1 style="color: #00af;">Add Animals</h1><br><br>
    <label for="" >Name </label>
	<input type="text" class="form-control" name="name" aria-describedby="" value="<?php  if(isset( $_POST["hiddenName"])){  echo $_POST["hiddenName"]; }?>" required><br>
    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>






<!-- select gender -->
 <div class="form-group">
    <label for="" >Gender</label>
    <select type="text" name="gender"  class="form-control" value="<?php  if(isset( $_POST["hiddenGender"])){  echo $_POST["hiddenGender"]; }?>"  required><br>
    
      <option value="male">Male</option>
      <option value="Female">Female</option>
      <option value="n/a">N/A</option>

    </select>
    <!-- <input type="password" class="form-control" id=""> -->
  </div><br>


<!-- size  -->
   <div class="form-group">
    <label for="" >Size (dimension)</label>
    <input type="number" name="size"  class="form-control"  value="<?php  if(isset( $_POST["hiddenSize"])){  echo $_POST["hiddenSize"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


  <!-- height  -->
   <div class="form-group">
    <label for="" >Height (m)</label>
    <input type="number" name="height"  class="form-control"  value="<?php  if(isset( $_POST["hiddenHeight"])){  echo $_POST["hiddenHeight"]; }?>"  required><br>
    
  </div>



  <!-- size  -->
   <div class="form-group">
    <label for="" >Weight (kg.)</label>
    <input type="number" name="weight"  class="form-control"  value="<?php  if(isset( $_POST["hiddenWeight"])){  echo $_POST["hiddenWeight"]; }?>"  required><br>
  </div>



  <!-- DOB  -->
   <div class="form-group">
    <label for="" >D.O.B</label>
    <input type="date" name="dob"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDOB"])){  echo $_POST["hiddenDOB"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- species -->
   <div class="form-group">
    <label for="" >Species</label>
    <input type="text" name="species"  class="form-control" value="<?php  if(isset( $_POST["hiddenSpecies"])){  echo $_POST["hiddenSpecies"]; }?>"   required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>

  <!-- habitat  -->
   <div class="form-group">
    <label for="" >Habitat</label>
    <input type="text" name="habitat"  class="form-control" value="<?php  if(isset( $_POST["hiddenHabitat"])){  echo $_POST["hiddenHabitat"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  <!-- diet  -->
   <div class="form-group">
    <label for="" >Diet Requirements</label>
    <input type="text" name="diet"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDiet"])){  echo $_POST["hiddenDiet"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



<!--  -->
 <div class="form-group">
 <label for="" >Category</label>
  <select type="text" name="cat_id"  class="form-control" value="<?php  if(isset( $_POST["hiddenCategory"])){  echo $_POST["hiddenCategory"]; }?>"  required><br> 
    <!-- <option selected=""></option> -->
<?php 
    $animal_cat = $pdo->prepare('SELECT * FROM classification_tbl where archive="1"');
    $animal_cat->execute();
    $animalList=$animal_cat->fetchAll(); 
    foreach ($animalList as $list_animal) {?> 

        <option value="<?php echo $list_animal['id']?>"><?php echo $list_animal['name']?></option> 
 <?php   }

?>
    </select>
  </div>
  <br>

<!--  -->



<!-- Location -->
 <div class="form-group">
 <label for="" >Location</label>
  <select type="text" name="loc_id"  class="form-control" value="<?php  if(isset( $_POST["hiddenLocation"])){  echo $_POST["hiddenLocation"]; }?>"  required><br> 
    <!-- <option selected=""></option> -->
<?php 
    $animal_location = $pdo->prepare('SELECT * FROM location where archive="1"');
    $animal_location->execute();
    $locList=$animal_location->fetchAll(); 
    foreach ($locList as $list_location) {?> 

        <option value="<?php echo $list_location['id']?>"><?php echo $list_location['location_name']?></option> 
 <?php   }

?>
    </select>
  </div>
  <br>

<!--  -->



<!-- displaying animals status-->
<!--  <div class="form-group">
 <label for="" >Status</label>
       <select type="text" name="archive"  class="form-control" value="<?php  //if(isset( $_POST["hiddenStatus"])){  echo $_POST["hiddenStatus"]; }?>"  required><br>
        <option value="Shown">Shown</option> 
        <option value="Hidden">Hidden</option> 
    </select>

  </div>
 -->
  <!-- display status end -->




   <div class="form-group">
    <label for="" >Image</label>
    <input type="file" name="image"  class="form-control" value="<?php  if(isset( $_POST["hiddenImage"])){  echo $_POST["hiddenImage"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->

   <input type="hidden" name="editOf"  class="form-control" value="<?php  if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>"  required><br>
  </div><br><br>


<!--  -->

<div class="form-group">
   <input type="hidden" name="editOf"  class="form-control" value="<?php  if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>"  required><br>
  </div><br><br>
<!--  -->





  <!-- Submit button -->
 <div class="form-group">
    
    <input type="submit" name=""  class="form-control"  value="Submit" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  
</form>
</main>



<!-- <style type="text/css">
 
  
  main {min-height: 75vh; background-color: #fff; width: 88vw; display: flex; margin: 20px 50px;  color:#444;}
footer {min-height: 5vh; color: white;}


main tr th {font-size:1.5em; padding-left: 30px}
main td {font-size:1em; padding-left: 40px}
.home {padding: 5vw; width: 60vw;}
</style> -->











