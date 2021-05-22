
<?php 

	require '../../db/dbconnect.php';

	

	
 ?>
 
<main>
<h2 style="color: #00af;">View Vacancy</h2>

	<?php
require '../../db/dbconnect.php';

	$vacancy = $pdo->prepare("SELECT * FROM apply_vacancy where archive= '1'"); 
	$vacancy->execute(); 
	$vacancies = $vacancy->fetchAll();




	if($vacancy->rowCount()>0){
		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Vacancy</th>' ;
		// echo '<th>Status</th>' ;
		// echo '<th></th>';
		
		
		

echo '</tr>';


foreach ($vacancies as $vacancy) {
    echo '<tr>';
    echo '<td>' . $vacancy['id'] . '</td>' ;
   	echo '<td>' . $vacancy['name'] . '</td>' ;
   	// echo '<td>' . $vacancy['display'] . '</td>' ;

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
		echo '<th></th>';
		

echo '</tr>';
echo '</thead>';
echo '</table>';



	}


	?>

</main>