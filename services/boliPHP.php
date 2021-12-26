<?php
if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");

$array = array(
    "afectiuni_sezon" => "pacienti_afectiuni_sezon",
    "boli_cronice" => "pacienti_boli_cronice",
    "boli_genetice" => "pacienti_boli_genetice",
    "boli_infectioase" => "pacienti_boli_infect",
    "lista_restboli" => "pacienti_restboli",
);


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['tableBoala']) && isset($_POST['pacientiB'])) {
    $tableBoala = clearString($_POST['tableBoala']);

    $query = "SELECT * FROM $tableBoala where 1;";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_all($result);

    $sql = "SELECT DISTINCT * FROM afectiuni_sezon";
    $res = mysqli_query($con,$sql);
    $options = '';

    while ($row = mysqli_fetch_array($res)){
        $options = $options."<option value=\"$row[0]\">$row[1]</option>";
    }

    $sql = "SELECT DISTINCT * FROM boli_cronice";
    $res = mysqli_query($con,$sql);
    $options2 = '';

    while ($row2 = mysqli_fetch_array($res)){
        $options2 = $options2."<option value=\"$row2[0]\">$row2[1]</option>";
    }
    $sql = "SELECT DISTINCT * FROM boli_genetice";
    $res = mysqli_query($con,$sql);
    $options3 = '';

    while ($row3 = mysqli_fetch_array($res)){
        $options3 = $options3."<option value=\"$row3[0]\">$row3[1]</option>";
    }
    $sql = "SELECT DISTINCT * FROM boli_infectioase";
    $res = mysqli_query($con,$sql);
    $options4 = '';

    while ($row4 = mysqli_fetch_array($res)){
        $options4 = $options4."<option value=\"$row4[0]\">$row4[1]</option>";
    }
    $sql = "SELECT DISTINCT * FROM lista_restboli";
    $res = mysqli_query($con,$sql);
    $options5 = '';

    while ($row5 = mysqli_fetch_array($res)){
        $options5 = $options5."<option value=\"$row5[0]\">$row5[1]</option>";
    }

    $sql = "SELECT DISTINCT IDNP_pacient FROM istorie_medicala INNER JOIN lista_pacienti ON pacient_id = id_pacient;";
    $istorieMedicala = mysqli_query($con, $sql);
    $istorieMedicala = mysqli_fetch_all($istorieMedicala);

    $response = [
        "boli" => $result,
        "afectiuniSezon" => $options,
        "boliCronice" => $options2,
        "boliGenetice" => $options3,
        "boliInfectioase" => $options4,
        "alteBoli" => $options5,
        "pacientiIstorieMedicala" =>$istorieMedicala
    ];


    echo json_encode($response);
    die;
}
elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['tableBoala'])){
    $tableBoala = clearString($_POST['tableBoala']);

    $query = "SELECT * FROM $tableBoala where 1;";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_all($result);

    $response = [
        "boli" => $result
    ];
    echo json_encode($response);
    die;
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['pacientiB']) && isset($_POST['denBoala'])){
    $pacientiB = $_POST['pacientiB'];
    $denBoala = $_POST['denBoala'];


    $query = "SELECT nume_pacient, prenume_pacient, IDNP_pacient, den_boala
        FROM $array[$pacientiB]
        INNER JOIN $pacientiB
          ON boala_id = id_boala
        INNER JOIN lista_pacienti
          ON pacient_id = id_pacient WHERE boala_id = '$denBoala';";
    $result = mysqli_query($con, $query);
    $result = mysqli_fetch_all($result);

    $response = [
        "pacientiBolnavi" => $result
    ];
    echo json_encode($response);
    die;
}
elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['myInput'])){
    $myInput = $_POST['myInput'];
    $pacientId = "SELECT DISTINCT id_pacient FROM lista_pacienti where IDNP_pacient ='$myInput';";
    $result = mysqli_query($con, $pacientId);
    $pacientId = mysqli_fetch_all($result);
    $pacientId = $pacientId[0][0];

    $sql = "SELECT nume_pacient, prenume_pacient, IDNP_pacient,den_boala  FROM istorie_medicala INNER JOIN lista_pacienti ON pacient_id = id_pacient where istorie_medicala.pacient_id = '$pacientId';";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result);

    $response = [
      "pacientIstorie" => $result
    ];
    echo json_encode($response);
    die;
}
