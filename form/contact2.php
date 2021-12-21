<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact_style.css">
    <link rel="stylesheet" href="../style_index.css">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
</head>
<body>
<?php
include "../navbar_gen.php";
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
<div class="wrapper">
    <form id="contact-form">
        <div class="input-fields">
            <input name="name" type="text" class="input" placeholder="Your Name" required>
            <input name="email" type="email" class="input" placeholder="Your Email" required>
            <input name="phone" type="text" class="input" placeholder="Phone">
        </div>
        <div class="msg">
            <textarea name="message" class="form-control" placeholder="Message" required></textarea>
            <button type="submit" class="form-control submit outline">SEND MESSAGE</button>
        </div>
    </form>
    <div class="mess"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
<script src="contact_validation.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://localhost/MedicFamilie/script_index.js"></script>
</body>
</html>
