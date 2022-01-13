<?php
error_reporting(1);
//$con=mysql_connect('localhost', 'root', '','election') or die(mysqli_error());
$con=pg_connect('localhost', 'root', '','election',) 
// this is database connection stored in a variable con.

?>
