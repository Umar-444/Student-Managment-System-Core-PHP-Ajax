<?php

$dbHost = "localhost";
$dbUser = "root";
$dbName = "testphase";
$dbPass = "";

$myConnection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);



function myQuery($qeury){
	global $myConnection;
	return mysqli_query($myConnection, $qeury);
}

function myNumRowsCount($result){
	return mysqli_num_rows($result);
}

function myEscape($string){
	global $myConnection;
	return mysqli_real_escape_string($myConnection, $string);
}


function myFetchArray($result){
	global $myConnection;
	return mysqli_fetch_array($result);
}



?>
