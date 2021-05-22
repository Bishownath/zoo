
<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_category'])  ){ 
		$loc_del = $_POST['delete_category'];
		unset($_POST['delete_category']); 
		unset($_POST['submit']);

		$deleteLoc = $pdo->prepare('DELETE FROM location WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteLoc->execute(['id'=>$loc_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				  Location has been deleted successfully !
			</div>';
	}

}

	
 ?>


  <?php 
 		require '../../db/dbconnect.php';
 		if(isset($_POST['archive_location'])  ){ 
		$location_archive = $_POST['archive_location'];
		unset($_POST['archive_location']); 
		unset($_POST['submit']);

		
		
		$location_query = $pdo->prepare("SELECT * FROM location WHERE id=:id");

		$location_query->execute(['id'=>$location_archive]);

		$location_exec= $location_query->fetch();

		$archive_value = $location_exec['archive'];

		$archiveLocation = $pdo->prepare("UPDATE location SET archive=:archive WHERE id=:id");
		
			if ($archive_value== 0) {
				$criteria['archive']=1;
			}
			else{
				$criteria['archive']=0;
			}
			$criteria['id']= $location_archive;

			$archiveLocation->execute($criteria); 
			echo '<div class="alert alert-warning" role="alert">';

			if ($archive_value==1) {
			   	    echo'	Location has been archived  !
			</div>';
		
	    }
	    else{
	    		    echo'	Location has been unarchived  !
			</div>';
	

	    }
			

}


  ?>




 
<main>
<strong style="color: #00af;">Manage Classification</strong>

	<?php
require '../../db/dbconnect.php';

	$stmt_location = $pdo->prepare('SELECT * FROM location'); 
	$stmt_location->execute(); 
	$loc = $stmt_location->fetchAll();




	if($stmt_location->rowCount()>0){
		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Location</th>' ;
		// echo '<th>Status</th>' ;
		echo '<th></th>';
		echo '<th>Actions</th>';
		echo '<th></th>';

		
		
		

echo '</tr>';


foreach ($loc as $locations) {
    echo '<tr>';
    echo '<td>' . $locations['id'] . '</td>' ;
   	echo '<td>' . $locations['location_name'] . '</td>' ;
   	// echo '<td>' . $locations['display'] . '</td>' ;
  
   echo '<td><form action="add-location" method="POST">
		  <input type="hidden" name="EDIT" value="'. $locations["id"].'" ?>
		  <input type="hidden" name="hiddenLocation"  value="'. $locations["location_name"]. '"	/>
		  
	      <input type="submit" class="btn btn-success" name="submit" value="Edit">
	      </form></td>


	    <td><form method="POST">
	    <input type="hidden" name="delete_category" value="' . $locations['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
    </form></td>';


     $location_query = $pdo->prepare("SELECT * FROM location WHERE id=:id");

		$location_query->execute(['id'=>$locations['id']]);

		$location_exec= $location_query->fetch();

		$archive_value = $location_exec['archive'];



    echo'<td><form method="POST">
	    <input type="hidden" name="archive_location" value="' . $locations['id'] . '" />';

	    if ($archive_value==1) {
			    echo'<input type="submit" class="btn btn-warning" name="submit" value="Archive" />
    </form></td>';
	    	
	    }
	    else{
	    		    echo'<input type="submit" class="btn btn-warning" name="submit" value="Unarchive" />
    </form></td>';

	    }



    echo '</tr>';
}

echo '</thead>';
echo '</table>';
echo "</div>";

	}

	else{
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Location</th>' ;
		echo '<th>Action</th>';
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';



	}


	?>

</main>