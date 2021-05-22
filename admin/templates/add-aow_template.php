
<?php
  
// if (!isset(['FILES']['tmp_name']){
//   move_uploaded_file($_FILES['image']['tmp_name'], '../img/updates/'.$_FILES['image']['name']);
// }
  require '../../db/dbconnect.php';

  if( isset($_POST['title'])  &&  isset($_POST['dates']) && isset($_POST['description']) && isset($_POST['image']) && isset($_POST['editOf'])){ 

       //
    if($_POST['editOf'] == ''){
    $add_aow= $pdo->prepare("INSERT INTO animal_week (title,categoryID, loc_id,species,description,dates,image,gender,dob,join_date) VALUES (:title,:categoryID, :loc_id,:species,:description,:dates,:image,:gender,:dob,:join_date)");  
      if($add_aow->execute(['title'=>$_POST['title'],'categoryID'=>$_POST['categoryID'],'loc_id'=>$_POST['loc_id'],'species'=>$_POST['species'],'description'=>$_POST['description'],'dates'=>$_POST['dates'],'image'=>$_POST['image'], 'gender'=>$_POST['gender'],'dob'=>$_POST['dob'],'join_date'=>$_POST['join_date']])){
        // 
        // move_uploaded_file($_FILES['image']['tmp_name']);

        echo '<div class="alert alert-success" role="alert">
          Animal of the week has been added successfully !
      </div>';
      } 
    }

    else{

  $update_aow = $pdo->prepare("UPDATE animal_week SET title=:title,categoryID=:categoryID,loc_id=:loc_id,species=:species, description=:description,dates=:dates, image=:image, gender=:gender, dob=:dob, join_date=:join_date
                 WHERE id=:id"); 

    if(  $update_aow->execute([ 'id'=>$_POST['editOf'] ,'title'=>$_POST['title'] ,'categoryID'=>$_POST['categoryID'] ,'loc_id'=>$_POST['loc_id'] , 'gender'=>$_POST['gender'] ,'species'=>$_POST['species'], 'description'=>$_POST['description'],  'dates'=>$_POST['dates'],'dob'=>$_POST['dob'], 'join_date'=>$_POST['join_date'],
                  'image'=>$_POST['image']])){

      // move_uploaded_file($_FILES['image']['tmp_name'], '../img/updates/'.$_FILES['image']['name']);
       echo '<div class="alert alert-success" role="alert">
          Animal of the week has been updated successfully !
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
    <h1 style="color: #00af;">Add Animal of the Week</h1><br><br>
    <label for="" >Name </label>
  <input type="text" class="form-control" name="title" aria-describedby=""  value="<?php  if(isset( $_POST["hiddenAnnouncement"])){  echo $_POST["hiddenAnnouncement"]; }?>"  required><br>
    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>






<!-- select gender -->
 <div class="form-group">
    <label for="" >Gender</label>
    <select type="text" name="gender"  class="form-control" <?php  if(isset( $_POST["hiddenGender"])){  echo $_POST["hiddenGender"]; }?>  required><br>
  
      <option value="male">Male</option>
      <option value="Female">Female</option>
      <option value="n/a">N/A</option>

    </select>
    <!-- <input type="password" class="form-control" id=""> -->
  </div><br>




<!-- Species  -->
   <div class="form-group">
    <label for="" >Species</label>
    <input type="text" name="species"  class="form-control"  value="<?php  if(isset( $_POST["hiddenSpecies"])){  echo $_POST["hiddenSpecies"]; }?>"    required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- Description  -->
   <div class="form-group">
    <label for="" >Description</label>
    <textarea type="text" name="description"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDescription"])){  echo $_POST["hiddenDescription"]; }?>"  required></textarea><br>
  </div>


  <!-- Date  -->
   <div class="form-group">
    <label for="" >Date</label>
    <input type="date" name="dates"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDates"])){  echo $_POST["hiddenDates"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


  <!-- DOB  -->
   <div class="form-group">
    <label for="" >D.O.B</label>
    <input type="date" name="dob"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDob"])){  echo $_POST["hiddenDob"]; }?>"   required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  <!-- Joined Date  -->
   <div class="form-group">
    <label for="" >Joined Date</label>
    <input type="date" name="join_date"  class="form-control"   value="<?php  if(isset( $_POST["hiddenJoindate"])){  echo $_POST["hiddenJoindate"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- displaying animals status-->
<!--  <div class="form-group">
 <label for="" >Status</label>
       <select type="text" name="display"  class="form-control" value="<?php  //if(isset( $_POST["hiddenStatus"])){  echo $_POST["hiddenStatus"]; }?>"  required><br>
        <option value="Shown">Shown</option> 
        <option value="Hidden">Hidden</option> 
    </select>

  </div>
 -->
  <!-- display status end -->

<!--  -->
 <div class="form-group">
 <label for="" >Category</label>
  <select type="text" name="categoryID"  class="form-control" value="<?php  if(isset( $_POST["hiddenCategory"])){  echo $_POST["hiddenCategory"]; }?>"  required><br> 
    <!-- <option selected=""></option> -->
<?php 
    $animal_cat = $pdo->prepare("SELECT * FROM classification_tbl where archive='1'");
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


<!-- lcation -->
 <div class="form-group">
 <label for="" >Location</label>
  <select type="text" name="loc_id"  class="form-control" value="<?php  if(isset( $_POST["hiddenLocation"])){  echo $_POST["hiddenLocation"]; }?>"  required><br> 
    <!-- <option selected=""></option> -->
<?php 
    $animal_location = $pdo->prepare("SELECT * FROM location where archive='1'");
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




<!-- Image -->
   <div class="form-group">
    <label for="" >Image</label>
    <input type="file" name="image"  class="form-control" value=""  required><br>
    <!-- <input type="password" class="form-control" id=""> -->

   <input type="hidden" name="editOf"  class="form-control" value="<?php  if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>"  required><br>
  </div><br><br>






  <!-- Submit button -->
 <div class="form-group">
    
    <input type="submit" name=""  class="form-control"  value="Submit"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
</main>




                            
                             
                      

            
                      

