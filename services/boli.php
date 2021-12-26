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

</head>
<body>
<?php
include "../navbar_gen.php";
?>

<div class="search-box" id="boliBox">
    <form id="boliForm">
        <p>Lista bolilor</p>
        <select name="tableBoala" id="tableBoala">
            <option value="afectiuni_sezon">Boli de sezon</option>
            <option value="boli_cronice">Boli cronice</option>
            <option value="boli_genetice">Boli genetice</option>
            <option value="boli_infectioase">Boli infectioase</option>
                <option value="lista_restboli">Alte boli</option>
        </select>
        <button type="submit" class="create" id="boliButton">Submit</button>
    </form>
</div>

<div class="search-box" id="pacientiBolnaviBox">
    <form >
        <p>Lista bolilor</p>
        <select name="pacientiB" id="pacientiB">
            <option value="afectiuni_sezon">Boli de sezon</option>
            <option value="boli_cronice">Boli cronice</option>
            <option value="boli_genetice">Boli genetice</option>
            <option value="boli_infectioase">Boli infectioase</option>
            <option value="lista_restboli">Alte boli</option>
        </select>
        <select id="select2" name="denBoala">
            <option value="">Select...</option>
        </select>
        <button type="submit" class="create" id="pacientiBolnaviButton">Submit</button>
    </form>
</div>
<div class="search-box" id="autocompleteBox">
<!--    Make sure the form has the autocomplete function switched off:-->
    <form autocomplete="off" >
        <div class="autocomplete" style="width:300px;">
            <label>IDNP:</label>
            <input class="input-auto input-text" id="myInput" type="text" name="myCountry" placeholder="Cautare dupa IDNP">
        </div>
        <button type="submit" class="create" id="istorieMedButton">Submit</button>
    </form>
</div>

<table id="myTable">
    <caption><h3>Lista boli</h3><br></caption>
    <tr>
        <th>Id</th>
        <th>Boala</th>
</table>
<table id="pacientiBolnavi">
    <caption><h3>Pacienti Bolnavi</h3><br></caption>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>IDNP</th>
        <th>Boala</th>
    <tr>
</table>
<table id="istoriaMedicalaTable">
    <caption><h3>Istoria Medicala</h3><br></caption>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>IDNP</th>
        <th>Boala</th>
    <tr>
</table>


<select name="optionsSelect" id="optionsSelect">
    <option value="listaBoli">Afisarea listei bolilor</option>
    <option value="pacientiBoli">Afisarea pacientilor bolnavi</option>
    <option value="istoriaPacient">Istoria medicala per pacient</option>
</select>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="boli_script.js"></script>
</body>
</html>

