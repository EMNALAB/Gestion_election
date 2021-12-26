<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link href="style.css" rel="stylesheet">

<link rel="stylesheet" href="bootstrap.css" >
<script language="JavaScript" src="js/user.js"></script>
 
</head>
	<body leftmargin="20%">	
	<div class="log-div">
		<div>
		<h1><center>Inscription pour voter</center></h1>
		</div>
		<div>
		

			<?php
			require('connection.php');
			if (isset($_POST['submit'])){
				$cin = addslashes( $_POST['cin'] );
				$myFirstName = addslashes( $_POST['firstname'] );
				$myLastName = addslashes( $_POST['lastname'] );
				$myEmail = $_POST['email'];
				$myPassword = $_POST['password'];
				$newpass = $myPassword;
				// Inserting voters data for registration
				
				$sql2 = mysqli_query($con, " select * from liste_cin where cin  = '$cin' ");
				if ( ! $row = mysqli_fetch_array( $sql2 ) ) 
				{ 
					echo ( "<center>Votre cin n'exite pas dans notre base <br><br></center>" );
				} 
				else
				{
				$sql = mysqli_query($con, "INSERT INTO voters(first_name, last_name, email, password,cin) 
				VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass', '$cin') ");
				die( "<center>votre compte est enregistré. <br><br>S'il vous plaît identifiez-vous pour <a href=\"index.php\">voter</a></center>" );
				}
			
			}

			echo '<form action="register.php" method="post" onsubmit="return registerValidate(this)">';
			echo '<table align="center"><tr><td>';
			echo "<tr><td>Cin:</td><td><input type='text' name='cin' maxlength='8' value=''></td></tr>";
			echo "<tr><td>Nom:</td><td><input type='text' name='firstname' maxlength='15' value=''></td></tr>";
			echo "<tr><td>Prenom:</td><td><input type='text' name='lastname' maxlength='15' value=''></td></tr>";
			echo "<tr><td>Email Address:</td><td><input type='email' name='email' maxlength='100' id='email'value=''></td><td><span id='result' style='color:red;'></span></td></tr>";
			echo "<tr><td>Password:</td><td><input type='password' name='password' maxlength='15' value=''></td></tr>";
			echo "<tr><td>Confirm Password:</td><td><input type='password' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
			echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Créer un compte'  class='btn btn-success'/></td></tr>";
			echo "<tr><td colspan = '2'><p>Vous avez déjà un compte? <a href='index.php'  class='btn btn-success'><b>Se connecter</b></a></td></tr>";
			echo "</tr></td></table>";
			echo "</form>";

		 
			?>
		</div> 
	</div>
</body>
	<script src="js/jquery-1.2.6.min.js"></script>
		<script>
		$(document).ready(function(){		  
			$('#email').blur(function(event){			 
				event.preventDefault();
				var emailId=$('#email').val();
					$.ajax({                     
					url:'checkuser.php',
					method:'post',
				data:{email:emailId},  
					dataType:'html',
					success:function(message)
					{$('#result').html(message);}
				});
			});
		});	   
    </script>
</html>