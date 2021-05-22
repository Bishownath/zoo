
<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_category'])  ){ 
		$cat_del = $_POST['delete_category'];
		unset($_POST['delete_category']); 
		unset($_POST['submit']);

		$deleteCat = $pdo->prepare('DELETE FROM classification_tbl WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteCat->execute(['id'=>$cat_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				  Animal Classification has been deleted successfully !
			</div>';
	}

}

	
 ?>



  <?php 
 		require '../../db/dbconnect.php';
 		if(isset($_POST['archive_classification'])  ){ 
		$classification_archive = $_POST['archive_classification'];
		unset($_POST['archive_classification']); 
		unset($_POST['submit']);

		
		
		$classification_query = $pdo->prepare("SELECT * FROM classification_tbl WHERE id=:id");

		$classification_query->execute(['id'=>$classification_archive]);

		$classification_exec= $classification_query->fetch();

		$archive_value = $classification_exec['archive'];

		$archiveClassification = $pdo->prepare("UPDATE classification_tbl SET archive=:archive WHERE id=:id");
		
			if ($archive_value== 0) {
				$criteria['archive']=1;
			}
			else{
				$criteria['archive']=0;
			}
			$criteria['id']= $classification_archive;

			$archiveClassification->execute($criteria); 
			echo '<div class="alert alert-warning" role="alert">';

			if ($archive_value==1) {
			   	    echo'	Animal Classification has been archived  !
			</div>';
		
	    }
	    else{
	    		    echo'	Animal Classification has been unarchived  !
			</div>';
	

	    }
			

}


  ?>




 
<main>
<strong style="color: #00af;">Manage Classification</strong>

	<?php
require '../../db/dbconnect.php';

	$classification = $pdo->prepare('SELECT * FROM classification_tbl'); 
	$classification->execute(); 
	$category = $classification->fetchAll();




	if($classification->rowCount()>0){
		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Classification</th>' ;
		echo '<th></th>' ;
		echo '<th>Actions</th>';
		echo '<th></th>';
		
		
		

echo '</tr>';


foreach ($category as $classification) {
    echo '<tr>';
    echo '<td>' . $classification['id'] . '</td>' ;
   	echo '<td>' . $classification['name'] . '</td>' ;
   	// echo '<td>' . $classification['display'] . '</td>' ;
  
   echo '<td><form action="add-classification" method="POST">
		  <input type="hidden" name="EDIT" value="'. $classification["id"].'" ?>
		  <input type="hidden" name="hiddenName"  value="'. $classification["name"]. '"	/>
		  
	      <input type="submit" class="btn btn-success" name="submit" value="Edit">
	      </form></td>


	    <td><form method="POST">
	    <input type="hidden" name="delete_category" value="' . $classification['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
    </form></td>';


    $classification_query = $pdo->prepare("SELECT * FROM classification_tbl WHERE id=:id");

		$classification_query->execute(['id'=>$classification['id']]);

		$classification_exec= $classification_query->fetch();

		$archive_value = $classification_exec['archive'];



    echo'<td><form method="POST">
	    <input type="hidden" name="archive_classification" value="' . $classification['id'] . '" />';

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
		echo '<th>Classification</th>' ;
		echo '<th>Action</th>';
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';



	}


	?>

</main>