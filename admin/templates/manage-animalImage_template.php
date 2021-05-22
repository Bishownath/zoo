<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_animal'])  ){ 
		$animal_del = $_POST['delete_animal'];
		unset($_POST['delete_animal']); 
		unset($_POST['submit']);

		$deleteAnimal = $pdo->prepare('DELETE FROM gallary WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteAnimal->execute(['id'=>$animal_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				Gallary image has been deleted  !
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

		
		
		$gallary_query = $pdo->prepare("SELECT * FROM gallary WHERE id=:id");

		$gallary_query->execute(['id'=>$animal_archive]);

		$gallary_exec= $gallary_query->fetch();

		$archive_value = $gallary_exec['archive'];

		$archiveAnimal = $pdo->prepare("UPDATE gallary SET archive=:archive WHERE id=:id");
		
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
			   	    echo'	Gallary image has been archived  !
			</div>';
		
	    }
	    else{
	    		    echo'	Gallary image has been unarchived  !
			</div>';
	

	    }
			

}


  ?>

 
<main style=" margin:10px; ">
<h2 style="color: #00af;">Manage Gallery</h2>

	<?php
require '../../db/dbconnect.php';

	$animals = $pdo->prepare('SELECT * FROM gallary'); 
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
		echo '<th>Image</th>';
		echo '<th>Video</th>';
		echo '<th></th>';
		echo '<th>Action </th>';
		echo '<th></th>';
		
		
		

echo '</tr>';


foreach ($animal as $animals) {
    echo '<tr>';
    echo '<td>' . $animals['id'] . '</td>' ;
   	
    echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="250" height="200" ""/></td>';

    // echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="80" height="80" ""/></td>';

	echo '<td><video src="'. "../../images/video/". $animals['video']  .'" width="100%" height="200px" controls>Video Not Found</video></td>';
    
   echo '<td><form action="add-animalImage" method="POST">
		  <input type="hidden" name="EDIT" value="'. $animals["id"]. '" ?>
		  <input type="hidden" name="hiddenImage"  value="' .$animals["image"]. '"/>
		  <input type="hidden" name="hiddenVideo"  value="' .$animals["video"]. '"/>
	      <input type="submit" class="btn btn-success" name="submit" value="Edit">
	      </form></td>


	    <td><form method="POST">
	    <input type="hidden" name="delete_animal" value="' . $animals['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
    </form></td>';


    $gallary_query = $pdo->prepare("SELECT * FROM gallary WHERE id=:id");

		$gallary_query->execute(['id'=>$animals['id']]);

		$gallary_exec= $gallary_query->fetch();

		$archive_value = $gallary_exec['archive'];



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

	   //  echo'<input type="submit" class="btn btn-warning" name="submit" value="Archive" />
    // </form></td>';


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
		echo '<th>Image</th>';
		echo '<th></th>';
		echo '<th>Action </th>';
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';

// echo "No Record for the Animal of the Week ";

	}


	?>
</main>


