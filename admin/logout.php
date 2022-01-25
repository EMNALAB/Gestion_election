<!DOCTYPE html>
<html>
<head>
	<title>Logged Out</title>
</head>
<body leftmargin="20%">
		<div align="center" style="border:1px solid black;background-color:OldLace;">
		<div>
			<h1>Déconnecté!!</h1>
			<p align="center">&nbsp;</p>
		</div>
<?php
session_start();
session_destroy();
?>
	Vous avez été déconnecté avec succès.<br><br><br>
	Retourner à la <a href="index.php">connexion</a>
	
		</div>
	</div>
</body>
</html>