<?php
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
    <title>Tratamente</title>
</head>
<body>
<?php
include "../navbar_gen.php";
?>

<div class="search-box" id="substantaActivaBox">
    <form id="substantaActivaForm">
        <select name="selectFiltru" id="selectFiltru">
            <option value="filtreSubstantaActiva">Cauta dupa subst activa</option>
            <option value="filtreProducator">Cauta dupa producator</option>
        </select>
        <p id="labelSubstantaActiva">Substanta activa</p>
        <input name="substantaActiva" id="substantaActiva" type="text">
        <button type="submit" class="create" id="substantaActivaButton">Submit</button>
        <p id="labelProducator">Producator</p>
        <input name="producator" id="producator" type="text"><br>
        <button type="submit" class="create" id="producatorButton">Submit</button>

        <p>Afisarea medicamentelor</p>
        <button type="submit" class="create" id="allMedicamente">Submit</button>
    </form>
</div>



<table id="listDrugs">
    <caption><h3>Lista Medicamente</h3><br></caption>
    <tr>
        <th>Nume Medicament</th>
        <th>Denumire internationala</th>
        <th>Producator</th>
        <th>Substanta activa</th>
    </tr>
</table>
<table id="investigare">
    <caption><h3>Lista Servicii</h3><br></caption>
    <tr>
        <th>Id</th>
        <th>Denumire investigare</th>
    </tr>
</table>

<div class="search-box-left">
    <select id="selectTr">
        <option value="medicamente">Lista medicamentelor disponibile</option>
        <option value="investigatiiCard">Investigatii Ecardiologice</option>
        <option value="investigatiiOftal">Investigatii Oftalmologice</option>
        <option value="investigatiiGen">Investigatii Generale</option>
        <option value="testeDiagn">Teste Diagnostice</option>
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
<script src="tratamente_script.js"></script>
</body>
</html>

