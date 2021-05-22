 <?php 
	require '../../db/dbconnect.php';


require "../../db/dbconnect.php";


if(  isset($_POST['delete_ticket'])  ){ 
		$ticket_del = $_POST['delete_ticket'];
		unset($_POST['delete_ticket']); 
		unset($_POST['submit']);

		$deleteTicket = $pdo->prepare('DELETE FROM tickets WHERE id=:id');//deleting from the tableadmin 
			if(  $deleteTicket->execute(['id'=>$ticket_del])  ){ // if condition is used
			echo '<div class="alert alert-danger" role="alert">
				  Used tickets has been deleted successfully !
			</div>';
	}

}
 
if(isset($_POST['approve'])){
 
require "../../db/dbconnect.php";

	$app = $_POST['approve']; 
	unset($_POST['approve']);

	$approve_message = $pdo->prepare("UPDATE tickets SET approve=:approve WHERE id=:id");

	// if(  $approve_message->execute(['id'=>$app , 'approve'=> $_SESSION['sessionUID'] ])  ){
		if(  $approve_message->execute(['id'=>$app , 'approve'=> $_SESSION['sessionUID'] ])  ){
			echo '<div class="alert alert-success" role="alert">
				  Booked Tickets has been approved successfully !
			</div>';
	}
}

 ?>

<main>
	<h2 style="color: #00af;">View Booked Tickets</h2>
<?php 


$ticket = $pdo->prepare('SELECT * FROM  tickets'); 
$ticket->execute();
$tickets = $ticket->fetchAll(); 
if($ticket->rowCount()>0){
	

		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>';
		echo '<th>Name</th>';
		echo '<th>Ticket Type</th>';
		echo '<th>Required Ticket</th>';
		echo '<th>Date</th>';
		echo '<th>Ticket Query</th>';
		echo '<th>Action</th>';

		echo '</tr>';

	foreach ($tickets as $ticket) {
		echo '<tr>';

		echo '<td>'.$ticket['id'].'</td>';

		echo '<td>'.$ticket['name'].'</td>'; 
		
		echo '<td>'.$ticket['ticket_type'].'</td>';
		
		echo '<td>'.$ticket['ticket_number'].'</td>';

		echo '<td>'.$ticket['dates'].'</td>';
		echo '<td>'.$ticket['other'].'</td>';
		
		// echo '<td> '.approveBy($ticket['id'],$ticket['approve']).'</td>'; 


		echo '<td><form method="POST">
	    <input type="hidden" name="delete_ticket" value="' . $ticket['id'] . '" />
	    <input type="submit" class="btn btn-danger" name="submit" value="Delete" />
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
		echo '<th>Name</th>';
		echo '<th>Ticket Type</th>';
		echo '<th>Required Ticket</th>';
		echo '<th>Date</th>';
		echo '<th>Ticket Query</th>';
		echo '</tr>';   
		echo "</div>";
}
echo '</thead>';
echo '</table>';

?>	


</main>


