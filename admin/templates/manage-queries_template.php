 <?php 
	require '../../db/dbconnect.php';

	if(  isset($_POST['delete_message'])  ){ 
		$messagess = $_POST['delete_message'];
		unset($_POST['delete_message']); 
		unset($_POST['submit']);

		$message_del = $pdo->prepare('DELETE FROM contact_tbl WHERE id=:id');
			if(  $message_del->execute(['id'=>$messagess])  ){ 
			echo '<div class="alert alert-danger" role="alert">
				  Queries has been deleted successfully !
			</div>';	}

}

require "../../db/dbconnect.php";
 
if(isset($_POST['approve'])){
 
require "../../db/dbconnect.php";

	$app = $_POST['approve']; 
	unset($_POST['approve']);

	$approve_message = $pdo->prepare("UPDATE contact_tbl SET approve=:approve WHERE id=:id");

	// if(  $approve_message->execute(['id'=>$app , 'approve'=> $_SESSION['sessionUID'] ])  ){
		if(  $approve_message->execute(['id'=>$app , 'approve'=> 'uid' ])  ){
			echo '<div class="alert alert-success" role="alert">
				  Queries  has been approved successfully !
			</div>';
	}
}

 ?>

<main>
	<h2 style="color: #00af;">Manage Queries</h2>
<?php 

function firstname($uid){
	require "../../db/dbconnect.php";

	$firstname = $pdo->prepare('SELECT firstname FROM admin_tbl WHERE uid=:uid'); 
	$firstname->execute(['uid'=> $uid]); 
	$user = $firstname->fetchColumn(); 
	return $user;

}
function approveBy($aid,$rid){ 

	if( $rid== ''  ){ 
			return '
				<form method="POST">
					<input type="hidden" name="approve" value =" '.$aid.'">
					<input type="submit" class="btn btn-success" name="Submit" value="Approve">
				</form>
			';
	}

	else{ 
			return '<input type="submit" class="btn btn-info" name="" value="Approved" disabled >'.firstname($rid);
			// return '<input type="submit" class="btn btn-info" name="" value="Approved by" >'. '<input class="btn btn-info" name="$rid">';
	}
}


$message = $pdo->prepare('SELECT * FROM  contact_tbl'); 
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
		echo '<th>Name</th>';
		echo '<th>Email</th>';
		echo '<th>Subject</th>';
		echo '<th>Contact</th>';
		echo '<th>Queries</th>';
		echo '<th>Status</th>';
		echo '<th>Action</th>';
		echo '</tr>';

	foreach ($messages as $message) {
		echo '<tr>';

		echo '<td>'.$message['id'].'</td>';

		echo '<td>'.$message['name'].'</td>'; 
		
		echo '<td>'.$message['email'].'</td>';
		
		echo '<td>'.$message['subject'].'</td>';

		echo '<td>'.$message['pnumber'].'</td>';
		
		echo '<td>'.$message['message'].'</td>';
		
		echo '<td> '.approveBy($message['id'],$message['approve']).'</td>'; 

		echo'<td><form method="POST">
	      <input type="hidden" name="delete_message" value="' . $message['id'] . '" />
	      <input type="submit" class="btn btn-danger" name="submit" value="Delete">
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
		echo '<th>Email</th>';
		echo '<th>Subject</th>';
		echo '<th>Contact</th>';
		echo '<th>Queries</th>';
		echo '<th>Status</th>';
		echo '<th>Action</th>';
		echo '</tbody>';
		echo '</tr>';   
		echo "</div>";
}
echo '</thead>';
echo '</table>';

?>	


</main>


