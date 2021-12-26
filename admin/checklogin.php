<!DOCTYPE html>
<html>
<head>
	<title>Login Check</title>
</head>
<body leftmargin="20%">
		<div align="center" style="border:1px solid black;background-color:Moccasin;">
			<div id="header">
				<h1>Détails fournis non valides </h1>
			</div>
		<div>
<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);

	ob_start();
	session_start();
	require('../connection.php');

	$tbl_name="admin_table";

	// login data email as username and password details into variables
	$myusername=$_POST['myusername'];
	$mypassword=$_POST['mypassword'];

	$encrypted_mypassword=md5($mypassword);
	$myusername = stripslashes($myusername);
	//$mypassword = stripslashes($encrypted_mypassword);

	$sql=mysqli_query($con, "SELECT * FROM admin_table WHERE email='$myusername' and password='$mypassword'");
	// Checking table row
	$count = mysqli_num_rows($sql);

	// valid email and password redirect to result page
	if($count){	
		$user=mysqli_fetch_assoc($sql); 
		$_SESSION['admin_id'] = $user['admin_id'];
	header("location:refresh.php");
	}

	else {
		echo "Le mot de passe entré est incorrect<br><br>Retourner à la <a href=\"index.php\">connexion</a>";
	}
  
	ob_end_flush();
?> 
<br><br>
		</div>
	</div>
</body>
</html>