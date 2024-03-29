<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);
?>

<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
    <link href="http://localhost/MedicFamilie/style_index.css" rel="stylesheet">
    <link href="http://localhost/MedicFamilie/services/style_medici.css" rel="stylesheet">
    <title>Lista medici</title>
</head>
<body>
<?php
include "../navbar_gen.php";
?>

<table>
    <caption><h1>Datele despre medici</h1><br></caption>
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
    $result = mysqli_query($con, "SELECT id_medic, nume_medic, prenume_medic, IDNP_medic, data_nasterii, regiunea, strada, bloc, apartament FROM lista_medici INNER JOIN adresa ON adresa_id = id_adresa;");
    $result = mysqli_fetch_all($result);

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
<!--<form method="post" action="medici.php">-->
<!--        <p>Data nasterii</p>-->
<!--        <input type="date" name="date" value="2017-06-01">-->
<!--        <button type="submit" class="create">Sumbit</button>-->
<!--</form>-->

<!--<form action="create_medici.php" method="post">-->
<!--    <p>Name</p>-->
<!--    <input type="text" name="name">-->
<!--    <p>Second name</p>-->
<!--    <input type="text" name="sname">-->
<!--    <p>IDNP</p>-->
<!--    <input type="text" name="idnp">-->
<!--    <p>Data nasterii</p>-->
<!--    <input type="date" name="date" value="2017-06-01">-->
<!--    <button type="submit" class="create">Sumbit</button>-->
<!--</form>-->

<script src="http://localhost/MedicFamilie/script_index.js"></script>
</body>
</html>

