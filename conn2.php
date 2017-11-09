<?php

$link = mysql_connect('localhost','root','root');
if(!$link) {
	die('Failed to connect to server: ' . mysql_error());
}

//Select database
$db = mysql_select_db('sales', $link);
if(!$db) {
	die("Unable to select database");
}

?>