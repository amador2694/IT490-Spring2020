<?php 

$server = '127.0.0.1'; 
$username = 'aa2427'; 
$password = '1Amadors'; 
$database = 'forums'; 

if(!mysql_connect($server, $username, $password))
{
	exit('Error: Unable to connect to database'); 
}
if(!mysql_select_db($database))
{
	exit('Error: Unable to select the database');
}
?>
