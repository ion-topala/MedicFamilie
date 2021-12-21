<?php

if(!isset($_SESSION))
{
    session_start();
}
//include ("form/connection.php");
//include ("form/functions.php");
//$user_data = check_login($con);
?>

<html>
<head>
    <link href="http://localhost/MedicFamilie/style_index.css" rel="stylesheet">
</head>
<body>
<header id="header">
    <a href="http://localhost/MedicFamilie/index.php" class="logo">Medic de Familie</a>
    <div id="toggle"></div>
    <div id="navbar">
        <ul>
            <?php if (isset($_SESSION['user_id']) ){ ?>
            <li><a id="button">Services</a></li>
            <?php }
            else {?>
                <li><a href="http://localhost/MedicFamilie/form/login2.php">Sign In</a></li>
                <li><a href="http://localhost/MedicFamilie/form/signup2.php">Sign Up</a></li>
            <?php }?>
            <li><a href="http://localhost/MedicFamilie/form/contact2.php" target="_blank" id="contact">Contact Us</a></li>
            <?php if (isset($_SESSION['user_id']) ){ ?>
                <li><a href="http://localhost/MedicFamilie/form/logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </div>
</header>
</body>

</html>