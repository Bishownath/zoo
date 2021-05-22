 <?php 
	require '../../db/dbconnect.php';
function animalname($id){
	global $pdo;
	
	$stmt = $pdo->prepare("SELECT * FROM animals_tbl WHERE id=?");
	$stmt->execute([$id]); 
	$user = $stmt->fetch();

	return ($user['name']);
	
}


function sponsorname($id){
	global $pdo;
	
	$stmt = $pdo->prepare("SELECT * FROM sponsor_tbl WHERE id=?");
	$stmt->execute([$id]); 
	$user = $stmt->fetch();

	return ($user['company_name']);

}

 

if(  isset($_POST['Accept'])  ){ 
		$sponsorship_del = $_POST['Accept'];
		unset($_POST['Accept']); 
		unset($_POST['submit']);


		 if (isset($_POST['Accept'])) {
    		$acceptSponsorship = $pdo->prepare('UPDATE sponsor_tbl SET status=:status WHERE id=:id');
			if(  $acceptSponsorship->execute(['id'=>$_POST['Accept'], 'status'=> "Yes" ])  ){ 
					echo '<div class="alert alert-success" role="alert">
						  Sponsorship request has been accepted !
					</div>';
			}
    	


}
		$deleteSponsorship = $pdo->prepare('DELETE FROM sponsor_tbl WHERE id=:id');
	 	if(  $deleteSponsorship->execute(['id'=>$sponsorship_del])  ){ 
			echo '<div class="alert alert-danger" role="alert">
				  Sponsorship request has been deleted !
			</div>';
	}
		// $app = $_POST['Accept']; 
		// unset($_POST['Accept']);



 }
 ?>



<main>
	<h2 style="color: #00af;">View Sponsorships Request</h2>
<?php




function accepted($uid,$rid){ 

	if( $rid== 'Yes'  ){ 
			return '
				<form method="POST">
					<input type="hidden" name="Accept" value =" '.$uid.'">
					<input type="submit" class="btn btn-success" name="submit" value="Accept">
				</form>
			';
	}

	else{ 
			return '<input type="submit" class="btn btn-info" name="" value="Accepted" disabled >';
		// return 'hey';
	}
}






require '../../db/dbconnect.php';


$sponsorship = $pdo->prepare('SELECT * FROM  sponsor_tbl where status="Process"'); 
$sponsorship->execute();
$sponsorships = $sponsorship->fetchAll(); 

if($sponsorship->rowCount()>0){
	

		echo "<div class='table-responsive'>";
		echo '<table class="table table-striped">';
		echo '<thead class="thead-light">';
		echo '<tr>';
		echo '<tbody>';
		echo '</tbody>';
		echo '<th>#</th>';
		echo '<th>Sponsor</th>';
		echo '<th>Contact</th>';
		echo '<th>Address</th>';
		echo '<th>Existing customer</th>';
		echo '<th>Start Date</th>';
		echo '<th>End Date</th>';
		echo '<th>Band</th>';
		echo '<th>£ Price </th>';
		echo '<th>Sponsored Animal</th>';
		echo '<th>Action</th>';
		echo '<th></th>';
		
		
		echo '</tr>';

	foreach ($sponsorships as $sponsorships) {
		echo '<tr>';

		echo '<td>'.$sponsorships['id'].'</td>';

		echo '<td>'.$sponsorships['company_name'] .'</td>'; 
		echo '<td>'.$sponsorships['phone'] .'</td>'; 
		echo '<td>'.$sponsorships['company_address'] .'</td>'; 
		echo '<td>'.$sponsorships['existing_customer'] .'</td>'; 
		echo '<td>'.$sponsorships['start_date'] .'</td>'; 
		echo '<td>'.$sponsorships['end_date'] .'</td>'; 
		echo '<td>'.$sponsorships['band'] .'</td>'; 
		echo '<td>£ '.$sponsorships['price'] .'</td>';
		echo '<td>'.animalname($sponsorships['aid']).'</td>';

		
		// echo '<td>'.animalname($sponsorships['image']).'</td>';
		echo '<td> '.accepted($sponsorships['id'],$sponsorships['status']).'</td>'; 
		
		echo '<td><form method="POST">
	    <input type="hidden" name="Accept" value="' . $sponsorships['id'] . '" />
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
		echo '<th>Sponsor</th>';
		echo '<th>Contact</th>';
		echo '<th>Address</th>';
		echo '<th>Existing customer</th>';
		echo '<th>Start Date</th>';
		echo '<th>End Date</th>';
		echo '<th>Band</th>';
		echo '<th>Price</th>';
		echo '<th>Action</th>';
		echo '</tr>';   
		echo "</div>";
}
echo '</thead>';
echo '</table>';

?>	


</main>


