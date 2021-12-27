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

<div class="search-box" id="autocompleteBox2">
    <!--    Make sure the form has the autocomplete function switched off:-->
    <form autocomplete="off" >
        <div class="autocomplete" style="width:300px;">
            <label>Cauta dupa medicament:</label>
            <input class="input-auto input-text" id="myInput" type="text" name="myCountry" value="" placeholder="Medicament">
        </div>
        <button type="submit" class="create" id="istorieMedButton">Submit</button>
    </form>
    <p>Prescrie un medicament</p>
    <button type="submit" class="create" id="prescrieButton">Submit</button>
</div>

<table id="medicamentePrescrise">
    <caption><h2>Medicamente Prescrise</h2><br></caption>
    <tr>
        <th>Medicament</th>
        <th>Nume Pacient</th>
        <th>Prenume Pacient</th>
        <th>IDNP Pacient</th>
        <th>Nume Medic</th>
        <th>Prenume Medic</th>
    </tr>
</table>

<table id="investigatiiPrescrise">
    <caption><h2>Investigatii prescrise</h2><br></caption>
    <tr>
        <th>Denumire</th>
        <th>Nume Pacient</th>
        <th>Prenume Pacient</th>
        <th>IDNP Pacient</th>
        <th>Nume Medic</th>
        <th>Prenume Medic</th>
    </tr>
</table>

<div class="search-box-left">
    <select id="selectPrescrieri">
        <option value="prescriereMedicamente">Afisarea medicamentelor prescrise</option>
        <option value="prescriereInvestigatiiCard">Investigatii Ecardiologice prescrise</option>
        <option value="prescriereInvestigatiiOftal">Investigatii Oftalmologice prescrise</option>
        <option value="prescriereInvestigatiiGen">Investigatii Generale prescrise</option>
        <option value="prescrieretesteDiagn">Teste Diagnostice prescrise</option>
    </select>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="prescrieri_script.js"></script>
</body>
</html>

