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
    <link href="style_medici.css">
    <title>Lista pacienti</title>
</head>
<body>
<?php
include "../navbar_gen.php";
?>
<div class="search-box" id="vaccinBox">
    <form id="myFormVaccin" >
        <select name="denVaccin" id="denVaccin">
            <option value="">Select...</option  >
        </select>
        <button type="submit" class="create" id="vaccinButton">Submit</button>
    </form>
</div>

<table id="myTable">
    <caption><h1>Datele despre pacienti</h1><br></caption>
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
        <th>Numele medicului</th>
        <th>Prenumele medicului</th>
        <th>polita</th>
    </tr>

</table>
<select id="polita" name="polita" form="polita">
    <option value="all">Afisare toti pacienti</option>
    <option value="true">Afisarea pacientilor cu polita</option>
    <option value="false">Afisarea pacientilor fara polita</option>
</select>
<br>

<table id="vaccinTable">
    <caption><h3>Cautarea pacientilor dupa vaccin</h3><br></caption>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>IDNP</th>
        <th>Denumire Vaccin</th>
</table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="pacienti_script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

