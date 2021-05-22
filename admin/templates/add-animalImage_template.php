


<?php 
	
	require '../../db/dbconnect.php';
	

	if( isset($_POST['image'])  && isset($_POST['editOf'])){ 


		if($_POST['editOf'] == ''){
		$insert_image= $pdo->prepare("INSERT INTO gallary (image,video) VALUES ( :image,:video)");  
			if(  $insert_image->execute(['image'=>$_POST['image'],'video'=>$_POST['video']])){
				
        echo '<div class="alert alert-primary" role="alert" >
          New media has been added successfully !
      </div>';
			}	
		}

		else{

	$update_image = $pdo->prepare("UPDATE gallary SET image=:image, video=:video
								 WHERE id=:id"); 

		if(  $update_image->execute([ 'id'=>$_POST['editOf'], 'image'=>$_POST['image'] , 'video'=>$_POST['video']])){

			echo '<div class="alert alert-success" role="alert">
			  Media has been updated successfully !
			</div>';
        
			
			}
	}


}


 ?>
<!-- Starting -->
<main style="width: 50vw; margin:80px; ">
 	<h2 style="color: #00af;">Add Image / Video</h2>
 <form method="POST">


 
   <div class="form-group" enctype='multipart/form-data'>
    <label for="" >Image</label>
    <input type="file" name="image"  class="form-control" value="<?php  if(isset( $_POST["hiddenImage"])){  echo $_POST["hiddenImage"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->

   <!-- <input type="hidden" name="editOf"  class="form-control" value="<?php  //if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>"  required><br> -->
  </div><br><br>



     <div class="form-group" enctype='multipart/form-data'>
    <label for="" >Video</label>
    <input type="file" name="video"  class="form-control" value="<?php  if(isset( $_POST["hiddenVideo"])){  echo $_POST["hiddenVideo"]; }?>" ><br>
    <!-- <input type="password" class="form-control" id=""> -->

   <!-- <input type="hidden" name="editOf"  class="form-control" value="<?php  //if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>"  required><br> -->
  </div><br><br>


<!--  -->


<!-- displaying animals status-->
<!--  <div class="form-group">
 <label for="" >Status</label>
 <select name="display" >  
       <select type="text" name="display"  class="form-control" value="<?php  //if(isset( $_POST["hiddenStatus"])){  echo $_POST["hiddenStatus"]; }?>"  required><br>
        <option value="Shown">Shown</option> 
        <option value="Hidden">Hidden</option> 
    </select>

  </div>
 -->
  <!-- display status end -->




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











