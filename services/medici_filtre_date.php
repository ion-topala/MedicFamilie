<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);

if (isset($_POST['date'])) {
    $date = clearString($_POST['date']);
    $result = mysqli_query($con, "SELECT id_medic, nume_medic, prenume_medic, IDNP_medic, data_nasterii, regiunea, strada, bloc, apartament FROM lista_medici INNER JOIN adresa ON adresa_id = id_adresa WHERE data_nasterii = '$date' ;");
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


<!--<h3>The option element</h3>-->
<!---->
<!--<select id="test" name="form_select" onchange="showDiv('myForm', this)">-->
<!--    <option value="0">No</option>-->
<!--    <option value="1">By date</option>-->
<!--    <option value="2">By grad</option>-->
<!--</select>-->
<div class="search-box">
<!--    <h1 id="alert-text"></h1>-->
    <!--Cautarea dupa data-->
    <form id="myForm" method="post" action="medici_filtre_date.php">
        <p>Data nasterii</p>
        <input type="date" id="theDate" name="date" value="2018-07-22">
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

