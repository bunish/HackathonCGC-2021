<?php include '../../datalayer/bookserver.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient</title>
	<link rel="stylesheet"  href="style2.css">

	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<header>
	<h1>Doctor<span>Patient</span></h1>
		<nav>
		


		
		<ul> 
			
		
			<li><a href=" index.php">MyInfo</a></li>
			<li><a href=" book.php">Book Appointment</a></li>
			<li><a href="view.php">View Appointment</a></li>
			<li><a href="cancel.php">Cancel Booking</a></li>
			<li><a href="searchdoctor.php ">Search Doctor</a></li>
			<li><a href="donate.php">Donate Blood/Organ</a></li>
			<li><a href="searchdonor.php">Search Donar</a></li>
			<li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>
			



	
			

		</ul>
		



	</nav>




</header>
<body>
	<div class="header">
	<h2>Donate Blood or Organ</h2>
	<img src="donate.jpg" alt="donate" width="250">
</div>

	<form method="post" action="donate.php">

	<?php include ('../../datalayer/errors.php'); ?>




	<?php  
if (isset($_POST['Donate'])) {

	$DUserID 			= $mysqli -> real_escape_string($_POST['DUserID']);
	$DUsername 			= $mysqli -> real_escape_string($_POST['DName']);
	$DAddress 			= $mysqli -> real_escape_string($_POST['DAddress']);
	$DContactNumber		= $mysqli -> real_escape_string($_POST['DContactNumber']);
	$DEmail 			= $mysqli -> real_escape_string($_POST['DEmail']);
	$Dbloodtype 		= $mysqli -> real_escape_string($_POST['Dbloodtype']);
	$Dorgan				= $mysqli -> real_escape_string($_POST['Organ']);
	




	if (empty($DUserID)) {
	array_push($errors,"UserID is required");
	# code...
}

if (empty($DUsername)) {
	array_push($errors,"UserName is required");
	# code...
}


if (empty($DAddress)) {
	array_push($errors,"Address is required");
	# code...
}

if (empty($DContactNumber)) {
	array_push($errors,"Contact Number is required");
	# code...
}


if (empty($DEmail)) {
	array_push($errors,"Email is required");
	# code...
}


if (empty($Dbloodtype)) {
	array_push($errors,"Bloodtype is required");
	# code...
}







if(count($errors)==0){



	$sql7 = "INSERT INTO  donor (donarID,donarname,donaraddress,donarnumber,donaremail,donarblood,organ) VALUES ('$DUserID','$DUsername','$DAddress','$DContactNumber','$DEmail','$Dbloodtype','$Dorgan') ";
	if ($mysqli -> query($sql7)) { ?>

	<h2 class="thanks"> <?php printf("Thanks For Donation",$mysqli->affected_rows);?></h2>
			
			
		<?php 



	}
}
}














?>


	<div class="input-group">
		<label>User ID</label>
		<input type="text" name="DUserID" value=" <?php echo "" .isset($_SESSION['UserID']);?> " >

	</div>


	<div class="input-group">
		<label>Name</label>
		<input type="text" name="DName" value="<?php echo $col['Name']; ?> " >


	</div>

	<div class="input-group">
		<label>Address</label>
		<input type="text" name="DAddress" value="<?php echo $col['Address']; ?>">

	</div>

	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="DContactNumber" value=" <?php echo $col['ContactNumber']; ?>">


	</div>


	<div class="input-group">
		<label>Email address</label>
		<input type="text" name="DEmail" value="<?php echo $col['Email']; ?>">

	</div>

	<div class="input-group">
		<label>Blood type</label>
		<input type="text" name="Dbloodtype" value="<?php echo $col['Bloodtype']; ?>">

	</div>

	<div class="input-group">
		<label>Type Of Organ</label>
	   	<select name="Organ" class="xd">
	   		<option value="Blood">Blood</option>
	   		<option value="Heart">Heart</option>
	   		<option value="kidney">kidney</option>
	   		<option value="Eye">Eye</option>

	   	</select>

	<div class="input-group">
		<button type="submit" name="Donate" class="btn">Donate</button>
	</div>

</div>





</form>


	











	


</body>
</html>
