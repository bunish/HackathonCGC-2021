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
			<li><a href=" view.php">View Appointment</a></li>
			<li><a href=" cancel.php">Cancel Booking</a></li>
			<li><a href="searchdoctor.php">Search Doctor</a></li>
			<li><a href="donate.php">Donate Blood/Organ</a></li>
			<li><a href="searchdonor.php">Search Donor</a></li>
			<li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>
			



	
			

		</ul>
		



	</nav>




</header>

<body>


	
<form method="post" action="searchdonor.php">

	<?php include ('../../datalayer/errors.php') ;?>

	<div class="input-group">
		<label style="font-weight: bold;">Search By:<br>*Blood Group<br>*Organ</label>
		<input type="text" name="dID3" >

	</div>

	<div class="input-group">
		<button type="submit" name="SearchD" class="btn">Search</button>
	</div>

	







		</form>
	</form>

	<h2 style="text-align:center; margin-top: 15px; color: #39ca74">Please Contact the Donor Suitable to you at your Nearest Location!</h2>
	

		<?php 

         if (isset($_POST['SearchD'])) {

         ?>	<table class="table2">
		<tr>
		<th>DonorID</th>
		<th>DonorName</th>
		<th>DonorAddress</th>
		<th>DonorContactNumber</th>
		<th>DonorEmail</th>
		<th>DonorBloodGroup</th>
		<th>DonorOrgan</th>



		</tr> <?php  


		$dID3 =$mysqli -> real_escape_string($_POST['dID3']);

		$sql8="SELECT  * FROM  donor   WHERE donarblood=('$dID3') OR organ=('$dID3') ";
		$result8=$mysqli->query($sql8);
		if(mysqli_num_rows($result8)>=1){
			while ($row8=$result8->fetch_assoc()) {

				echo "<tr><td>".$row8["donarID"]."</td><td>".$row8["donarname"]."</td><td>".$row8["donaraddress"]."</td><td>".$row8["donarnumber"]."</td><td>".$row8['donaremail']."</td><td>".$row8['donarblood']."</td><td>".$row8['organ']."</td></tr>";
			}


			echo "</table";
	


		}
	}?>
 </table>
				
	


</body>
</html>

