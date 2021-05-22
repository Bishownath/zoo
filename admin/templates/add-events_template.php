
<?php
  require '../../db/dbconnect.php'; 
 

// if (!isset(['FILES']['tmp_name']){
//   move_uploaded_file($_FILES['image']['tmp_name'], '../img/updates/'.$_FILES['image']['name']);
// }
  
  if( isset($_POST['title'])  &&  isset($_POST['dates']) && isset($_POST['description']) && isset($_POST['image']) && isset($_POST['editOf'])){ 

       //
    if($_POST['editOf'] == ''){
    $add_event= $pdo->prepare("INSERT INTO events (title,description,duration,dates,image) VALUES (:title,:description,:duration,:dates,:image)");  
      if($add_event->execute(['title'=>$_POST['title'],'description'=>$_POST['description'],'duration'=>$_POST['duration'],'dates'=>$_POST['dates'],'image'=>$_POST['image']])){
        // 
        // move_uploaded_file($_FILES['image']['tmp_name']);

        echo '<div class="alert alert-success" role="alert">
          Events has been added successfully !
      </div>';
      } 
    }

    else{

  $update_event = $pdo->prepare("UPDATE events SET title=:title, description=:description,duration=:duration,dates=:dates, image=:image
                 WHERE id=:id"); 

    if($update_event->execute([ 'id'=>$_POST['editOf'] ,'title'=>$_POST['title'] , 'description'=>$_POST['description'],'duration'=>$_POST['duration'],  'dates'=>$_POST['dates'], 'image'=>$_POST['image'] ])){

      // move_uploaded_file($_FILES['image']['tmp_name'], '../img/updates/'.$_FILES['image']['name']);
       echo '<div class="alert alert-success" role="alert">
          Events has been edited successfully !
      </div>';
      
      }
  }


}
 ?>




<!-- Starting -->
<main style="width: 50vw; margin:80px;">
  <!-- <strong style="color: #00af;">Add Staffs</strong> -->
 <form method="POST">
  <!-- Firstname -->
  <div class="form-group">
    <h1 style="color: #00af;">Add Events</h1><br><br>

    <label for="">Name </label>
  <input type="text" class="form-control" name="title" aria-describedby=""  value="<?php  if(isset( $_POST["hiddenTitle"])){  echo $_POST["hiddenTitle"]; }?>" required><br>
    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>




<!-- Description  -->
   <div class="form-group">
    <label for="">Description</label>
    <textarea type="text" name="description"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDescription"])){  echo $_POST["hiddenDescription"]; }?>" required></textarea><br>
  </div>




<!-- Duration  -->
   <div class="form-group">
    <label for="">Duration</label>
    <input type="number" name="duration"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDuration"])){  echo $_POST["hiddenDuration"]; }?>"   required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>





  <!-- Date  -->
   <div class="form-group">
    <label for="">Date</label>
    <input type="date" name="dates"  class="form-control"  value="<?php  if(isset( $_POST["hiddenDates"])){  echo $_POST["hiddenDates"]; }?>" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


  


<!-- Image -->
   <div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image"  class="form-control" value="" required><br>
    <!-- <input type="password" class="form-control" id=""> -->

   <input type="hidden" name="editOf"  class="form-control" value="<?php  if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>" required><br>
  </div><br><br>





  <!-- Submit button -->
 <div class="form-group">
    
    <input type="submit" name=""  class="form-control"  value="Submit" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>



  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
</main>




                            
                             
                      

            
                      

