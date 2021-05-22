
<?php 
	require '../../db/dbconnect.php';//connection is made

	if(  isset($_POST['delete_value'])  ){ //if isset is usded
		$staff_del = $_POST['delete_value']; //delete value from post method
		unset($_POST['delete_value']); //unseting the delete 
		unset($_POST['submit']);//unsetting the submit

		$delete_staff = $pdo->prepare('DELETE FROM admin_tbl WHERE uid=:uid');//deleting from the tableadmin 
			if(  $delete_staff->execute(['uid'=>$staff_del])  ){ // if condition is used
					echo '<div class="alert alert-danger" role="alert">
				  Staff record has been deleted successfully !
			</div>'; 
	}

}




?>


<main style=" margin:10px; ">
<h2 style="color: #00af;">Manage Staff</h2>

<?php
	require "../../db/dbconnect.php";
	

	// $staffs  = $pdo->prepare('SELECT * FROM user_tbl WHERE type=:type'); //selecting from the table admin
	// $staffs->execute(['type'=>'staff']);//executing 
	// $oneStaff = $staffs->fetchAll();

	$staffs = $pdo->prepare('SELECT * FROM admin_tbl'); 
	$staffs->execute(); 
	$staff = $staffs->fetchAll();



	if($staffs->rowCount()>0){
		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Firstname</th>' ;
		echo '<th>Lastname</th>';
		echo '<th>Email</th>';
		echo '<th>Username</th>';
		echo '<th>Type</th>';
		echo '<th>Status</th>';
		echo '<th>Image</th>';
		echo '<th>Action</th>';
		echo '<th></th>';
		
		
echo '</tr>';


foreach ($staff as $staff) {
    echo '<tr>';
    
    echo '<td>' . $staff['uid'] . '</td>' ;
   	echo '<td>' . $staff['firstname'] . '</td>' ;
   	echo '<td>' . $staff['lastname'] . '</td>';
    echo '<td>' . $staff['email'] . '</td>';
    echo '<td>' . $staff['username'] . '</td>';
    echo '<td>' . $staff['type'] . '</td>';
    echo '<td>' . $staff['visible'] . '</td>';
    echo '<td> <img src="'."../../images/" . $staff['image'] . '" width="80" height="80" ""/></td>';

	echo '<td><form action="add-staff" method="POST">
		  <input type="hidden" name="EDIT" value="'. $staff["uid"].'" ?>
		  <input type="hidden" name="hiddenFirstname"  value="'. $staff["firstname"]. '"	/>
		  <input type="hidden" name="hiddenLastname"  value="' .$staff["lastname"]. '"/> 
		  <input type="hidden" name="hiddenEmail"  value="' .$staff["email"]. '"/>
		  <input type="hidden" name="hiddenUsername"  value="' .$staff["username"]. '"/>
		  <input type="hidden" name="hiddenType"  value="' .$staff["type"]. '"/>
		  <input type="hidden" name="hiddenImage"  value="' .$staff["visible"]. '"/>
		  <input type="hidden" name="hiddenImage"  value="' .$staff["image"]. '"/>
	      <input type="submit" name="submit"  class="btn btn-success" value="Edit">
	      </form></td>


 		  <td><form method="POST">
	      <input type="hidden" name="delete_value" value="' . $staff['uid'] . '" />
	      <input type="submit"  class="btn btn-danger" name="submit" value="Delete">
	      

		
    </form></td>';

    echo '</tr>';


}

echo '</thead>';
echo '</table>';
echo '</div>';


	}


	//

	else{
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Firstname</th>' ;
		echo '<th>Lastname</th>';
		echo '<th>Email</th>';
		echo '<th>Username</th>';
		echo '<th>Password</th>';
		echo '<th>Type</th>';
		echo '<th>Visibility</th>';
		echo '<th>Image</th>';
		echo '<th>Action</th>';
		echo '<th></th>';

echo '</tr>';
echo '</thead>';
echo '</table>';




	}


	?>

</main>
