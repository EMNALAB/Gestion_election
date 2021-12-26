<?php
session_start();
require('../connection.php');

if(empty($_SESSION['admin_id'])){
	header("location:index.php");
} 
	//query candidates from the candidates table
	$result=mysqli_query($con,"SELECT * FROM candidates");
	if (mysqli_num_rows($result)<1){
		$result = null;
	}

	// retrieving states from state table
	$states_received=mysqli_query($con, "SELECT * FROM states");



if (isset($_POST['Submit'])){
	$newCandidateName = addslashes( $_POST['name'] );
	$newCandidateState = $_POST['state'];

	$sql = mysqli_query($con, "INSERT INTO candidates(candidate_name,candidate_state) VALUES ('$newCandidateName','$newCandidateState')" );

	// Insert and refresh the candidate page
	 header("Location: candidates.php");
}


 if (isset($_GET['id'])){
	 $id = $_GET['id'];
	 $result = mysqli_query($con, "DELETE FROM candidates WHERE candidate_id='$id'");
	 
	 // Remove and refresh the candidate page
	 header("Location: candidates.php");
 }
 else
?>

<!DOCTYPE html>
<html>
<head>
<title>Administration :Candidates</title>
<link href="styles.css" rel="stylesheet"><link rel="stylesheet" href="bootstrap2.css" >
<script language="JavaScript" src="js/admin.js"></script>
</head>
<body>
 
<div  class="res-div2">
         <div class= "menu">
		 <center>
           <h1> <img src="images/Election-Vote-2-icon.png"  width=7%  ></img> </h1>
               <a class="a_link" href="refresh.php" >Statistiques</a>
               <!--<a class="a_link" href="states.php">États</a> -->
               <a class="a_link" href="candidates.php">Candidates</a> 
               <a class="a_link" href="managedata.php"> Comptes</a> 
               <a class="a_link" href="pwchange.php">Gerer mot de passes</a>  
               <a class="a_link" href="logout.php">Se déconnecter</a>
            </center>
            <br>
         </div><h3 style="color: #567dd0; text-align: center;">Ajout d'un Candidat</h3>
		<table align="center">
			<CAPTION></CAPTION>
			<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
			<tr>
				<td> nom du Candidate</td>
				<td><input class="form-control" type="text" name="name" /></td>
			</tr>
			<tr>
				<td>Lieu du Candidate</td>
				<td><SELECT NAME="state" id="state">select
					<OPTION  VALUE="select">select
					
					<?php 
					//get all the states
					while ($row=mysqli_fetch_array($states_received)){
						echo "<OPTION VALUE=$row[statename] selected>$row[statename]";
					}
					?>
					</SELECT>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input  class="btn btn-success"  type="submit" name="Submit" value="Ajouter" /></td>
			</tr>
		</table><h3 style="color: #567dd0; text-align: center;"> Candidats</h3>
		<table class="table"border="0" width="620" align="center" style="    width: 50%;margin-top: 20px;background-color: #567dd01f;">
		<div > 
			<CAPTION></CAPTION>
			<tr>
			<th scope="col">Candidate ID</th>
			<th scope="col">Candidate Name</th>
			<th scope="col">Candidate State</th>
			</tr>

			<?php
			//while loop through all table rows listing candidate names with their state
			$inc=1;
			while ($row=mysqli_fetch_array($result)){			
					echo "<tr>";
					echo "<td>" . $inc."</td>";
					echo "<td>" . $row['candidate_name']."</td>";
					echo "<td>" . $row['candidate_state']."</td>";
					echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
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