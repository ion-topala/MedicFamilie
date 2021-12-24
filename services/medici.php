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
    <title>Lista medici</title>
</head>
<body>
<?php
include "../navbar_gen.php";
?>
<div class="search-box">
    <!--    <h1 id="alert-text"></h1>-->
    <!--Cautarea dupa data-->
    <form id="dateForm">
        <p>Data nasterii</p>
            <input type="date" id="dateSearch" name="dateSearch">
        <button type="submit" class="create" id="dateButton">Submit</button>
    </form>
</div>

<table id="myTable">
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
</table>
<p id="textp" style="color: #ec3838"></p>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="services_script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

