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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="../footer/css/ionicons.min.css">
    <link rel="stylesheet" href="../footer/css/style.css">
    <title>Lista pacienti</title>
</head>
<body>
<?php
include "../navbar_gen.php";
?>
<div class="search-box" id="vaccinBox">
    <form id="myFormVaccin" >
        <label>Cautarea pacientilor dupa vaccin</label>
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
<div class="search-box-left">
    <select id="polita" name="polita" form="polita">
        <option value="all">Afisare toti pacienti</option>
        <option value="true">Afisarea pacientilor cu polita</option>
        <option value="false">Afisarea pacientilor fara polita</option>
    </select>
</div>

<table id="vaccinTable">
    <caption><h3>Cautarea pacientilor dupa vaccin</h3><br></caption>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>IDNP</th>
        <th>Denumire Vaccin</th>
</table>

<div class="bg-modal">
    <div class="modal-content">
        <div class="close">+</div>
        <div class="container">
            <div class="content-container">
                <a href="http://localhost/MedicFamilie/services/pacienti.php"><h2>Pacienti</h2></a>
                <a aria-current="page">Lista pacientilor</a><br>
                <a aria-current="page">Verificarea pacientilor cu vaccin</a><br>
                <a aria-current="page">Verificare politei</a>
            </div>
            <div class="content-container">
                <a href="http://localhost/MedicFamilie/services/medici.php"><h2>Medici</h2></a>
                <a aria-current="page">Lista medicilor</a><br>
                <a aria-current="page">Cautarea dupa filtre</a><br>
            </div>
            <div class="content-container">
                <a href="http://localhost/MedicFamilie/services/boli.php"><h2>Boli</h2></a>
                <a aria-current="page">Lista pacientilor</a><br>
                <a aria-current="page">Lista bolilor actuale</a><br>
                <a aria-current="page">Inserarea in baza de date</a>
            </div>
        </div>
        <div class="container">
            <div class="content-container">
                <a href="http://localhost/MedicFamilie/services/inscrieri.php"><h2>Inscrieri</h2></a>
                <a aria-current="page">Cautarea inscrierilor</a><br>
                <a aria-current="page">Adaugarea unei inscrieri in baza</a><br>
                <a aria-current="page">Stergerea unei inscrieri</a>
            </div>
            <div class="content-container">
                <a href="http://localhost/MedicFamilie/services/prescrieri.php"><h2>Prescrieri</h2></a>
                <a aria-current="page">Lista prescrierilor</a><br>
                <a aria-current="page">Inserare in baza de date</a><br>
            </div>
            <div class="content-container">
                <a href="http://localhost/MedicFamilie/services/tratamente.php"><h2>Tratamente</h2></a>
                <a aria-current="page">Cautare dupa filtre</a><br>
                <a aria-current="page">Listele tratamentelor</a><br>
            </div>
        </div>
    </div>
</div>
<?php
include "../footer/footer.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="pacienti_script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

