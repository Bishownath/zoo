<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_animalWatchlist'])  ){ 
		$animalWatchlist_del = $_POST['delete_animalWatchlist'];
		unset($_POST['delete_animalWatchlist']); 
		unset($_POST['submit']);

		$deleteAnimalWatchlist = $pdo->prepare('DELETE FROM animal_watchlist WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteAnimalWatchlist->execute(['id'=>$animalWatchlist_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				  Animal Watchlist record has been deleted successfully !
			</div>';
	}

}

	
 ?>


 <?php 
 		require '../../db/dbconnect.php';
 		if(isset($_POST['archive_animal'])  ){ 
		$animal_archive = $_POST['archive_animal'];
		unset($_POST['archive_animal']); 
		unset($_POST['submit']);

		
		
		$watchlist_query = $pdo->prepare("SELECT * FROM animal_watchlist WHERE id=:id");

		$watchlist_query->execute(['id'=>$animal_archive]);

		$watchlist_exec= $watchlist_query->fetch();

		$archive_value = $watchlist_exec['archive'];

		$archiveAnimal = $pdo->prepare("UPDATE animal_watchlist SET archive=:archive WHERE id=:id");
		
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
			   	    echo'	Animal from watchlist has been archived  !
			</div>';
		
	    }
	    else{
	    		    echo'	Animal from watchlist has been unarchived  !
			</div>';
	

	    }
			

}


  ?>





 
<main style=" margin:10px; ">
<h2 style="color: #00af;">Manage Animal Watchlist</h2>

	<?php
require '../../db/dbconnect.php';

	$watchlist = $pdo->prepare('SELECT * FROM animal_watchlist'); 
	$watchlist->execute(); 
	$animalW = $watchlist->fetchAll();




	if($watchlist->rowCount()>0){
		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Name</th>' ;
		echo '<th>Gender</th>';
		echo '<th>Size (ft.)</th>';
		echo '<th>Date</th>';
		echo '<th>Condition</th>';
		echo '<th>Description</th>';
		echo '<th>Image</th>';
		echo '<th></th>';
		echo '<th>Action</th>';
		echo '<th></th>';
		

echo '</tr>';


foreach ($animalW as $watchlist) {
    echo '<tr>';
    echo '<td>' . $watchlist['id'] . '</td>' ;
   	echo '<td>' . $watchlist['name'] . '</td>' ;
   	echo '<td>' . $watchlist['gender'] . '</td>';
    echo '<td>' . $watchlist['size'] . ' ft. </td>';
    echo '<td>' . $watchlist['dates'] . ' </td>';
    echo '<td>' . $watchlist['condition_status'] . '</td>';
    echo '<td>' . $watchlist['description'] . '</td>';
    echo '<td> <img src="'."../../images/" . $watchlist['image'] . '" width="80" height="80" ""/></td>';
   echo '<td><form action="add-animalWatchlist" method="POST">
		  <input type="hidden" name="EDIT" value="'. $watchlist["id"].'" ?>
		  <input type="hidden" name="hiddenName"  value="'. $watchlist["name"]. '"	/>
		  <input type="hidden" name="hiddenGender"  value="' .$watchlist["gender"]. '"/> 
		  <input type="hidden" name="hiddenSize"  value="' .$watchlist["size"]. '"/>
		  <input type="hidden" name="hiddenDOB"  value="' .$watchlist["dates"]. '"/>
		  <input type="hidden" name="hiddenSpecies"  value="' .$watchlist["condition_status"]. '"/>
		  <input type="hidden" name="hiddenDescription"  value="' .$watchlist["description"]. '"/>
		  <input type="hidden" name="hiddenImage"  value="' .$watchlist["image"]. '"/>
		  
	      <input type="submit" class="btn btn-success" name="submit" value="Edit">
	      </form></td>


	    <td><form method="POST">
	    <input type="hidden" name="delete_animalWatchlist" value="' . $watchlist['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />   
    </form></td>';

 $watchlist_query = $pdo->prepare("SELECT * FROM animal_watchlist WHERE id=:id");

		$watchlist_query->execute(['id'=>$watchlist['id']]);

		$watchlist_exec= $watchlist_query->fetch();

		$archive_value = $watchlist_exec['archive'];



    echo'<td><form method="POST">
	    <input type="hidden" name="archive_animal" value="' . $watchlist['id'] . '" />';

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
		echo '<th>Size (ft.)</th>';
		echo '<th>Date</th>';
		echo '<th>Condition</th>';
		echo '<th>Description</th>';
		echo '<th>Image</th>';
		echo '<th>Action</th>';
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';

	}


	?>

</main>
