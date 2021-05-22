
<?php 

	require '../../db/dbconnect.php';

	

	
 ?>
 
<main>
<h2 style="color: #00af;">View Location</h2>

	<?php
require '../../db/dbconnect.php';

	$classification = $pdo->prepare('SELECT * FROM location where archive="1"'); 
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
		echo '<th>Location</th>' ;
		// echo '<th>Status</th>' ;
		echo '<th></th>';
		
		
		

echo '</tr>';


foreach ($category as $classification) {
    echo '<tr>';
    echo '<td>' . $classification['id'] . '</td>' ;
   	echo '<td>' . $classification['location_name'] . '</td>' ;
   	// echo '<td>' . $classification['display'] . '</td>' ;

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
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';



	}


	?>

</main>