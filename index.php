<?php

session_start();
include ("form/connection.php");
include ("form/functions.php");
$user_data = check_login($con);
?>

<html lang="en">
<head>
    <title>Medic de familie</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php
include "navbar_gen.php";
?>
<br>
<br>
<br>
<br>
<br>
<h1>Medic de familie</h1>
<div>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab earum fugiat saepe? A aut, autem, debitis doloribus est id impedit, laboriosam molestiae nisi obcaecati officia quia reprehenderit sunt tempora ut.
</div>
<div class="bg-modal">
    <div class="modal-content">
        <div class="close">+</div>
        <div class="container">
            <div class="content-container">
                <h2>Pacienti</h2>
            </div>
            <div class="content-container">
                <h2>Medicamente</h2>
            </div>
            <div class="content-container">
                <h2>Medici</h2>
            </div>
        </div>
        <div class="container">
            <div class="content-container">
                <h2>Pacienti</h2>
            </div>
            <div class="content-container">
                <h2>Medicamente</h2>
            </div>
            <div class="content-container">
                <h2>Medici</h2>
            </div>
        </div>
    </div>
</div>
<script src="script_index.js"></script>
</body>
</html>
