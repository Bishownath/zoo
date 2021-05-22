 <?php 
	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_message'])  ){ 
		$messagess = $_POST['delete_message'];
		unset($_POST['delete_message']); 
		unset($_POST['submit']);

		$message_del = $pdo->prepare('DELETE FROM vacancy WHERE id=:id');
			if(  $message_del->execute(['id'=>$messagess])  ){ 
			echo '<div class="alert alert-danger" role="alert">
				  Vacancy has been rejected successfully !
			</div>';	}

}


 ?>

<main>
	<h2 style="color: #00af;">Vacancy Request</h2>
<?php 



$message = $pdo->prepare('SELECT * FROM  vacancy'); 
$message->execute();
$messages = $message->fetchAll(); 
if($message->rowCount()>0){
	

		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>';
		echo '<th>Fullname</th>';
		echo '<th>Address</th>';
		echo '<th>Contact</th>';
		echo '<th>Type</th>';
		echo '<th>Start Date</th>';
		echo '<th>End Date</th>';
		echo '<th>Action</th>';
		echo "<th></th>";
		echo '</tr>';

	foreach ($messages as $message) {
		echo '<tr>';

		echo '<td>'.$message['id'].'</td>';

		echo '<td>'.$message['fullname'].'</td>'; 
		
		echo '<td>'.$message['address'].'</td>';
		
		echo '<td>'.$message['contact'].'</td>';

		echo '<td>'.$message['type'].'</td>';
		
		echo '<td>'.$message['starting_date'].'</td>';

		echo '<td>'.$message['ending_date'].'</td>';
		

		echo'<td><form method="POST">
	      <input type="hidden" name="delete_message" value="' . $message['id'] . '" />
	      <input type="submit" class="btn btn-danger" name="submit" value="Reject">
    	</form></td>';

		echo '</tr>';	
	}


echo '</thead>';	
echo '</table>';
echo "</div>";

}

else{
	echo "<div class='table-responsive'>";
	echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>';
		echo '<th>Fullname</th>';
		echo '<th>Address</th>';
		echo '<th>Contact</th>';
		echo '<th>Type</th>';
		echo '<th>Start Date</th>';
		echo '<th>End Date</th>';
		echo '<th>Action</th>';
		echo '</tbody>';
		echo '</tr>';   
		echo "</div>";
}
echo '</thead>';
echo '</table>';

?>	


</main>


