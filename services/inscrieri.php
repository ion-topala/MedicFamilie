<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);

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


if (isset($_POST['meeting-time'])) {
    $meetingTime = clearString($_POST['meeting-time']);
    if ($meetingTime != "all") {
        $result = mysqli_query($con, "SELECT DISTINCT nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic, timpul_inscrierii
            FROM inscriere
            INNER JOIN lista_pacienti
                ON pacient_id = id_pacient
            INNER JOIN lista_medici
                ON inscriere.medic_id = id_medic where timpul_inscrierii = '$meetingTime';");
        $result = mysqli_fetch_all($result);
    }else{
        $result = mysqli_query($con, "SELECT DISTINCT nume_pacient, prenume_pacient, IDNP_pacient, nume_medic, prenume_medic, timpul_inscrierii
            FROM inscriere
            INNER JOIN lista_pacienti
                ON pacient_id = id_pacient
            INNER JOIN lista_medici
                ON inscriere.medic_id = id_medic;");
        $result = mysqli_fetch_all($result);
    }
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
        <p>Cautarea dupa data:</p>
        <input type="datetime-local" id="meeting-time"
               name="meeting-time" value=""
               min="2020-01-07T00:00" max="2021-12-31T00:00">
        <button type="submit" class="create">Submit</button>
    </form>
    <form id="myForm" method="post" action="inscrieri.php">
        <input type="hidden" name="meeting-time" value="all">
        <p>Afisarea tuturor inscrierilor</p>
        <button type="submit" class="create">Submit</button>
    </form>
</div>

<table>
    <?php
    if (!empty($result)){?>
        <caption><h2>Inscrierile</h2><br></caption>
        <tr>
            <th>Nume</th>
            <th>Prenume</th>
            <th>IDNP</th>
            <th>Nume Medic</th>
            <th>Prenume Medic</th>
            <th>Timpul inscrierii</th>

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
            </tr>
            <?php
        }
    }
    ?>
</table>

<div style="position:absolute;">
    <form method="post" action="create_inscrieri.php">
        <p>Nume Pacient</p>
        <select name="numeP">
            <?php
            echo $options;
            ?>
        </select>
        <p>Nume Medic</p>
        <select name="numeM">
            <?php
            echo $options2;
            ?>
        </select>
        <p>Ziua inscrierii</p>
        <input type="datetime-local" id="meeting-time"
               name="app-time" value=""
               min="2020-12-01T00:00" max="2022-12-31T00:00">
        <button type="submit" class="create">Submit</button>
    </form>
</div>


<script src="http://localhost/MedicFamilie/script_index.js"></script>

</body>
</html>

