

<?php 

	require '../../db/dbconnect.php';

// 	if(  isset($_POST['delete_event'])  ){ 
// 		$events_del = $_POST['delete_event'];
// 		unset($_POST['delete_event']); 
// 		unset($_POST['submit']);

// 		$deleteEvents = $pdo->prepare('DELETE FROM events WHERE id=:id');//deleting from the tableadmin 
// 			if(  $deleteEvents->execute(['id'=>$events_del])  ){ // if condition is used
// 			echo '<div class="alert alert-primary" role="alert">
// 				Event has been deleted successfully !
// 			</div>';
//         // echo "alert('Animal record has been deleted successfully! ');"; 
//         // echo "</script>";
// 	}

// }

	
 ?>
 
<main style="margin:10px; ">
<h2 style="color: #00af;">View Events</h2>

	<?php
require '../../db/dbconnect.php';

	$events = $pdo->prepare("SELECT * FROM events where archive= '1'"); 
	$events->execute(); 
	$event = $events->fetchAll();




	if($events->rowCount()>0){
		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>' ;
		echo '<th>Name</th>' ;
		echo '<th>Description</th>';
		echo '<th>Duration</th>';
		echo '<th>Date</th>';
		echo '<th>Image</th>';
		echo '<th></th>';
		

echo '</tr>';


foreach ($event as $events) {
    echo '<tr>';
    echo '<td>' . $events['id'] . '</td>' ;
   	echo '<td>' . $events['title'] . '</td>' ;
    echo '<td>' . $events['description'] . '</td>';
    echo '<td>' . $events['duration'] . '</td>';
    echo '<td>' . $events['dates'] . '</td>';

    // echo '<td>' . $events['habitat'] . '</td>';
    echo '<td> <img src="'."../../images/" . $events['image'] . '" width="80" height="80" ""/></td>';
 
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
		echo '<th>Name</th>' ;
		echo '<th>Description</th>';
		echo '<th>Duration</th>';
		echo '<th>Date</th>';
		echo '<th>Image</th>';
		echo '<th>Actions </th>';
		echo '<th></th>';
		
echo '</tr>';
echo '</thead>';
echo '</table>';

	}


	?>

</main>
