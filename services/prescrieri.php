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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="../footer/css/ionicons.min.css">
    <link rel="stylesheet" href="../footer/css/style.css">
    <title>Prescrieri</title>
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
<div class="search-box" id="prescrieInvestBox">
    <p>Prescrie o investigatie</p>
    <button type="submit" class="create" id="prescrieInvestButton">Submit</button>
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
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="prescrieri_script.js"></script>
</body>
</html>

