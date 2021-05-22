
<?php
  require '../../db/dbconnect.php'; 
  $statement= $pdo->prepare('SELECT * FROM admin_tbl WHERE username= :username ');
    $criteria= [
        'username'=>$_SESSION['sessionUname']

    ];

     $statement->execute($criteria);
    if($statement-> rowCount() > 0){
      $row= $statement->fetch(); 

 ?>

<?php
}

if(isset($_POST['submit'])){
require '../../db/dbconnect.php';
$query = "UPDATE admin_tbl SET firstname = :firstname,
            lastname = :lastname, 
            email = :email,  
            username = :username, 
            password = :password 
            WHERE uid = :uid";

$statement = $pdo->prepare($query);         
$statement->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);  
$statement->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);       
$statement->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$statement->bindParam(':username', $_POST['username'], PDO::PARAM_STR);    
$statement->bindParam(':password', $_POST['password'], PDO::PARAM_STR);  
$statement->bindParam(':uid', $_SESSION['sessionUID'], PDO::PARAM_INT);  

if($statement->execute()) {

  echo '<div class="alert alert-success" role="alert" >
          Details  has been updated successfully !
      </div>';

// header("Location: index.php");


}

}
?>


 <main style="width: 50vw; margin:80px; ">
  <!-- <strong style="color: #00af;">Add Staffs</strong> -->
 <form method="POST">




  <!-- Firstname -->
  <div class="form-group">
        <h2 style="color: #00af;">Edit Details</h2><br><br>
    <label for="">Firstname </label>
  <input type="text" class="form-control" name="firstname" aria-describedby="" value="<?php echo $row['firstname']; ?>" required><br>
    <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>

<!-- Lastname -->
  <div class="form-group">
    <label for="">Lastname</label>
    <input type="text" name="lastname"  class="form-control"  value="<?php echo $row['lastname']; ?>" required><br>
    <!-- <input type="password" class="form-control" id="exampleInputPassword1"> -->
  </div>

<!-- Email  -->
   <div class="form-group">
    <label for="">Email ID</label>
    <input type="email" name="email"  class="form-control" value="<?php echo $row['email']; ?>"  required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!-- Username  -->
   <div class="form-group">
    <label for="">Username</label>
    <input type="text" name="username"  class="form-control" value="<?php echo $row['username']; ?>" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>

  <!-- Password  -->
   <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password"  class="form-control" value="" required><br>

  </div>



  <!-- Submit button -->
 <div class="form-group">
    
    <input type="submit" name="submit"  class="form-control"  value="Submit" required><br>
    <!-- <input type="password" class="form-control" id=""> -->
  </div>


<!--   <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->


  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
</form>
</main>




