<?php
session_start();
require('../connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Data Change</title>
</head>
<body>
<link href="styles.css" rel="stylesheet">
<link rel="stylesheet" href="bootstrap2.css" >
 
<div  class="res-div2">
         <div class= "menu">
            <center>
           <h1> <img src="images/Election-Vote-2-icon.png"  width=7%  ></img> </h1>
               <a class="a_link" href="refresh.php" >Statistiques</a>
               <!-- <a class="a_link" href="states.php">États</a> -->
               <a class="a_link" href="candidates.php">Candidates</a> 
               <a class="a_link" href="managedata.php"> Comptes</a> 
               <a class="a_link" href="pwchange.php">Gerer mot de passes</a>  
               <a class="a_link" href="logout.php">Se Déconnecter</a>
            </center>
            <br>
         </div>
<?php
	if(empty($_SESSION['admin_id'])){
		header("location:index.php");
	}

	//fetch data for update file
	$result=mysqli_query($con, "SELECT * FROM admin_table WHERE admin_id = '$_SESSION[admin_id]'");
	if (mysqli_num_rows($result)<1){
		$result = null;
	}
	$row = mysqli_fetch_array($result);
	if($row){
		$adminId = $row['admin_id'];
		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		$email = $row['email'];
	}

	//Updating to new password
	if (isset($_GET['id']) && isset($_POST['update'])){
		$myId = addslashes( $_GET['id']);
		$myFirstName = addslashes( $_POST['firstname'] );
		$myLastName = addslashes( $_POST['lastname'] );
		$myEmail = $_POST['email'];

		$sql = mysqli_query($con, "UPDATE admin_table SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE admin_id = '$myId'" );
	}
?>
<h3 style="color: #567dd0; text-align: center;">Modifier le compte</h4> 
			<table class="table"border="0" width="620" align="center" style="    width: 50%;margin-top: 20px; ">
				<tr>
					<td>
					<form action="managedata.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
					<table class="table"border="0" width="620" align="center" style="    width: 50%;margin-top: 20px; ">
				 
					<tr scope="col"><td >Nom </td><td><input type="text" name="firstname" maxlength="20" value="<?php echo $firstName ?>"></td></tr>
					<tr scope="col"><td >Prenom</td><td><input type="text" name="lastname" maxlength="20" value="<?php echo $lastName ?>"></td></tr>
					<tr scope="col"><td  >Address Email </td><td><input type="text" name="email" maxlength="80" value="<?php echo $email?>"></td></tr>
					</table>
					</form>
					</td>
				</tr>
			</table>

			
		</div>
 
</body>
</html>