<?php
if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['index']))
{
    $sql = "SELECT DISTINCT id_pacient, nume_pacient, prenume_pacient FROM lista_pacienti";
    $res = mysqli_query($con,$sql);
    $options = '';

    while ($row = mysqli_fetch_array($res)){
        $options = $options."<option value=\"$row[0]\">$row[1] $row[2]</option>";
    }

    $sql = "SELECT DISTINCT id_medic, nume_medic, prenume_medic FROM lista_medici";
    $res = mysqli_query($con,$sql);
    $options2 = '';

    while ($row2 = mysqli_fetch_array($res)){
        $options2 = $options2."<option value=\"$row2[0]\">$row2[1] $row2[2]</option>";
    }
    $resultInscrieri = mysqli_query($con, "SELECT id_inscriere, nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic, timpul_inscrierii
            FROM inscriere
            INNER JOIN lista_pacienti
                ON pacient_id = id_pacient
            INNER JOIN lista_medici
                ON inscriere.medic_id = id_medic");
    $resultInscrieri = mysqli_fetch_all($resultInscrieri);

    $response = [
        "pacienti" => $options,
        "medici" => $options2,
        "all" =>$resultInscrieri
    ];

    echo json_encode($response);
    die;
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['meetingTime'])){
    $meetingTime = $_POST['meetingTime'];
    $sql = "SELECT DISTINCT nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic, timpul_inscrierii
            FROM inscriere
            INNER JOIN lista_pacienti
                ON pacient_id = id_pacient
            INNER JOIN lista_medici
                ON inscriere.medic_id = id_medic where timpul_inscrierii = '$meetingTime';";
    $resultMeeting = mysqli_query($con,$sql);
    $resultMeeting = mysqli_fetch_all($resultMeeting);

    $response = [
        "meetTime" => $resultMeeting
    ];

    echo json_encode($response);
    die;
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['meetingApp']) && isset($_POST['numeM']) && isset($_POST['numeP']))
{
    $meetingApp = $_POST['meetingApp'];
    $numeP = $_POST['numeP'];
    $numeM = $_POST['numeM'];

    mysqli_query($con, "INSERT INTO `inscriere` (`id_inscriere`, `pacient_id`, `medic_id`, `timpul_inscrierii`) VALUES (NULL, '$numeP', '$numeM', '$meetingApp');");
    $response = [
      "status" => true
    ];
    echo json_encode($response);
    die;
}
else{
    $response = [
        "status" => false
    ];
    echo json_encode($response);
    die;
}


