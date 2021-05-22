


<?php 
  
  require '../../db/dbconnect.php';
  

  if( isset($_POST['name'])  &&  isset($_POST['gender']) && isset($_POST['size']) && isset($_POST['editOf'])){ 


    if($_POST['editOf'] == ''){
    $insert_animal= $pdo->prepare("INSERT INTO animal_watchlist (name,gender,size, dates, condition_status,description,image) VALUES (:name,:gender,:size, :dates, :condition_status,:description, :image)");  
      if(  $insert_animal->execute(['name'=>$_POST['name'],'gender'=>$_POST['gender'],'size'=>$_POST['size'], 'dates'=>$_POST['dates'], 'condition_status'=>$_POST['condition_status'],'description'=>$_POST['description'], 'image'=>$_POST['image']])){
        
        echo '<div class="alert alert-success" role="alert" >
          New Animal watclist record has been added successfully !
      </div>';
      } 
    }

    else{

  $update_animal = $pdo->prepare("UPDATE animal_watchlist SET name=:name,gender=:gender, size=:size, dates=:dates, condition_status=:condition_status, description=:description, image=:image
                 WHERE id=:id"); 

    if(  $update_animal->execute([ 'id'=>$_POST['editOf'] ,'name'=>$_POST['name'], 'gender'=>$_POST['gender'], 'size'=>$_POST['size'], 'dates'=>$_POST['dates'],
                  'condition_status'=>$_POST['condition_status'],'description'=>$_POST['description'],'image'=>$_POST['image']])){

      echo '<div class="alert alert-success" role="alert">
        Animal Watchlist record has been edited successfully !
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
    <h1 style="color: #00af;">Add Animal To Watchlist</h1><br><br>
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
    <label for="" >Size </label>
    <input type="number" name="size"  class="form-control"  value="<?php  if(isset( $_POST["hiddenSize"])){  echo $_POST["hiddenSize"]; }?>"  placeholder="in feet" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  <!-- DOB  -->
   <div class="form-group">
    <label for="" >Date</label>
    <input type="date" name="dates"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDates"])){  echo $_POST["hiddenDates"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- Username  -->
   <div class="form-group">
    <label for="" >Condition</label>
    <select type="text" name="condition_status"  class="form-control" value="<?php  if(isset( $_POST["hiddenCondition"])){  echo $_POST["hiddenCondition"]; }?>"  required><br>
    
      <option value="bad">Bad</option>
      <option value="normal">Normal</option>
      <option value="good">Good</option>

    </select>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- Description  -->
   <div class="form-group">
    <label for="" >Description</label>
    <textarea type="text" name="description"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDescription"])){  echo $_POST["hiddenDescription"]; }?>"  placeholder="Animal Description " required></textarea><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


   <div class="form-group">
    <label for="" >Image</label>
    <input type="file" name="image"  class="form-control" value="<?php  if(isset( $_POST["hiddenImage"])){  echo $_POST["hiddenImage"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->

  </div><br><br>


<!--  -->

<div class="form-group">
   <input type="hidden" name="editOf"  class="form-control" value="<?php  if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>"  required><br>
  </div><br><br>
<!--  -->





  <!-- Submit button -->
 <div class="form-group">
    
    <input type="submit" name="submit"  class="form-control"  value="Submit" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  
</form>
</main>








