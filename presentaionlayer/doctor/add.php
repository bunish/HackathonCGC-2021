<?php include ('../../datalayer/bookserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet"  href="style3.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1>Doctor<span>Patient</span></h1>
		<nav>
		


		
		<ul> 
			
		
			<li><a href="index2.php">My Info</a></li>
			<li><a href="doctorapp.php">My Appointments</a></li>
			<li><a href="searchpatient.php">Search Patient</a></li>
			<li><a href="add.php">Add Description/Prescription</a></li>
			<li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>

			



	
			

		</ul>
		



	</nav>




</header>

<form method="post" action="add.php" class="add">







	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

	<img style="display: block;
  margin-left: auto;
  margin-right: auto;" src="prescription.png" alt="Patient Login" width="150">

			<div class="input-group">
		<label style="font-weight: bold;">PatientID</label>
	   	<input type="text" name="Patientsearch" class="xd">


	</div>





	<div class="input-group">
		<button type="submit" name="SearchPA" class="btn">Search</button>
	</div>











	<?php  


	  if (isset($_POST['SearchPA'])) {

	$Patientsearch = mysqli_real_escape_string($mysqli,$_POST['Patientsearch']);
	
	$query="SELECT * FROM patients WHERE UserID=('$Patientsearch')";
	$result2=mysqli_query($mysqli,$query);
	

	
		
	while ($row2=mysqli_fetch_assoc($result2)) {
?>

<div class="input-group">
		<label>Patient ID</label>
		<input type="text" name="descID" value="<?php echo $row2['UserID']; ?>">

	</div>




	<div class="input-group">
		<label>Name</label>
		<input type="text" name="descName" value="<?php echo $row2['Name']; ?>">

	</div>

	<div class="input-group">
		<label>Treatment</label>
		<input type="text" name="Treatment">
	</div>

	<div class="input-group-add">
		<label>Note</label>
		<input style="" type="text" name="Note">
	</div>


	 <div class="input-group">
			<button type="submit" name="AddD" class="btn">Add</button>
			</div>


	<?php  

	}
	 ?>

			 </div>
	 
		
	   
	  
	 

	 
	
	  
<?php 
}


	    ?>




	    <?php  


if (isset($_POST['AddD'])) {
	include ('../../datalayer/errors.php');
	    	$errors=array();

	$descID 			= $mysqli -> real_escape_string($_POST['descID']);
	$descName 			= $mysqli -> real_escape_string($_POST['descName']);
	$treatment 			= $mysqli -> real_escape_string($_POST['Treatment']);
	$note				= $mysqli -> real_escape_string($_POST['Note']);

	
	







if (empty($treatment)) {
	array_push($errors,"Treatment is required");
	# code...
}

if (empty($note)) {
	array_push($errors,"Your note is required");
	# code...
}








if(count($errors)==0){



	$sql7 = "INSERT INTO  description (descID,descName,treatment,note,doctorIDdesc) VALUES ('$descID','$descName','$treatment','$note','$doctorprofile') ";
	if ($mysqli -> query($sql7)) { ?>

	<h2 class="thanks"> <?php printf("Your Description/Prescription Is Added and Sent to User Successfully !",$mysqli->affected_rows);?></h2>
			
			
		<?php 



	}
}
}














?>









</form>





</body>

</html>