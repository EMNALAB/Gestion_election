<?php
require('connection.php');

session_start();
if(empty($_SESSION['voterid']))
	{
	 header("location:index.php");
	}

$allstates=mysqli_query($con, "SELECT * FROM states");

// check if input is submitted for state selection
 if (isset($_POST['Submit']))
	{
	 // get state
	 $state_name = addslashes( $_POST['state_name'] );
	 
	 $result = mysqli_query($con,"SELECT * FROM candidates WHERE candidate_state='$state_name'");
	 
	}
 else
?>
<!DOCTYPE html>
<html>
<head>
<title>Voting Page</title>   
<script language="JavaScript" src="js/user.js"></script>


<script type="text/javascript">
function getVote(int){
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else{
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

	if(confirm("Your vote is for "+int)){
	  var pos=document.getElementById("str").value;
	  var id=document.getElementById("hidden").value;
	  xmlhttp.open("GET","save.php?vote="+int+"&user_id="+id+"&state_name="+pos,true);
	  xmlhttp.send();

		xmlhttp.onreadystatechange =function(){
			if(xmlhttp.readyState ==4 && xmlhttp.status==200){
				document.getElementById("error").innerHTML=xmlhttp.responseText;
			}
		}	

	}
	else{
		alert("Choose another state. ");
	}
		
}

function getPosition(String){
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	xmlhttp.open("GET","vote.php?state_name="+String,true);
	xmlhttp.send();
}
</script>

<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function(){
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
              j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>

</head>
<body leftmargin="20%">	
	<div style="border:1px solid black;background-color:Wheat;"><center>

	<div>
	<div>
		<h1>You can vote here.</h1>
		<a href="logout.php">Logout</a>
	</div>
	<div class="refresh">
		</div>
			<div>
				<table width="420" align="center">
				<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
				<tr>
					<td>Choose State</td>
					<td><SELECT NAME="state_name" id="state_name" onclick="getPosition(this.value)">
					<OPTION VALUE="select">select
					<?php 
					//loop through all table rows
					while ($row=mysqli_fetch_array($allstates)){
					echo "<OPTION VALUE=$row[statename] selected>$row[statename]";
					}
					?>
					</SELECT></td>
					<td><input type="hidden" id="hidden" value="<?php echo $_SESSION['voterid']; ?>" /></td>
					<td><input type="hidden" id="str" value="<?php echo $_REQUEST['state_name']; ?>" /></td>
					<td><input type="submit" name="Submit" value="See Candidates" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td> 
					<td>&nbsp;</td>
				</tr>
				</form> 
				</table>
				<table width="270" align="center">
					<form>
					<tr>
						<th>Candidates:</th>
					</tr>


					<?php
						//loop through all table rows
						if (isset($_POST['Submit'])){
							while ($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>" . $row['candidate_name']."</td>";
								echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
								echo "</tr>";
							}
							mysqli_free_result($result);
							mysqli_close($con);	
						}
					else

					?>
					</form>
				</table>
				</div>
			</div>
		</div>
	</body>
</html>