<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_animal'])  ){ 
		$animal_del = $_POST['delete_animal'];
		unset($_POST['delete_animal']); 
		unset($_POST['submit']);

		$deleteAnimal = $pdo->prepare('DELETE FROM animal_week WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteAnimal->execute(['id'=>$animal_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				Animal of the week has been deleted successfully !
			</div>';
        // echo "alert('Animal record has been deleted successfully! ');"; 
        // echo "</script>";
	}

}

	
 ?>


  <?php 
 		require '../../db/dbconnect.php';
 		if(isset($_POST['archive_animal'])  ){ 
		$animal_archive = $_POST['archive_animal'];
		unset($_POST['archive_animal']); 
		unset($_POST['submit']);

		
		
		$aow_query = $pdo->prepare("SELECT * FROM animal_week WHERE id=:id");

		$aow_query->execute(['id'=>$animal_archive]);

		$aow_exec= $aow_query->fetch();

		$archive_value = $aow_exec['archive'];

		$archiveAnimal = $pdo->prepare("UPDATE animal_week SET archive=:archive WHERE id=:id");
		
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
			   	    echo'	Animal of the Week has been archived  !
			</div>';
		
	    }
	    else{
	    		    echo'	Animal of the Week has been unarchived  !
			</div>';
	

	    }
			

}


  ?>


 
<main style=" margin:10px; ">
<h2 style="color: #00af;">Manage Animal of the Week</h2>

	<?php
require '../../db/dbconnect.php';

	$animals = $pdo->prepare('SELECT * FROM animal_week'); 
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
		echo '<th>Gender</th>';
		// echo '<th>Size (ft.)</th>';
		echo '<th>Species</th>';
		echo '<th>Description</th>';
		echo '<th>Date</th>';
		echo '<th>DOB</th>';
		echo '<th>Joined</th>';
		echo '<th>Image</th>';
		echo '<th></th>';
		echo '<th>Action </th>';
		echo '<th></th>';
		

echo '</tr>';


foreach ($animal as $animals) {
    echo '<tr>';
    echo '<td>' . $animals['id'] . '</td>' ;
   	echo '<td>' . $animals['title'] . '</td>' ;
   	echo '<td>' . $animals['gender'] . '</td>';
    echo '<td>' . $animals['species'] . '</td>';
    echo '<td>' . $animals['description'] . '</td>';
    echo '<td>' . $animals['dates'] . '</td>';
    echo '<td>' . $animals['dob'] . '</td>';
    echo '<td>' . $animals['join_date'] . '</td>';
    // echo '<td>' . $animals['archive'] . '</td>';
    // echo '<td>' . $animals['habitat'] . '</td>';
    echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="80" ""/></td>';
    
   echo '<td><form action="add-aow" method="POST">
		  <input type="hidden" name="EDIT" value="'. $animals["id"]. '" ?>
		  <input type="hidden" name="hiddenTitle"  value="'. $animals["title"]. '"	/>
		  <input type="hidden" name="hiddenGender"  value="' .$animals["gender"]. '"/> 
		  <input type="hidden" name="hiddenSpecies"  value="' .$animals["species"]. '"/>
		  <input type="hidden" name="hiddenDescription"  value="' .$animals["description"]. '"/>
		  <input type="hidden" name="hiddenDate"  value="' .$animals["dates"]. '"/>
		  <input type="hidden" name="hiddenDob"  value="' .$animals["dob"]. '"/>
		  <input type="hidden" name="hiddenJoindate"  value="' .$animals["join_date"]. '"/>
		  <input type="hidden" name="hiddenImage"  value="' .$animals["image"]. '"/>
	      <input type="submit" class="btn btn-success" name="submit" value="Edit">
	      </form></td>


	    <td><form method="POST">
	    <input type="hidden" name="delete_animal" value="' . $animals['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
    </form></td>';

     $aow_query = $pdo->prepare("SELECT * FROM animal_week WHERE id=:id");

		$aow_query->execute(['id'=>$animals['id']]);

		$aow_exec= $aow_query->fetch();

		$archive_value = $aow_exec['archive'];



    echo'<td><form method="POST">
	    <input type="hidden" name="archive_animal" value="' . $animals['id'] . '" />';

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
		echo '<th>Gender</th>';
		// echo '<th>Size (ft.)</th>';
		echo '<th>Species</th>';
		echo '<th>Description</th>';
		echo '<th>Date</th>';
		echo '<th>DOB</th>';
		echo '<th>Joined</th>';
		echo '<th>Image</th>';
		echo '<th>Action </th>';
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';

// echo "No Record for the Animal of the Week ";

	}


	?>
</main>


