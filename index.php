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
                <h2>Pacienti</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
            <div class="content-container">
                <h2>Medicamente</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
            <div class="content-container">
                <h2>Medici</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
        </div>
        <div class="container">
            <div class="content-container">
                <h2>Pacienti</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
            <div class="content-container">
                <h2>Medicamente</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
            </div>
            <div class="content-container">
                <h2>Medici</h2>
                <a href="#">Graficul medicilor</a><br>
                <a href="#">Medicul de Garda</a>
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
        <a href="#"></a>
    </div>
    <div id="box2" class="services-container images">
        <div class="number">2</div>
        <div class="text">About Doctors</div>
        <a href="#"></a>
    </div>
    <div id="box3" class="services-container images">
        <div class="number">3</div>
        <div class="text">About Patients</div>
        <a href="#"></a>
    </div>
    <div id="box4" class="services-container images">
        <div class="number">4</div>
        <div class="text">Diseases</div>
        <a href="#"></a>
    </div>

</div>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
</body>
</html>
