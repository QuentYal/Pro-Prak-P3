<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "daily_paper";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
