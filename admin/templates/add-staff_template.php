
<?php
	require '../../db/dbconnect.php'; 


	if( isset($_POST['firstname'])  &&  isset($_POST['lastname']) && isset($_POST['email'])  && isset($_POST['username']) && isset($_POST['editOf'])){ 


		if($_POST['editOf'] == ''){
		$insert_staff= $pdo->prepare("INSERT INTO admin_tbl (firstname,lastname,email,username,password, visible, type,image) VALUES (:firstname,:lastname,:email,:username,:password, :visible, :type,:image)");  
			if(  $insert_staff->execute(['firstname'=>$_POST['firstname'],'lastname'=>$_POST['lastname'],'email'=>$_POST['email'],'username'=>$_POST['username'], 'password'=>$_POST['password'], 'visible'=>$_POST['visible'],'type'=>$_POST['type'],  'image'=>$_POST['image']])){
				// header('Location:manage_staff');
				echo '<div class="alert alert-success" role="alert">
				  Staff record has been added successfully !
			</div>'; 
			}	
		}

		else{

	$update_staff = $pdo->prepare("UPDATE admin_tbl SET firstname=:firstname,lastname=:lastname, email=:email, username=:username ,password=:password,visible=:visible, type=:type,  image=:image
								 WHERE uid=:uid"); 

		if(  $update_staff->execute([ 'uid'=>$_POST['editOf'] ,'firstname'=>$_POST['firstname'], 'lastname'=>$_POST['lastname'], 'email'=>$_POST['email'],
									'username'=>$_POST['username'],'password'=>$_POST['password'], 'visible'=>$_POST['visible'],'type'=>$_POST['type'],'image'=>$_POST['image']])){

			// header('Location:manage_staff');
			echo '<div class="alert alert-success" role="alert">
				  Staff record has been updated successfully !
			</div>';			
			}
	}


}
 ?>

 <main style="width: 50vw; margin:80px; ">
  <!-- <strong style="color: #00af;">Add Staffs</strong> -->
 <form method="POST">
  <!-- Firstname -->
  <div class="form-group">
    <h2 style="color: #00af;">Add Staff</h2><br><br>
    <label for="">Firstname </label>
  <input type="text" class="form-control" name="firstname" aria-describedby="" value="<?php  if(isset( $_POST["hiddenFirstname"])){  echo $_POST["hiddenFirstname"]; }?>" required><br>
    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>

<!-- Lastname -->
  <div class="form-group">
    <label for="">Lastname</label>
    <input type="text" name="lastname"  class="form-control"  value="<?php  if(isset( $_POST["hiddenLastname"])){  echo $_POST["hiddenLastname"]; }?>" required><br>
    <!-- <input type="password" class="form-control" id="exampleInputPassword1"> -->
  </div>

<!-- Email  -->
   <div class="form-group">
    <label for="">Email ID</label>
    <input type="email" name="email"  class="form-control" alue="<?php  if(isset( $_POST["hiddenEmail"])){  echo $_POST["hiddenEmail"]; }?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- Username  -->
   <div class="form-group">
    <label for="">Username</label>
    <input type="text" name="username"  class="form-control" value="<?php  if(isset( $_POST["hiddenUsername"])){  echo $_POST["hiddenUsername"]; }?>" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>

  <!-- Password  -->
   <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password"  class="form-control" value="<?php  if(isset( $_POST["hiddenPassword"])){  echo $_POST["hiddenPassword"]; }?>" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- Type -->
 <div class="form-group">
    <label for="">Type</label>
    <!-- <input type="text" name="type"  class="form-control" value="<?php  //if(isset( $_POST["hiddenType"])){  echo $_POST["hiddenType"]; }?>" required><br> -->
    <!-- <input type="password" class="form-control" id=""> -->

     <select type="text" name="type"  class="form-control" <?php  if(isset( $_POST["hiddenType"])){  echo $_POST["hiddenType"]; }?> required><br><br>
    
      <option value="admin">Admin</option>
      <option value="manager">Manager</option>
      <option value="zookeeper">Zoo-Keeper</option>

    </select>
  </div><br><br>


<!-- select visibility -->
 <div class="form-group">
    <label for="">Status</label>
    <select type="text" name="visible"  class="form-control" <?php  //if(isset( $_POST["hiddenVisible"])){  echo $_POST["hiddenVisible"]; }?> required><br>
    <option selected="Select">Select Status</option>
      <option value="Live">Live</option>
      <option value="Dormant">Dormant</option>

    </select> 
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- Image -->
  <div class="form-group">
    <label for="">Image</label>
    <input type="file" name="image"  class="form-control" value="" required><br>
    
    <!-- Hidden -->
    <input type="hidden" name="editOf"  class="form-control"  value="<?php  if(isset( $_POST["EDIT"])){  echo $_POST["EDIT"]; }?>" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


  <!-- Submit button -->
 <div class="form-group">
    
    <input type="submit" name=""  class="form-control"  value="Submit" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!--   <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->


  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
</main>
