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
<div class="search-box" id="dateBox">
    <form id="dateForm">
        <p>Data nasterii</p>
            <input type="date" id="dateSearch" name="dateSearch">
        <button type="submit" class="create" id="dateButton">Submit</button>
    </form>
</div>
<div class="search-box" id="gradBox">
    <form id="gradForm">
        <p>Gradul profesional</p>
        <input type="text" name="grad" id="grad">
        <button type="submit" class="create" id="gradButton">Submit</button>
    </form>
</div>

<div class="search-box" id="gardaBox">
    <form id="gardaForm">
        <p>Ziua de garda</p>
        <input type="date" id="theDate" name="ziuaGarda" value="">
        <button type="submit" class="create" id="gardaButton">Submit</button>
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
<table id="gradTable">
    <tr>
        <th>ID</th>
        <th>Nume</th>
        <th>Prenume</th>
    </tr>
</table>
<table id="ziuaGarda">
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>Ziua</th>
    </tr>
</table>
<div class="search-box-left">
    <label for="forms">Cautare dupa</label>
    <select id="cars" name="forms" form="forms">
        <option value="date">Dupa data nasterii</option>
        <option value="grad">Dupa grad profesional</option>
        <option value="ziuaGarda">Ziua de garda</option>
    </select>
</div>
    <script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="medici_script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

