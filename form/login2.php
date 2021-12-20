<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>LogIn</title>
    <link rel="stylesheet" href="style_forms.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
</head>
<body>
<?php
include "nav_form.php";
?>
<div class="box">
    <form id="login-form">
        <div class="title">
            <h1>LogIn</h1>
        </div>
        <div class="box_form">
            <label>IDNP</label>
            <input tabindex="1" placeholder="IDNP" type="text" name="username"><br><br>
            <label>Password</label>
            <input tabindex="2" id="password" placeholder="Password" type="password" name="password"><br><br>
            <button tabindex="3" id="button" type="submit" class="login_btn"">Log in</button><br><br>
            <p class="msg none">LALAL</p>
            <?php
                if (isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
                unset($_SESSION['message']);
            ?>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
<script src="main.js"></script>
</body>
</html>


