<?php

require_once "../form/connection.php";

$numeP = $_POST['numeP'];
$numeM = $_POST['numeM'];
$appTime = $_POST['app-time'];

mysqli_query($con, "INSERT INTO `inscriere` (`id_inscriere`, `pacient_id`, `medic_id`, `timpul_inscrierii`) VALUES (NULL, '$numeP', '$numeM', '$appTime');");

header("Location: inscrieri.php");