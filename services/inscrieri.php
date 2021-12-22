<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);

if (isset($_POST['meeting-time'])) {
    $meetingTime = clearString($_POST['meeting-time']);
    $result = mysqli_query($con, "SELECT nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic, timpul_inscrierii
FROM inscriere
INNER JOIN lista_pacienti
      ON pacient_id = id_pacient
INNER JOIN lista_medici
      ON inscriere.medic_id = id_medic;");
    $result = mysqli_fetch_all($result);
}
else{
    $result = (array) null;
}


?>

<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
    <link href="http://localhost/MedicFamilie/style_index.css" rel="stylesheet">
    <link href="http://localhost/MedicFamilie/services/style_medici.css" rel="stylesheet">
    <title>Filtrarea dupa data</title>
    <script>
        function changeText(a){
            document.getElementById("alert-text").innerHTML = a;
        }
    </script>
</head>
<body>
<?php
include "../navbar_gen.php";
?>


<div class="search-box">

    <!--Cautarea dupa data-->
    <form id="myForm" method="post" action="inscrieri.php">
        <p>Data inscrierii</p>
        <input type="datetime-local" id="meeting-time"
               name="meeting-time" value=""
               min="2020-01-07T00:00" max="2021-12-31T00:00">
        <button type="submit" class="create">Submit</button>
    </form>
</div>

<table>
    <?php
    if (!empty($result)){?>
        <caption><h2>Datele despre medici dupa data nasterii</h2><br></caption>
        <tr>
            <th>ID</th>
            <th>Nume</th>
            <th>Prenume</th>
            <th>IDNP</th>
            <th>Data nasterii</th>
            <th>Orasul</th>
            <th>Strada</th>
            <th>Blocul</th>
            <th>Apartamentul</th>
        </tr>
        <?php
    }
    else{
        echo '<script type="text/javascript">changeText("Introduceti filtrele de cautare");</script>';
    }
    ?>
    <?php
    if (!empty($result)){
        foreach ($result as $result){
            ?>
            <tr>
                <td><?= $result[0] ?></td>
                <td><?= $result[1] ?></td>
                <td><?= $result[2] ?></td>
                <td><?= $result[3] ?></td>
                <td><?= $result[4] ?></td>
                <td><?= $result[5] ?></td>
                <td><?= $result[6] ?></td>
                <td><?= $result[7] ?></td>
                <td><?= $result[8] ?></td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<div class="bg-modal">
    <div class="modal-content">
        <div class="close">+</div>
        <div class="container">
            <div class="content-container">
                <h2>Pacienti</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
            <div class="content-container">
                <h2>Medicamente</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
            <div class="content-container">
                <h2>Medici</h2>
                <a href="http://localhost/MedicFamilie/services/medici.php" target="_blank">Lista medicilor</a><br>
                <a href="http://localhost/MedicFamilie/services/medici_filtre_date.php" target="_blank">Gasirea dupa ziua<br> de nastere</a><br>
                <a href="http://localhost/MedicFamilie/services/medici_filtreZiGarda.php" target="_blank">Ziua de garda</a><br>
                <a href="http://localhost/MedicFamilie/services/medici_filtre_grad.php" target="_blank">Grad profesional</a>
            </div>
        </div>
        <div class="container">
            <div class="content-container">
                <h2>Pacienti</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
            <div class="content-container">
                <h2>Medicamente</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
            <div class="content-container">
                <h2>Medici</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
        </div>
    </div>
</div>


<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script>
    function showDiv(divId, element)
    {
        document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
    }
</script>
</body>
</html>

