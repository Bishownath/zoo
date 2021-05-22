<?php 

	require '../../db/dbconnect.php';

// 	if(  isset($_POST['delete_animal'])  ){ 
// 		$animal_del = $_POST['delete_animal'];
// 		unset($_POST['delete_animal']); 
// 		unset($_POST['submit']);

// 		$deleteAnimal = $pdo->prepare('DELETE FROM animal_week WHERE id=:id');//deleting from the tableadmin 
// 			if(  $deleteAnimal->execute(['id'=>$animal_del])  ){ // if condition is used
// 			echo '<div class="alert alert-primary" role="alert">
// 				Animal of the week has been deleted successfully !
// 			</div>';
//         // echo "alert('Animal record has been deleted successfully! ');"; 
//         // echo "</script>";
// 	}

// }

	
 ?>
 
<main style=" margin:10px; ">
<h2 style="color: #00af;">View Animal of the Week</h2>

	<?php
require '../../db/dbconnect.php';

	$animals = $pdo->prepare("SELECT * FROM animal_week WHERE  archive='1'"); 
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
    // echo '<td>' . $animals['habitat'] . '</td>';
    echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="80" height="80" ""/></td>';
    
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
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';

// echo "No Record for the Animal of the Week ";

	}


	?>
</main>


