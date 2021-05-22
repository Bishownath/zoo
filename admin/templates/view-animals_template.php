<main style=" margin:10px; ">
<h2 style="color: #00af;">View Animals</h2>

<?php



	
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



	require '../../db/dbconnect.php';
	$animals = $pdo->prepare("SELECT * FROM animals_tbl WHERE  archive='1'"); 
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
		echo '<th>Size (dimension)</th>';
		echo '<th>Height (m)</th>';
		echo '<th>Weight (kg)</th>';
		echo '<th>Diet</th>';
		echo '<th>Species</th>';
		echo '<th>Habitat</th>';
		echo '<th>Image</th>';
		
		

echo '</tr>';


foreach ($animal as $animals) {
    echo '<tr>';
    echo '<td>' . $animals['id'] . '</td>' ;
   	echo '<td>' . $animals['name'] . '</td>' ;
   	echo '<td>' . classificationName($animals['cat_id']) . '</td>' ;
   	echo '<td>' . locationName($animals['loc_id']) . '</td>' ;
   	echo '<td>' . $animals['gender'] . '</td>';
    echo '<td>' . $animals['size'] . '  </td>';
    echo '<td>' . $animals['height'] . ' m</td>';
    echo '<td>' . $animals['weight'] . ' kg</td>';
    echo '<td>' . $animals['diet'] . '</td>';
    echo '<td>' . $animals['species'] . '</td>';
    echo '<td>' . $animals['habitat'] . '</td>';
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
		echo '<th>#</th>' ;
		echo '<th>Name</th>' ;
		echo '<th>Category</th>' ;
		echo '<th>Location</th>' ;
		echo '<th>Gender</th>';
		echo '<th>Size (ft.)</th>';
		echo '<th>Height</th>';
		echo '<th>Weight</th>';
		echo '<th>Diet</th>';
		echo '<th>Species</th>';
		echo '<th>Habitat</th>';
		echo '<th>Image</th>';
		
		
echo '</tbody>';
echo '</tr>';

		


	}


	?>
</main>
