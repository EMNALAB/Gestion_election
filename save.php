<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require('connection.php');
	$vote = $_REQUEST['vote'];
	$user_id=$_REQUEST['user_id'];
	$state_name=$_REQUEST['state_name'];

$sql=mysqli_query($con, "SELECT state_name,voter_id FROM voting_table where state_name='$state_name' and voter_id='$user_id'");

// checks if already voted in certain state
if(mysqli_num_rows($sql))
{
    echo "<h3>You have already voted for this State.</h3>";
}
else{
    //if not voted,insert data and check states
    $ins=mysqli_query($con,"INSERT INTO voting_table (voter_id, state_name, candidateName) VALUES ('$user_id', '$state_name', '$vote')");
    mysqli_query($con, "UPDATE candidates SET candidatevotes=candidatevotes+1 WHERE candidate_name='$vote'");
    mysqli_close($con);
 
	echo "<h3>You have voted for ".$vote."</h3>";
}
?>