<?php

require_once "../form/connection.php";

$name = $_POST['name'];
$sname = $_POST['sname'];
$idnp = $_POST['idnp'];
$date = $_POST['date'];

mysqli_query($con,"INSERT INTO `lista_medici` (`id_medic`, `nume_medic`, `prenume_medic`, `IDNP_medic`, `adresa_id`, `data_nasterii`) VALUES (NULL, '$name', '$sname', '$idnp', '1', '$date')");

header ('Location: medici.php');