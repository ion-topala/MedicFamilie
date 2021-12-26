<?php
if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['index'])){
    $sql = "SELECT nume_med, den_international, producator, subst_activa FROM lista_medicamente;";
    $result = mysqli_query($con,$sql);
    $result = mysqli_fetch_all($result);

    $sql = "SELECT * FROM investigatii_ecard;";
    $investigatiiCard = mysqli_query($con,$sql);
    $investigatiiCard = mysqli_fetch_all($investigatiiCard);

    $sql = "SELECT * FROM investigatii_oftal;";
    $investigatiiOftal = mysqli_query($con,$sql);
    $investigatiiOftal = mysqli_fetch_all($investigatiiOftal);

    $sql = "SELECT * FROM invsetigatii_gen;";
    $investigatiiGen = mysqli_query($con,$sql);
    $investigatiiGen = mysqli_fetch_all($investigatiiGen);

    $sql = "SELECT * FROM teste_diagn;";
    $testeDiagn = mysqli_query($con,$sql);
    $testeDiagn = mysqli_fetch_all($testeDiagn);

    $response = [
        "medicamente" => $result,
        "investigatiiCard" =>$investigatiiCard,
        "investigatiiOftal" =>$investigatiiOftal,
        "investigatiiGen" => $investigatiiGen,
        "testeDiagn" => $testeDiagn
    ];

    echo json_encode($response);
    die;
}
elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['substantaActiva'])){
    $substantaActiva = clearString($_POST['substantaActiva']);
    $sql = "SELECT nume_med, den_international, producator, subst_activa FROM lista_medicamente where subst_activa = '$substantaActiva';";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result);

    $response = [
        "medicamenteSubst" => $result
    ];

    echo json_encode($response);
    die;
}

elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['producator'])){
    $producator = clearString($_POST['producator']);
    $sql = "SELECT nume_med, den_international, producator, subst_activa FROM lista_medicamente where producator = '$producator';";
    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result);

    $response = [
        "producator" => $result
    ];

    echo json_encode($response);
    die;
}