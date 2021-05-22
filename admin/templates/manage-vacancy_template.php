
<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_vacancy'])  ){ 
		$cat_del = $_POST['delete_vacancy'];
		unset($_POST['delete_vacancy']); 
		unset($_POST['submit']);

		$deleteCat = $pdo->prepare('DELETE FROM apply_vacancy WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteCat->execute(['id'=>$cat_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				  Vacancy has been deleted successfully !
			</div>';
	}

}

	
 ?>



  <?php 
 		require '../../db/dbconnect.php';
 		if(isset($_POST['archive_vacancy'])  ){ 
		$vacancy_archive = $_POST['archive_vacancy'];
		unset($_POST['archive_vacancy']); 
		unset($_POST['submit']);

		
		
		$vacancy_query = $pdo->prepare("SELECT * FROM apply_vacancy WHERE id=:id");

		$vacancy_query->execute(['id'=>$vacancy_archive]);

		$vacancy_exec= $vacancy_query->fetch();

		$archive_value = $vacancy_exec['archive'];

		$archiveVacancy = $pdo->prepare("UPDATE apply_vacancy SET archive=:archive WHERE id=:id");
		
			if ($archive_value== 0) {
				$criteria['archive']=1;
			}
			else{
				$criteria['archive']=0;
			}
			$criteria['id']= $vacancy_archive;

			$archiveVacancy->execute($criteria); 
			echo '<div class="alert alert-warning" role="alert">';

			if ($archive_value==1) {
			   	    echo'	Vacancy has been archived  !
			</div>';
		
	    }
	    else{
	    		    echo'	Vacancy has been unarchived  !
			</div>';
	

	    }
			

}


  ?>




 
<main>
<strong style="color: #00af;">Manage Vacancy</strong>

	<?php
require '../../db/dbconnect.php';

	$vacancy = $pdo->prepare('SELECT * FROM apply_vacancy'); 
	$vacancy->execute(); 
	$category = $vacancy->fetchAll();




	if($vacancy->rowCount()>0){
		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Vacancy</th>' ;
		echo '<th></th>' ;
		echo '<th>Actions</th>';
		echo '<th></th>';
		
		
		

echo '</tr>';


foreach ($category as $vacancy) {
    echo '<tr>';
    echo '<td>' . $vacancy['id'] . '</td>' ;
   	echo '<td>' . $vacancy['name'] . '</td>' ;
   	// echo '<td>' . $vacancy['display'] . '</td>' ;
  
   echo '<td><form action="add-vacancy" method="POST">
		  <input type="hidden" name="EDIT" value="'. $vacancy["id"].'" ?>
		  <input type="hidden" name="hiddenName"  value="'. $vacancy["name"]. '"	/>
		  
	      <input type="submit" class="btn btn-success" name="submit" value="Edit">
	      </form></td>


	    <td><form method="POST">
	    <input type="hidden" name="delete_vacancy" value="' . $vacancy['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
    </form></td>';


    $vacancy_query = $pdo->prepare("SELECT * FROM apply_vacancy WHERE id=:id");

		$vacancy_query->execute(['id'=>$vacancy['id']]);

		$vacancy_exec= $vacancy_query->fetch();

		$archive_value = $vacancy_exec['archive'];



    echo'<td><form method="POST">
	    <input type="hidden" name="archive_vacancy" value="' . $vacancy['id'] . '" />';

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
		echo '<th>Vacancy</th>' ;
		echo '<th>Action</th>';
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';



	}


	?>

</main>