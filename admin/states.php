<?php
session_start();
require('../connection.php');
//If your session isn't valid, it returns you to the login screen for protection
	if(empty($_SESSION['admin_id'])){
		header("location:index.php");
	}
//retrive states from the states table
	$result=mysqli_query($con, "SELECT * FROM states");
	if (mysqli_num_rows($result)<1){
		$result = null;
	}

// inserting sql query
	if (isset($_POST['Submit'])){
		$newState = addslashes( $_POST['statename'] );
		$sql = mysqli_query($con, "INSERT INTO states (statename) VALUES ('$newState')");

	// redirect back to states page
	header("Location: states.php");
	}

	// deleting sql query
	// check if the 'id' variable is set
	if (isset($_GET['id'])){
		// get auto genereted id value
		$id = $_GET['id'];
	 
		// deleting entry
		$result = mysqli_query($con, "DELETE FROM states WHERE stateno='$id'");
	 
		// redirect back to states page
		header("Location: states.php");
	}
	else
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration Management of States</title>
	<link href="styles.css" rel="stylesheet">
	<script language="JavaScript" src="js/admin.js"></script>
</head>

<body>
		<div >
	
		<div  class="res-div2">
		<div class= "menu">
            <center>
           <h1> <img src="images/Election-Vote-2-icon.png"  width=7%  ></img> </h1>
               <a class="a_link" href="refresh.php" >Statistiques</a>
               <a class="a_link" href="states.php">États</a> 
               <a class="a_link" href="candidates.php">Candidates</a> 
               <a class="a_link" href="managedata.php"> Comptes</a> 
               <a class="a_link" href="pwchange.php">Gerer mot de passes</a>  
               <a class="a_link" href="logout.php">Logout</a>
            </center>
            <br>
         </div>
	<div>
		<table width="420" align="center">
		<div class="input-group mb-3">
			<CAPTION><h3   style="color: #567dd0;">Ajouter Etat</h3></CAPTION>
				<form name="fmPositions" id="fmPositions" action="states.php" method="post" onsubmit="return positionValidated(this)">
					<tr>
						<td>Nom</td>
						<td><input type="text" name="statename" /></td>
						<td><input class="btn btn-primary" type="submit" name="Submit" value="Add" /></td>
					</tr>
				</form>
		</table>
		<table border="0" width="420" align="center" style="    width: 50%; margin-top: 20px;  background-color: #567dd01f;" ><br>
	 
			<CAPTION><h3  style="color: #567dd0;">Etats valables</h3></CAPTION>
				<tr>
					<th> ID Etat</th>
					<th>Nom Etat</th>
				</tr>
				</div>
				<?php
				//loop through all table rows
				$inc=1;
				while ($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>" .$inc."</td>";
					echo "<td>" . $row['statename']."</td>";
					echo '<td><a href="states.php?id=' . $row['stateno'] . '">Delete State</a></td>';
					echo "</tr>";
					$inc++;
				}

				mysqli_free_result($result);
				mysqli_close($con);
		?>
		</table>
		</div>
	</div>
</body>
</html>