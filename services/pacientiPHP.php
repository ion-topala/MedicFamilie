<?php
if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");

if (isset($_POST['dateSearch']) && isset($_POST['denVaccin'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST" && ($_POST['dateSearch'] == "aaa")) {
        $query = "SELECT id_pacient, nume_pacient, prenume_pacient, IDNP_pacient,lista_pacienti.data_nasterii, regiunea, strada, bloc, apartament, nume_medic, prenume_medic, polita FROM lista_pacienti INNER JOIN adresa ON adresa_id = id_adresa INNER JOIN lista_medici ON medic_id = id_medic;";

        $result = mysqli_query($con, $query);
        $result = mysqli_fetch_all($result);

        $sql = "SELECT DISTINCT  denumire_vaccin FROM vaccinuri_facute WHERE 1";
        $res = mysqli_query($con, $sql);
        $options2 = '';

        while ($row2 = mysqli_fetch_array($res)) {
            $options2 = $options2 . "<option value=\"$row2[0]\">$row2[0]</option>";
        }

        $denVaccin = $_POST['denVaccin'];
        $query = "SELECT DISTINCT nume_pacient, prenume_pacient, IDNP_pacient, denumire_vaccin FROM vaccinuri_facute INNER JOIN lista_pacienti ON pacient_id = id_pacient WHERE denumire_vaccin = '$denVaccin';";

        $resultVaccin = mysqli_query($con, $query);
        $resultVaccin = mysqli_fetch_all($resultVaccin);


        $response = [
            "pacienti" => $result,
            "options" =>$options2,
            "vaccin" => $resultVaccin
        ];
        echo json_encode($response);
        die;
    }
}
else
{
    if ($_SERVER['REQUEST_METHOD'] == "POST" && ($_POST['dateSearch'] == " ")) {
        $query = "SELECT id_pacient, nume_pacient, prenume_pacient, IDNP_pacient,lista_pacienti.data_nasterii, regiunea, strada, bloc, apartament, nume_medic, prenume_medic, polita FROM lista_pacienti INNER JOIN adresa ON adresa_id = id_adresa INNER JOIN lista_medici ON medic_id = id_medic;";

        $result = mysqli_query($con, $query);
        $result = mysqli_fetch_all($result);

        $sql = "SELECT DISTINCT  denumire_vaccin FROM vaccinuri_facute WHERE 1";
        $res = mysqli_query($con, $sql);
        $options2 = '';

        while ($row2 = mysqli_fetch_array($res)) {
            $options2 = $options2 . "<option value=\"$row2[0]\">$row2[0]</option>";
        }
        $response = [
            "pacienti" => $result,
            "options" =>$options2
        ];
        echo json_encode($response);
        die;
    }
}
