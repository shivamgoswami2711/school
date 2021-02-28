<?php
$servername = "localhost";
$username = "root";
$password = "Shivam@6162";
$dbname = "school";

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) 
{
 die("Connection failed: " . $con->connect_error);
}
?>
