<?php 


session_start();
$errors=array();

$mysqli = new mysqli("localhost","root","","registration");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}




if (isset($_POST['Register'])) {

	



	$UserID 	= $mysqli -> real_escape_string($_POST['UserID']);
	$Username 	= $mysqli -> real_escape_string($_POST['Name']);
	$Address 	= $mysqli -> real_escape_string($_POST['Address']);
	$ContactNumber	 = $mysqli -> real_escape_string($_POST['ContactNumber']);
	$Email 		=  $mysqli -> real_escape_string($_POST['Email']);
	$Password 	= $mysqli -> real_escape_string($_POST['password']);
	$bloodtype 	= $mysqli -> real_escape_string($_POST['bloodtype']);
    
   




	if (empty($UserID)) {
	array_push($errors,"UserID is required");
	# code...
}

if (empty($Username)) {
	array_push($errors,"UserName is required");
	# code...
}


if (empty($Address)) {
	array_push($errors,"Address is required");
	# code...
}

if (empty($ContactNumber)) {
	array_push($errors,"Contact Number is required");
	# code...
}


if (empty($Email)) {
	array_push($errors,"Email is required");
	# code...
}

if (empty($Password)) {
	array_push($errors,"Password is required");
	# code...
}

if (empty($bloodtype)) {
	array_push($errors,"Bloodtype is required");
	# code...
}







if(count($errors)==0){


	$Password=md5($Password);

	$sql = "INSERT INTO  patients (UserID, Name, Address, ContactNumber, Email, Password,Bloodtype) VALUES ('$UserID','$Username','$Address','$ContactNumber','$Email','$Password','$bloodtype') ";
    
   


	if (!$mysqli -> query($sql)) {
  printf("%d Row inserted.\n", $mysqli->affected_rows);
    
 
}
    if(move_uploaded_file($_FILES['']))


  $_SESSION['UserID']=$UserID;
  $_SESSION['success']="you are now logged in";
  header('location:../presentaionlayer/patient/index.php');


}
	


	# code...
}




if (isset($_POST['Login'])) {

		$UserID 	= $mysqli -> real_escape_string($_POST['UserID']);
		$Password 	= $mysqli -> real_escape_string($_POST['password']);
if (empty($UserID)) {
	array_push($errors,"UserID is required");
	# code...
}
if (empty($Password)) {
	array_push($errors,"Password is required");
	

		# code...
	}


	if (count ($errors)== 0) {

		$Password=md5($Password);
		
	

	$query="SELECT * FROM patients WHERE UserID=('$UserID')AND Password=('$Password')";
	$result=mysqli_query($mysqli,$query);
	if (mysqli_num_rows($result) ==1 )  {
	
	

	
	$_SESSION['UserID']=$UserID;
  	$_SESSION['success']="you are now logged in";
  header('location:../presentaionlayer/patient/index.php');
}  else{
		array_push($errors,"The ID/Password not correct");
		
	}
}
}


	# code...


if (isset($_GET['logout'])) {

	session_destroy();
	usset($_SESSION['UserID']);
	header('location:login.php');
	}


	if (isset($_GET['My info'])) {
	header('location:login.php');
	}



	$userprofile=isset($_SESSION['UserID']);
$query="SELECT * FROM patients WHERE UserID=('$userprofile')";
 $result= mysqli_query($mysqli, $query);
 $col= mysqli_fetch_assoc($result);







		






 if (isset($_POST['Login2'])) {

		$DoctorID2	= $mysqli -> real_escape_string($_POST['doctorID']);
		$DoctorPassword2= $mysqli -> real_escape_string($_POST['doctorpassword']);
if (empty($DoctorID2)) {
	array_push($errors,"Doctor ID is required");
	# code...
}
if (empty($DoctorPassword2)) {
	array_push($errors,"Password is required");
	

		# code...
	}


	if (count ($errors)== 0) {

	
		
	

	$queryD="SELECT * FROM doctor WHERE DoctorID=('$DoctorID2')AND password=('$DoctorPassword2')";
	$resultD=mysqli_query($mysqli,$queryD);
	if (mysqli_num_rows($resultD) ==1 )  {
	
	

	
	$_SESSION['DoctorID']=$DoctorID2;
  	$_SESSION['success']="you are now logged in";
  	header('location:../presentaionlayer/doctor/index2.php'); 
}  else{
		array_push($errors,"The ID/Password not correct");
		
	}
}
}




$doctorprofile=isset($_SESSION['DoctorID']);
$querydoctor="SELECT * FROM doctor WHERE DoctorID=('$doctorprofile')";
 $resultdoctor= mysqli_query($mysqli, $querydoctor);
 $colD= mysqli_fetch_assoc($resultdoctor);


 if (isset($_GET['logout'])) {

	session_destroy();
	usset($_SESSION['UserID']);
	header('location:login.php');
	}




 if (isset($_POST['treatmentHistory'])) {
		  	header('../presentaionlayer/patient/myinfo.php');
			 ?>
		
         	<table class="table2" style="margin-top: -10px">
         	<caption style="margin-left: 34px;padding: 10px;font-weight: bold;font-size: 30px;" class="asd">Treatment History</caption>
		<tr>
		<th>DoctorID</th>  ?>
		<th>DoctorName</th>
		<th>Treatment</th>
		<th>Doctor's Note</th>	


		</tr> 
		
	<?php  
		$sql11="SELECT  * FROM  description,doctor WHERE descID=('$userprofile') AND doctorIDdesc=DoctorID" ;
		$result11=$mysqli->query($sql11);
		if(mysqli_num_rows($result11)>=1){
			while ($row11=$result11->fetch_assoc()) {

				echo "<tr><td>".$row11['DoctorID']."</td><td>".$row11['Doctorname']."</td><td>".$row11['treatment']."</td><td>".$row11['Note']."</td></tr>";
			}


			echo "</table";
	


		}

	}



		  ?>

 </table>



<?php  

if (isset($_POST['Login3'])) {

		$adminID	= $mysqli -> real_escape_string($_POST['adminID']);
		$adminpassword= $mysqli -> real_escape_string($_POST['adminpassword']);
if (empty($adminID)) {
	array_push($errors,"Admin ID is required");
	# code...
}
if (empty($adminpassword)) {
	array_push($errors,"Password is required");
	

		# code...
	}


	if (count ($errors)== 0) {

	
		
	

	$queryA="SELECT * FROM admin WHERE AdminID=('$adminID')AND adminpassword=('$adminpassword')";
	$resultA=mysqli_query($mysqli,$queryA);
	if (mysqli_num_rows($resultA) ==1 )  {
	
	

	
	$_SESSION['AdminID']=$adminID;
  	$_SESSION['success']="you are now logged in";
  	header('location:../presentaionlayer/admin/index3.php'); 
}  else{
		array_push($errors,"The ID/Password not correct");
		
	}
}
}


	

 if (isset($_POST['sendfeedback'])) {
 $feedback2	= $mysqli -> real_escape_string($_POST['feedx']);




$sqlfeed = "INSERT INTO  feedback (pID,feedback) VALUES ('$userprofile','$feedback2') ";

	if (!$mysqli -> query($sqlfeed)) {
  printf("%d Row inserted.\n", $mysqli->affected_rows);

}


 
}






 $mysqli -> close();



   
 ?>