<main style="margin-top: 50px;">


 <?php
                                require '../db/dbconnect.php';
                                $categories = $pdo->prepare("SELECT id,name,display FROM classification_tbl where id=:id");
                                $criteria=['id'=>$_GET['id']];
                                $categories->execute($criteria);
                                foreach ($categories as $category) {
                                echo '<li style="list-style:none;"class="nav-item active"><a  style="font-size:30px;margin:30px;"'.'>'.$category['name'].'</a></li>';   
                                    }
                                                
                                        ?>


<?php

require "../db/dbconnect.php";

	$Locations=$pdo->prepare("SELECT * FROM animals_tbl WHERE cat_id=:id AND archive='1'");
	$criteria=['id'=>$_GET['id']];
	$Locations->execute($criteria);
if($Locations->rowCount()>0){
	
?>

<div class="col-md-4 ftco-animate">
<div>
	 <!-- <span class="fa fa-expand"></span> -->
	 <div class="desc w-100 px-4">
                <div class="text w-100 mb-3">
	<!-- <tr> -->
		<!-- <th>#</th> -->
		<!-- <th>Name</th>
		<th>Size</th>
		<th>Habitat</th> -->
		<!-- <th>Name</th>
		
		<th>Gender</th> -->
		<!-- <th>Image</th> -->
		<!-- <th></th> -->
	<!-- </tr> -->

<?php
	// $sn=1;

	foreach ($Locations as $loc ) {?>

		<!-- <tr> -->
		<!-- <td><?php //echo $loc['id'] ?> </td> -->
		<!-- <td><?php //echo $loc['name'] ?> </td> -->
		<!-- <td><?php //echo $loc['name'] ?> </td> -->

		
		<div class="row-5">
		<picture class="figure inline-flex">
		<div class="img-fluid img-thumbnail">
			<div class="col">
			<?php 

				echo '<div class="col-10"> <img src="' ."../images/". $loc['image'] . '" width="450" height="350" /></div>';

			?>
			<div class=''>Name: <?php echo $loc['name'] ?> </div><br>
			<div class=''>Habitat: <?php echo $loc['habitat'] ?> </div><br>
			<div class=''>D.O.B: <?php echo $loc['dob'];?> </div> <br>
			
			
		</div> <br>
		
		</picture>
		
		</div>
	</div>
		
		<!-- <div> </div>
		<div ></div> -->
		<!-- <td><?php //echo $loc['price'];?> </td> -->
		<!-- <td><a href="reeview.php?pid=<?php //echo $loc['p_id']?>">Review</a></td> -->



	<!-- </tr> -->
	<?php

	}?>

</div>
</div>

	
<?php }

	
else{
	echo '<div class="alert alert-dark" role="alert" >
  There is nothing in this category.
</div>';
}
?>
</div>
</main>

