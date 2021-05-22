<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_animal'])  ){ 
		$animal_del = $_POST['delete_animal'];
		unset($_POST['delete_animal']); 
		unset($_POST['submit']);

		$deleteAnimal = $pdo->prepare('DELETE FROM gallary WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteAnimal->execute(['id'=>$animal_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				Animal of the week has been deleted successfully !
			</div>';
        // echo "alert('Animal record has been deleted successfully! ');"; 
        // echo "</script>";
	}

}

	
 ?>
 
<main style=" margin:10px; ">
<h2 style="color: #00af;">View Image</h2>

	<?php
require '../../db/dbconnect.php';

	$animals = $pdo->prepare('SELECT * FROM gallary where archive="1"'); 
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
		

echo '</tr>';


foreach ($animal as $animals) {
    echo '<tr>';
    echo '<td>' . $animals['id'] . '</td>' ;
   	
    echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="250" height="200" ""/></td>';
   
	echo '<td><video src="'. "../../images/video/". $animals['video']  .'" width="100%" height="200" controls>Video Not Found</video></td>';
   
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
		

echo '</tr>';
echo '</thead>';
echo '</table>';

// echo "No Record for the Animal of the Week ";

	}


	?>
</main>


