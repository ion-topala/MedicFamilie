<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);

if (isset($_POST['tableBoala']) && isset($_POST['denBoala'])) {
    $tableBoala = clearString($_POST['tableBoala']);
    $denBoala = clearString($_POST['denBoala']);

    $result = mysqli_query($con, "SELECT nume_pacient, prenume_pacient, IDNP_pacient, den_boala
        FROM pacienti_afectiuni_sezon 
        INNER JOIN afectiuni_sezon
          ON boala_id = id_boala
        INNER JOIN lista_pacienti
          ON pacient_id = id_pacient WHERE boala_id = 2;");
    $result = mysqli_fetch_all($result);
    // sa adaug if
}
else{
    $result = (array) null;
}

$sql = "SELECT DISTINCT * FROM afectiuni_sezon";
$res = mysqli_query($con,$sql);
$options = '';

while ($row = mysqli_fetch_array($res)){
    $options = $options."<option value=\"$row[0]\">$row[1]</option>";
}

$sql = "SELECT DISTINCT * FROM boli_cronice";
$res = mysqli_query($con,$sql);
$options2 = '';

while ($row2 = mysqli_fetch_array($res)){
    $options2 = $options2."<option value=\"$row2[0]\">$row2[1]</option>";
}
$sql = "SELECT DISTINCT * FROM boli_genetice";
$res = mysqli_query($con,$sql);
$options3 = '';

while ($row3 = mysqli_fetch_array($res)){
    $options3 = $options3."<option value=\"$row3[0]\">$row3[1]</option>";
}
$sql = "SELECT DISTINCT * FROM boli_infectioase";
$res = mysqli_query($con,$sql);
$options4 = '';

while ($row4 = mysqli_fetch_array($res)){
    $options4 = $options4."<option value=\"$row4[0]\">$row4[1]</option>";
}
$sql = "SELECT DISTINCT * FROM lista_restboli";
$res = mysqli_query($con,$sql);
$options5 = '';

while ($row5 = mysqli_fetch_array($res)){
    $options5 = $options5."<option value=\"$row5[0]\">$row5[1]</option>";
}

?>


<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
    <link href="http://localhost/MedicFamilie/style_index.css" rel="stylesheet">
    <link href="http://localhost/MedicFamilie/services/style_medici.css" rel="stylesheet">
    <script>
        function changeText(a){
            document.getElementById("alert-text").innerHTML = a;
        }
    </script>
</head>
<body>
<?php
include "../navbar_gen.php";
?>

<div class="search-box">
    <!--    <h1 id="alert-text"></h1>-->
    <form id="myFormGrad" method="post" action="boli_pacienti.php">
        <p>Lista bolilor</p>
        <select id="select1" name="tableBoala">
            <option value="">Select...</option>
            <option value="afectiuni_sezon">Boli de sezon</option>
            <option value="boli_cronice">Boli cronice</option>
            <option value="boli_genetice">Boli genetice</option>
            <option value="boli_infectioase">Boli infectioase</option>
            <option value="lista_restboli">Alte boli</option>
        </select>
        <select id="select2" name="denBoala">
            <option value="">Select...</option>
            <?php
            echo $options;
            ?>
        </select>
        <select id="select3" name="denBoala">
            <option value="">Select...</option>
            <?php
            echo $options2;
            ?>
        </select>
        <select id="select4" name="denBoala">
            <option value="">Select...</option>
            <?php
            echo $options3;
            ?>
        </select>
        <select id="select5" name="denBoala">
            <option value="">Select...</option>
            <?php
            echo $options4;
            ?>
        </select>
        <select id="select6" name="denBoala">
            <?php
            echo $options5;
            ?>
        </select>
        <button type="submit" class="create">Submit</button>
    </form>
</div>
<table>
    <?php
    if (!empty($result)){?>
    <caption><h3>Lista boli</h3><br></caption>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>IDNP</th>
        <th>Boala</th>
        <?php
        }
        else{
            echo '<script type="text/javascript">changeText("Introduceti filtrele de cautare");</script>';
        }
        ?>
        <?php
        if (!empty($result)){
        foreach ($result as $result){
        ?>
    <tr>
        <td><?= $result[0] ?></td>
        <td><?= $result[1] ?></td>
        <td><?= $result[2] ?></td>
        <td><?= $result[3] ?></td>
    </tr>
<?php
}
}
?>
</table>



<script src="http://localhost/MedicFamilie/script_index.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#select1").change(function(){
        if($(this).val() == "afectiuni_sezon"){
            $("#select2").show();
            $("#select3").hide();
            $("#select4").hide();
            $("#select5").hide();
            $("#select6").hide();
        }
        else if ($(this).val() == "boli_cronice"){
            $("#select2").hide();
            $("#select3").show();
            $("#select4").hide();
            $("#select5").hide();
            $("#select6").hide();
        }
        else if ($(this).val() == "boli_genetice"){
            $("#select2").hide();
            $("#select3").hide();
            $("#select4").show();
            $("#select5").hide();
            $("#select6").hide();
        }
        else if ($(this).val() == "boli_infectioase"){
            $("#select2").hide();
            $("#select3").hide();
            $("#select4").hide();
            $("#select5").show();
            $("#select6").hide();
        }
        else if ($(this).val() == "lista_restboli"){
            $("#select2").hide();
            $("#select3").hide();
            $("#select4").hide();
            $("#select5").hide();
            $("#select6").show();
        }
        else{
            $("#select2").hide();
            $("#select3").hide();
            $("#select4").hide();
            $("#select5").hide();
            $("#select6").hide();
        }

    });
</script>
</body>
</html>

