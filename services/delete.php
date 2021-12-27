<?php

include ("../form/connection.php");
include ("../form/functions.php");

$id = $_GET['id'];
mysqli_query($con, "DELETE FROM inscriere WHERE inscriere.id_inscriere ='$id' ");
header("Location: inscrieri.php");
die;

