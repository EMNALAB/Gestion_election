<!DOCTYPE html>
<html> 
<head>
<title>Invalid login details</title> 
<link href="style2.css" rel="stylesheet">
<script language="JavaScript" src="js/user.js"></script>
	<body >
		<div class="mydiv">
			<div>
			<h1>Invalid Login details </h1>
			<p align="center">&nbsp;</p>
			</div>
			<div id="container">
				<?php
				ini_set ("display_errors", "1");
				error_reporting(E_ALL);

				ob_start();
				session_start();
				require('connection.php');
				
				// login form input data defined to variables
				$myusername=$_POST['myusername'];
				$mypassword=$_POST['mypassword'];
				//$encrypted_mypassword=md5($mypassword); 				
				$myusername = stripslashes($myusername);
				$mypassword = stripslashes($mypassword);

				$sql=mysqli_query($con, "SELECT * FROM voters WHERE email='$myusername' and password='$mypassword'");
				$count=mysqli_num_rows($sql);

				if($count==1){// Direct to voting page for successful login after setting usersession.					
					$user = mysqli_fetch_assoc($sql);
					$_SESSION['voterid'] = $user['voterid'];
					header("location:vote.php");
				}					
				else {// Redirect to login page on invalid input.
					echo "Wrong Email or Password Combination<br><br>Try again to <a href=\"index.php\">Login</a>";
				}
				ob_end_flush();
				?> 
			</div>
		</div>
	</body>
</html>