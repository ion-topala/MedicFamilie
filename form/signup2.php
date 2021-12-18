<?php
include ("registerPHP.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>SignUp</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
</head>
<body>
<?php
include "nav_form.php";
?>
<div class="box">
    <form id="register-form">
        <div class="title">
            <h1>Create Account</h1>
        </div>
        <div class="box_form">
            <p class="msg none"></p>
            <label>IDNP</label>
            <input tabindex="1" placeholder="IDNP" type="text" name="username"><br><br>
            <label>Password</label>
            <input tabindex="2" id="password" placeholder="Password" type="password" name="password"><br><br>
            <label>Password check</label>
            <input tabindex="3" placeholder="Re-enter password" type="password" name="password2"><br><br>
            <label>First name</label>
            <input tabindex="4" name="firstName" placeholder="First name" type="text"><br><br>
            <label>Second name</label>
            <input tabindex="5" name="secondName" placeholder="Second name" type="text"><br><br>
            <button tabindex="6" id="button" class="register-btn" type="submit">SignUp</button><br><br>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
<script src="main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>

