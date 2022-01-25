<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
</head>
<body leftmargin="20%">	
	<div style="border:1px solid black;background-color:Tomato;">
			
		<?php
		session_destroy();
		?>
				<center><br><br><br><br><h1>You have been successfully logged out.</h1><br><br>
				<a href="index.php">Login Again</a><br><br><br><br><br></center>
		</div>
	</body>
</html>

