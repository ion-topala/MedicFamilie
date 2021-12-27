<?php

if(!isset($_SESSION))
{
    session_start();
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
</head>
<body>
<?php
include "../navbar_gen.php";
?>


<div class="search-box">

    <!--Cautarea dupa data-->
    <form id="myForm">
        <p>Cautarea dupa data:</p>
        <input type="datetime-local" id="meeting-time"
               name="meeting-time" value=""
               min="2020-01-07T00:00" max="2021-12-31T00:00">
        <button type="submit" class="create" id="cautareData">Submit</button>
    </form>
    <form id="myForm">
        <input type="hidden" name="meeting-time" value="all">
        <p>Afisarea tuturor inscrierilor</p>
        <button type="submit" class="create" id="showAll">Submit</button>
    </form>
</div>

<table id="inscrieriTable">
        <caption><h2>Inscrierile</h2><br></caption>
        <tr>
            <th>Nume</th>
            <th>Prenume</th>
            <th>IDNP</th>
            <th>Nume Medic</th>
            <th>Prenume Medic</th>
            <th>Timpul inscrierii</th>
        </tr>
</table>

<div class="search-box-left" id="leftInscrieri">
        <form id="appointment">
            <p>Nume Pacient</p>
            <select name="numeP" id="numeP">
                <option value="">Select...</option>
            </select>
            <p>Nume Medic</p>
            <select name="numeM" id="numeM">
                <option value="">Select...</option>
            </select>
            <p>Ziua inscrierii</p>
            <input type="datetime-local" id="meetingApp"
                   name="app-time" value=""
                   min="2020-12-01T00:00" max="2022-12-31T00:00">
            <button type="submit" class="create" id="createApp">Submit</button>
        </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="inscrieri_script.js"></script>
</body>
</html>

