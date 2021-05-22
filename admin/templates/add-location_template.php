
<?php
  require '../../db/dbconnect.php';




if( isset($_POST['location_name']) && isset($_POST['editOf'])){ 


if($_POST['editOf'] == ''){
    $insert_cat= $pdo->prepare("INSERT INTO location (location_name) VALUES (:location_name)");  
      if(  $insert_cat->execute(['location_name'=>$_POST['location_name']])){
        
        echo '<div class="alert alert-success" role="alert">
         Location has been added successfully !
      </div>'; 
      } 
    }

    else{

  $update_cat = $pdo->prepare("UPDATE location SET location_name=:location_name WHERE id=:id"); 

    if(  $update_cat->execute([ 'id'=>$_POST['editOf'] ,'location_name'=>$_POST['location_name']])){

      
      echo '<div class="alert alert-success" role="alert">
        Location has been updated successfully !
      </div>';      
      }
  }
}
?>







<!--  -->
<main style="width: 50vw; margin:80px;">
  <!-- <strong style="color: #00af;">Add Staffs</strong> -->
 <form method="POST">
  <!-- Firstname -->
  <div class="form-group">
    <h2 style="color: #00af;">Add Location</h2><br><br>
    <label for="">Location</label>
  <input type="text" class="form-control" name="location_name" aria-describedby=""  value="<?php  if(isset( $_POST["hiddenLocation"])){  echo $_POST["hiddenLocation"]; }?>" required><br>
    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>


<!-- displaying animals status-->
<!--  <div class="form-group">
 <label for="">Status</label>

       <select type="text" name="display"  class="form-control" value="<?php  //if(isset( $_POST["hiddenStatus"])){  echo $_POST["hiddenStatus"]; }?>" required><br>
        <option value="Shown">Shown</option> 
        <option value="Hidden">Hidden</option> 
    </select>

  </div>
 -->
  <!-- display status end -->



<!--  -->

<div class="form-group">
   <input type="hidden" name="editOf"  class="form-control" value="<?php  if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>" required><br>
  </div><br><br>
<!--  -->




  <!-- Submit button -->
 <div class="form-group">
    
    <input type="submit" name="upload"  class="form-control"  value="Submit" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
</main>
