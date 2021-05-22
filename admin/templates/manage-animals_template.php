<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_animal'])  ){ 
		$animal_del = $_POST['delete_animal'];
		unset($_POST['delete_animal']); 
		unset($_POST['submit']);

		$deleteAnimal = $pdo->prepare('DELETE FROM animals_tbl WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteAnimal->execute(['id'=>$animal_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				  Animal record has been deleted successfully !
			</div>';
	}

}

	
	function classificationName($id){
	global $pdo;
	
	$stmt = $pdo->prepare("SELECT * FROM classification_tbl WHERE id=?");
	$stmt->execute([$id]); 
	$user = $stmt->fetch();

	return ($user['name']);
	
}

function locationName($id){
	global $pdo;
	
	$stmt = $pdo->prepare("SELECT * FROM location WHERE id=?");
	$stmt->execute([$id]); 
	$user = $stmt->fetch();

	return ($user['location_name']);
	
}


 ?>
 

  <?php 
 		require '../../db/dbconnect.php';
 		if(isset($_POST['archive_animals'])  ){ 
		$animal_archive = $_POST['archive_animals'];
		unset($_POST['archive_animals']); 
		unset($_POST['submit']);

		
		
		$animal_query = $pdo->prepare("SELECT * FROM animals_tbl WHERE id=:id");

		$animal_query->execute(['id'=>$animal_archive]);

		$animal_exec= $animal_query->fetch();

		$archive_value = $animal_exec['archive'];

		$archiveAnimal = $pdo->prepare("UPDATE animals_tbl SET archive=:archive WHERE id=:id");
		
			if ($archive_value== 0) {
				$criteria['archive']=1;
			}
			else{
				$criteria['archive']=0;
			}
			$criteria['id']= $animal_archive;

			$archiveAnimal->execute($criteria); 
			echo '<div class="alert alert-warning" role="alert">';

			if ($archive_value==1) {
			   	    echo'	Animal has been archived  !
			</div>';
		
	    }
	    else{
	    		    echo'	Animal has been unarchived  !
			</div>';
	

	    }
			

}



?>





<main style=" margin:10px; ">
<h2 style="color: #00af;">Manage Animals</h2>

	<?php
require '../../db/dbconnect.php';

	$animals = $pdo->prepare('SELECT * FROM animals_tbl'); 
	$animals->execute(); 
	$animal = $animals->fetchAll();




	if($animals->rowCount()>0){
		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Name</th>' ;
		echo '<th>Category</th>' ;
		echo '<th>Location</th>' ;
		echo '<th>Gender</th>';
		echo '<th>Size </th>';
		echo '<th>Height (m)</th>';
		echo '<th>Weight (kg)</th>';
		echo '<th>Diet</th>';
		echo '<th>D.O.B</th>';
		echo '<th>Species</th>';
		echo '<th>Habitat</th>';
		// echo '<th>Status</th>';
		echo '<th>Image</th>';
		echo '<th></th>';
		echo '<th>Action</th>';
		echo '<th></th>';
		

echo '</tr>';


foreach ($animal as $animals) {
    echo '<tr>';
    echo '<td>' . $animals['id'] . '</td>' ;
   	echo '<td>' . $animals['name'] . '</td>' ;
   	echo '<td>' . classificationName($animals['cat_id']) . '</td>' ;
   	echo '<td>' . locationName($animals['loc_id']) . '</td>' ;
   	echo '<td>' . $animals['gender'] . '</td>';
    echo '<td>' . $animals['size'] . ' </td>';
    echo '<td>' . $animals['height'] . ' </td>';
    echo '<td>' . $animals['weight'] . ' </td>';
    echo '<td>' . $animals['diet'] . ' </td>';
    echo '<td>' . $animals['dob'] . ' </td>';
    echo '<td>' . $animals['species'] . '</td>';
    echo '<td>' . $animals['habitat'] . '</td>';
    // echo '<td>' . $animals['archive'] . '</td>';
    echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="80" height="80" ""/></td>';
   echo '<td><form action="add-animals" method="POST">
		  <input type="hidden" name="EDIT" value="'. $animals["id"].'" ?>
		  <input type="hidden" name="hiddenName"  value="'. $animals["name"]. '"	/>
		  <input type="hidden" name="hiddenCategory"  value="'. classificationName($animals["cat_id"]). '"	/>
		  <input type="hidden" name="hiddenCategory"  value="'. locationName($animals["loc_id"]). '"	/>
		  <input type="hidden" name="hiddenGender"  value="' .$animals["gender"]. '"/> 
		  <input type="hidden" name="hiddenSize"  value="' .$animals["size"]. '"/>
		  <input type="hidden" name="hiddenHeight"  value="' .$animals["height"]. '"/>
		  <input type="hidden" name="hiddenWeight"  value="' .$animals["weight"]. '"/>
		  <input type="hidden" name="hiddenDiet"  value="' .$animals["diet"]. '"/>
		  <input type="hidden" name="hiddenDOB"  value="' .$animals["dob"]. '"/>
		  <input type="hidden" name="hiddenSpecies"  value="' .$animals["species"]. '"/>
		  <input type="hidden" name="hiddenHabitat"  value="' .$animals["habitat"]. '"/>
		  <input type="hidden" name="hiddenImage"  value="' .$animals["image"]. '"/>
		  
	      <input type="submit" class="btn btn-success" name="submit" value="Edit">
	      </form></td>


	    <td><form method="POST">
	    <input type="hidden" name="delete_animal" value="' . $animals['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
    </form></td>';


     $animal_query = $pdo->prepare("SELECT * FROM animals_tbl WHERE id=:id");

		$animal_query->execute(['id'=>$animals['id']]);

		$animal_exec= $animal_query->fetch();

		$archive_value = $animal_exec['archive'];



    echo'<td><form method="POST">
	    <input type="hidden" name="archive_animals" value="' . $animals['id'] . '" />';

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
echo '</div>';

	}

	else{
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Name</th>' ;
		echo '<th>Category</th>' ;
		echo '<th>Location</th>' ;
		echo '<th>Gender</th>';
		echo '<th>Size (ft.)</th>';
		echo '<th>Height</th>';
		echo '<th>Weight</th>';
		echo '<th>Diet</th>';
		echo '<th>D.O.B</th>';
		echo '<th>Species</th>';
		echo '<th>Habitat</th>';
		echo '<th>Image</th>';
		echo '<th></th>';
		echo '<th>Action</th>';
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';

	}


	?>

</main>

