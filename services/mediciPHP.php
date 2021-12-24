<?php
if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");

if (isset($_POST['dateSearch'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && ($_POST['dateSearch'] == " ")) {
        $query = "SELECT id_medic, nume_medic, prenume_medic, IDNP_medic, data_nasterii, regiunea, strada, bloc, apartament FROM lista_medici INNER JOIN adresa ON adresa_id = id_adresa;";

        $result = mysqli_query($con, $query);
        $result = mysqli_fetch_all($result);

        echo json_encode($result);
        die;
    } else
        if ($_SERVER['REQUEST_METHOD'] == "POST" && ($_POST['dateSearch'] != " ")) {
            $dateSearch = $_POST['dateSearch'];
            $query = "SELECT id_medic, nume_medic, prenume_medic, IDNP_medic, data_nasterii, regiunea, strada, bloc, apartament FROM lista_medici INNER JOIN adresa ON adresa_id = id_adresa WHERE data_nasterii = '$dateSearch' ;";

            $result = mysqli_query($con, $query);
            $result = mysqli_fetch_all($result);

            echo json_encode($result);
            die;
        }}

if (isset($_POST['grad'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && ($_POST['grad'] != " ")) {
        $grad = clearString($_POST['grad']);
        $result = mysqli_query($con, "SELECT nume_medic, prenume_medic, den_grad FROM grad_profesional INNER JOIN lista_medici ON medic_id = id_medic where den_grad = '$grad';");
        $result = mysqli_fetch_all($result);
        echo json_encode($result);
        die;
    }
}
if (isset($_POST['ziuaGarda'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && ($_POST['ziuaGarda'] != " ")) {
        $ziuaGarda = clearString($_POST['ziuaGarda']);
        $result = mysqli_query($con, "SELECT nume_medic, prenume_medic, ziua_garda FROM medic_garda INNER JOIN lista_medici ON medic_id = id_medic where ziua_garda ='$ziuaGarda';");
        $result = mysqli_fetch_all($result);
        echo json_encode($result);
        die;
    }
}