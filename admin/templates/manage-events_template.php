

<?php 

	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_event'])  ){ 
		$events_del = $_POST['delete_event'];
		unset($_POST['delete_event']); 
		unset($_POST['submit']);

		$deleteEvents = $pdo->prepare('DELETE FROM events WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteEvents->execute(['id'=>$events_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				Event has been deleted successfully !
			</div>';
        // echo "alert('Animal record has been deleted successfully! ');"; 
        // echo "</script>";
	}

}

	
 ?>



 <?php 
 		require '../../db/dbconnect.php';
 		if(isset($_POST['archive_event'])  ){ 
		$event_archive = $_POST['archive_event'];
		unset($_POST['archive_event']); 
		unset($_POST['submit']);

		
		
		$events_query = $pdo->prepare("SELECT * FROM events WHERE id=:id");

		$events_query->execute(['id'=>$event_archive]);

		$events_exec= $events_query->fetch();

		$archive_value = $events_exec['archive'];

		$archiveAnimal = $pdo->prepare("UPDATE events SET archive=:archive WHERE id=:id");
		
			if ($archive_value== 0) {
				$criteria['archive']=1;
			}
			else{
				$criteria['archive']=0;
			}
			$criteria['id']= $event_archive;

			$archiveAnimal->execute($criteria); 
			echo '<div class="alert alert-warning" role="alert">';

			if ($archive_value==1) {
			   	    echo'	Events has been archived  !
			</div>';
		
	    }
	    else{
	    		    echo'	Events has been unarchived  !
			</div>';
	

	    }
			

}


  ?>


 
<main>
<h2 style="color: #00af;">Manage Events</h2>

	<?php
require '../../db/dbconnect.php';

	$events = $pdo->prepare('SELECT * FROM events'); 
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
		echo '<th>Actions </th>';
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
    
   echo '<td><form action="add-events" method="POST">
		  <input type="hidden" name="EDIT" value="'. $events["id"]. '" ?>
		  <input type="hidden" name="hiddenTitle"  value="'. $events["title"]. '"	/>
		  <input type="hidden" name="hiddenDescription"  value="' .$events["description"]. '"/>
		  <input type="hidden" name="hiddenDuration"  value="' .$events["duration"]. '"/>
		  <input type="hidden" name="hiddenDate"  value="' .$events["dates"]. '"/>
		  <input type="hidden" name="hiddenImage"  value="' .$events["image"]. '"/>
	      <input type="submit" class="btn btn-success" name="submit" value="Edit">
	      </form></td>


	    <td><form method="POST">
	    <input type="hidden" name="delete_event" value="' . $events['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
    </form></td>';




    $events_query = $pdo->prepare("SELECT * FROM events WHERE id=:id");

		$events_query->execute(['id'=>$events['id']]);

		$events_exec= $events_query->fetch();

		$archive_value = $events_exec['archive'];



    echo'<td><form method="POST">
	    <input type="hidden" name="archive_event" value="' . $events['id'] . '" />';

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
