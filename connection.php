<?php

$head_hostname = "localhost";
$head_user = "root";//change
$head_password = "";//change
$head_database = "toptop_dot_lk_dbmain";//change

$dbConnection= $db = $conn = $con = mysqli_connect($head_hostname,$head_user,$head_password,$head_database);   //create connection
$con->set_charset("utf8");


if(mysqli_connect_errno())
{
 echo "Failed to connect to database".mysqli_connect_error();
}
	




?>
