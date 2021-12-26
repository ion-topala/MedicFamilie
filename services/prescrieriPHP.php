<?php
if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");


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
        "testeDiagn" => $testeDiagn
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