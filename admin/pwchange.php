<?php
session_start();
require('../connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Password Change</title> 
<link href="styles.css" rel="stylesheet">
<script language="JavaScript" src="js/admin.js"></script>
</head>
<body >
<div  class="res-div2">
         <div class= "menu">
            <center>
           <h1> <img src="images/Election-Vote-2-icon.png"  width=7%  ></img> </h1>
               <a class="a_link" href="refresh.php" >Statistiques</a>
             <!--  <a class="a_link" href="states.php">États</a> -->
               <a class="a_link" href="candidates.php">Candidates</a> 
               <a class="a_link" href="managedata.php"> Comptes</a> 
               <a class="a_link" href="pwchange.php">Gerer mot de passes</a>  
               <a class="a_link" href="logout.php">Se déconnecter</a>
            </center>
            <br>
         </div>
         <div>
<br>
<?php
//Invalid session, redirected backto login
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
		$enPassword = $row['password'];
	}

	if (isset($_GET['id']) && isset($_POST['update'])){
			$myId = addslashes( $_GET['id']);
			//$mypassword = md5($_POST['oldpass']);
			$mypassword = ($_POST['oldpass']);
			$newpass= $_POST['newpass'];
			$confpass= $_POST['confpass'];
			
			if($enPassword==$mypassword){
				if($newpass==$confpass){
					//$newpass = md5($newpass);
					$sql = mysqli_query($con, "UPDATE admin_table SET password='$newpass' WHERE admin_id = '$myId'" );
					echo "<script>alert('Your password is updated');</script>";
				}
				else{
					echo "<script>alert('Your new password and confirm password does not match');</script>";
				}    
			}
			else
			{
				echo "<script>alert('Your old password is not matching with database');</script>";
			}
	}
?>

		<div >
		<table align="center">
			<tr>
				<td>
					<form action="pwchange.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
						<table class="table"border="0"  align="center" style="    width: 80%;margin-top: 20px; ">
							<CAPTION><h4>Change Password</h4></CAPTION>
							<tr><td scope="col">Ancien Mot de passe:</td><td><input type="password" name="oldpass" maxlength="15" value=""></td></tr>
							<tr><td scope="col">Changer Mot de passe</td><td><input type="password" name="newpass" maxlength="15" value=""></td></tr>
							<tr><td scope="col">Confirmer Mot de passe</td><td><input type="password" name="confpass" maxlength="15" value=""></td></tr>
							<tr><td scope="col"> </td><td><input type="submit" class="btn btn-success" name="update" value="Update Account"></td></tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
		</div>
		</div>
	</div>
</body>
</html>