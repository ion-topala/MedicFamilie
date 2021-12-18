<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass= "Google73T!";
$dbname = "medic_familie";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed to connect!");
}