<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);

if (isset($_POST['denVaccin'])) {
    $denVaccin = clearString($_POST['denVaccin']);
    $result = mysqli_query($con, "SELECT DISTINCT nume_pacient, prenume_pacient, IDNP_pacient, denumire_vaccin FROM vaccinuri_facute INNER JOIN lista_pacienti ON pacient_id = id_pacient WHERE denumire_vaccin = '$denVaccin'");
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
    <!--    <h1 id="alert-text"></h1>-->
    <!--Cautarea dupa grad-->
    <form id="myFormGrad" method="post" action="pacienti_vaccin.php">
        <select name="denVaccin">
            <option value="">Select...</option>
            <option value="Astra-Zeneca">Astra-Zeneca</option>
            <option value="Phizer">Phizer</option>
            <option value="Sinovac">Sinovac</option>
            <option value="Johnson & Johnson">Johnson & Johnson</option>
            <option value="Moderna">Moderna</option>
            <option value="Sinopharm">Sinopharm</option>
            <option value="Sputnik">Sputnik</option>
        </select>
        <button type="submit" class="create">Submit</button>
    </form>
</div>
<table>
    <?php
    if (!empty($result)){?>
    <caption><h3>Cautarea pacientilor dupa vaccin</h3><br></caption>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>IDNP</th>
        <th>Denumire Vaccin</th>
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

