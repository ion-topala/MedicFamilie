<?php
if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");

$array = array(
    "investigatii_ecard" => "prescriere_invest_ecard",
    "investigatii_oftal" => "prescriere_invest_ofta",
    "invsetigatii_gen" => "prescriere_invest_gen",
    "teste_diagn" => "prescriere_teste_diagn",
);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['index']))
{
        $sql = "SELECT nume_med, nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic FROM prescriere_medicament
        INNER JOIN lista_medici ON prescriere_medicament.medicament_id=lista_medici.id_medic
        INNER JOIN lista_pacienti ON prescriere_medicament.pacient_id=lista_pacienti.id_pacient
        INNER JOIN lista_medicamente ON prescriere_medicament.medicament_id = lista_medicamente.id_medicament;";

    $result = mysqli_query($con,$sql);
    $result = mysqli_fetch_all($result);

    $sql = "SELECT nume_med FROM lista_medicamente;";
    $resultMed = mysqli_query($con,$sql);
    $resultMed = mysqli_fetch_all($resultMed);

    $res = mysqli_query($con, $sql);
    $options2 = '';

    while ($row2 = mysqli_fetch_array($res)) {
        $options2 = $options2 . "<option value=\"$row2[0]\">$row2[0]</option>";
    }

    $sql = "SELECT den_serviciu, nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic FROM prescriere_invest_ecard 
    INNER JOIN lista_medici ON prescriere_invest_ecard.medic_id=lista_medici.id_medic 
    INNER JOIN lista_pacienti ON prescriere_invest_ecard.pacient_id=lista_pacienti.id_pacient 
    INNER JOIN investigatii_ecard ON prescriere_invest_ecard.invest_id = investigatii_ecard.id_invest;";

    $investigatiiCard = mysqli_query($con,$sql);
    $investigatiiCard = mysqli_fetch_all($investigatiiCard);

    $sql = "SELECT den_serviciu, nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic
FROM prescriere_invest_ofta
INNER JOIN lista_medici
      ON prescriere_invest_ofta.medic_id=lista_medici.id_medic
INNER JOIN lista_pacienti
      ON prescriere_invest_ofta.pacient_id=lista_pacienti.id_pacient
INNER JOIN investigatii_oftal
		ON prescriere_invest_ofta.invest_id = investigatii_oftal.id_invest";
    $investigatiiOftal = mysqli_query($con,$sql);
    $investigatiiOftal = mysqli_fetch_all($investigatiiOftal);

    $sql = "SELECT den_serviciu, nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic
FROM prescriere_invest_gen
INNER JOIN lista_medici
      ON prescriere_invest_gen.medic_id=lista_medici.id_medic
INNER JOIN lista_pacienti
      ON prescriere_invest_gen.pacient_id=lista_pacienti.id_pacient
INNER JOIN invsetigatii_gen
		ON prescriere_invest_gen.invest_id = invsetigatii_gen.id_invest";

    $investigatiiGen = mysqli_query($con,$sql);
    $investigatiiGen = mysqli_fetch_all($investigatiiGen);

    $sql = "SELECT den_serviciu, nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic
FROM prescriere_teste_diagn
INNER JOIN lista_medici
      ON prescriere_teste_diagn.medic_id=lista_medici.id_medic
INNER JOIN lista_pacienti
      ON prescriere_teste_diagn.pacient_id=lista_pacienti.id_pacient
INNER JOIN teste_diagn
		ON prescriere_teste_diagn.invest_id = teste_diagn.id_invest";
    $testeDiagn = mysqli_query($con,$sql);
    $testeDiagn = mysqli_fetch_all($testeDiagn);

    $response = [
        "medicamentePrescrise" => $result,
        "listaMedicamente" => $resultMed,
        "investigatiiCard" =>$investigatiiCard,
        "investigatiiOftal" =>$investigatiiOftal,
        "investigatiiGen" => $investigatiiGen,
        "testeDiagn" => $testeDiagn,
        "optionsMedicamente" => $options2
    ];

    echo json_encode($response);
    die;
}
elseif($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['medicament']))
{
    $medicament = $_POST['medicament'];
    $sql = "SELECT nume_med, nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic FROM prescriere_medicament
    INNER JOIN lista_medici ON prescriere_medicament.medicament_id=lista_medici.id_medic
    INNER JOIN lista_pacienti ON prescriere_medicament.pacient_id=lista_pacienti.id_pacient
    INNER JOIN lista_medicamente ON prescriere_medicament.medicament_id = lista_medicamente.id_medicament WHERE nume_med = '$medicament';";

    $result = mysqli_query($con, $sql);
    $result = mysqli_fetch_all($result);

    $response = [
        "filtruMedicament" => $result
    ];

    echo json_encode($response);
    die;
}
elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['pacientIDNP']) && isset($_POST['medicamentDen']) && isset($_POST['medicIDNP'])){
    $pacientIDNP = $_POST['pacientIDNP'];
    $medicament = $_POST['medicamentDen'];
    $medicIDNP = $_POST['medicIDNP'];

    $pacientId = "SELECT DISTINCT id_pacient FROM lista_pacienti where IDNP_pacient ='$pacientIDNP';";
    $result = mysqli_query($con, $pacientId);
    $pacientId = mysqli_fetch_all($result);
    $pacientId = $pacientId[0][0];

    $medicId = "SELECT DISTINCT id_medic FROM lista_medici where IDNP_medic ='$medicIDNP';";
    $result = mysqli_query($con, $medicId);
    $medicId = mysqli_fetch_all($result);
    $medicId = $medicId[0][0];

    $medicamentID = "SELECT DISTINCT id_medicament FROM lista_medicamente where den_international ='$medicament';";
    $result = mysqli_query($con, $medicamentID);
    $medicamentID = mysqli_fetch_all($result);
    $medicamentID = $medicamentID[0][0];

    mysqli_query($con,"INSERT INTO prescriere_medicament (id_prescriere, medicament_id, medic_id, pacient_id) VALUES (NULL, '$medicamentID', '$medicId', '$pacientId');");

    $response = [
        "status" => true
    ];
    echo json_encode($response);
    die;
}
elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['pacientIDNP']) && isset($_POST['investDen']) && isset($_POST['medicIDNP']) && isset($_POST['investTable'])){
    $pacientIDNP = $_POST['pacientIDNP'];
    $investDen = $_POST['investDen'];
    $medicIDNP = $_POST['medicIDNP'];
    $investTable = $_POST['investTable'];

    $pacientId = "SELECT DISTINCT id_pacient FROM lista_pacienti where IDNP_pacient ='$pacientIDNP';";
    $result = mysqli_query($con, $pacientId);
    $pacientId = mysqli_fetch_all($result);
    $pacientId = $pacientId[0][0];

    $medicId = "SELECT DISTINCT id_medic FROM lista_medici where IDNP_medic ='$medicIDNP';";
    $result = mysqli_query($con, $medicId);
    $medicId = mysqli_fetch_all($result);
    $medicId = $medicId[0][0];

    $investID = "SELECT DISTINCT id_invest FROM $investTable where den_serviciu ='$investDen';";
    $result = mysqli_query($con, $investID);
    $investID = mysqli_fetch_all($result);
    $investID = $investID[0][0];

    mysqli_query($con, "INSERT INTO $array[$investTable] (id_prescriere, invest_id, medic_id, pacient_id) VALUES (NULL, '$investID', '$medicId', '$pacientId');");

    $response = [
        "status" => true
    ];
    echo json_encode($response);
    die;
}