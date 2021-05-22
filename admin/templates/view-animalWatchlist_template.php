<main style=" margin:10px; ">
<h2 style="color: #00af;">View Animal Watchlist</h2>

<?php
	require '../../db/dbconnect.php';
	$animals = $pdo->prepare("SELECT * FROM animal_watchlist WHERE  archive='1'"); 
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
		echo '<th>Size (ft.)</th>';
		echo '<th>Date</th>';
		echo '<th>Condition</th>';
		echo '<th>Description</th>';
		echo '<th>Image</th>';
		
		

echo '</tr>';


foreach ($animal as $animals) {
    echo '<tr>';
    echo '<td>' . $animals['id'] . '</td>' ;
   	echo '<td>' . $animals['name'] . '</td>' ;
   	echo '<td>' . $animals['gender'] . '</td>';
    echo '<td>' . $animals['size'] . ' ft. </td>';
    echo '<td>' . $animals['dates'] . '</td>';
    echo '<td>' . $animals['condition_status'] . '</td>';
    echo '<td>' . $animals['description'] . '</td>';
    echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="80" height="80" ""/></td>';
   
    echo '</tr>';
}

echo '</thead>';
echo '</table>';
echo '</div>';

	}

	else{
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
		
		
echo '</tr>';
echo '</thead>';
echo '</table>';
echo '</div>';

		


	}


	?>
</main>
