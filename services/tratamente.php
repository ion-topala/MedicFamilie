<?php
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

<select id="selectTr">
    <option value="medicamente">Lista medicamentelor disponibile</option>
    <option value="investigatiiCard">Investigatii Ecardiologice</option>
    <option value="investigatiiOftal">Investigatii Oftalmologice</option>
    <option value="investigatiiGen">Investigatii Generale</option>
    <option value="testeDiagn">Teste Diagnostice</option>
</select>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="tratamente_script.js"></script>
</body>
</html>

