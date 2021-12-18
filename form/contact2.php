
<?php
//session_start();
//?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
</head>
<body>
<?php
include "nav_form.php";
?>
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
</body>
</html>
