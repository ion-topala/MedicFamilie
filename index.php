<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("form/connection.php");
include ("form/functions.php");
$user_data = check_login($con);
?>

<html lang="en">
<head>
    <title>Family doctor</title>

    <meta
            charset="utf-8"
            name="viewport"
            content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <link href="http://localhost/MedicFamilie/style_index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link
            rel="stylesheet"
            href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="footer/css/ionicons.min.css">
    <link rel="stylesheet" href="footer/css/style.css">
</head>
<body>
<?php
include "navbar_gen.php";
?>

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

<!-- Swiper -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="img/doctor1.png" alt="Man Doctor"></div>
        <div class="swiper-slide"><img src="img/doctor2.png" alt="Two young doctors"></div>
        <div class="swiper-slide"><img src="img/doctor3.png" alt="Woman Doctor"></div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

<div class="services">
    <div id="box1" class="services-container images">
        <div class="number">1</div>
        <div class="text">Appointments</div>
        <a href="http://localhost/MedicFamilie/services/inscrieri.php"></a>
    </div>
    <div id="box2" class="services-container images">
        <div class="number">2</div>
        <div class="text">About Doctors</div>
        <a href="http://localhost/MedicFamilie/services/medici.php"></a>
    </div>
    <div id="box3" class="services-container images">
        <div class="number">3</div>
        <div class="text">About Patients</div>
        <a href="http://localhost/MedicFamilie/services/pacienti.php"></a>
    </div>
    <div id="box4" class="services-container images">
        <div class="number">4</div>
        <div class="text">Prescriptions</div>
        <a href="http://localhost/MedicFamilie/services/prescrieri.php"></a>
    </div>

</div>
<?php
include "footer/footer.php";
?>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
</body>
</html>
