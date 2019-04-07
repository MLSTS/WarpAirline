<?php

include_once 'WA_config.php';
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_errno)
{
	echo "Database Connection Failed!";
}

