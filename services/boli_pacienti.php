<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);

if (isset($_POST['tableBoala'])) {
    $tableBoala = clearString($_POST['tableBoala']);
    $result = mysqli_query($con, "SELECT * FROM $tableBoala where 1;");
    $result = mysqli_fetch_all($result);
}
else{
    $result = (array) null;
}

$sql = "SELECT DISTINCT id_pacient, nume_pacient, prenume_pacient FROM lista_pacienti";
$res = mysqli_query($con,$sql);
$options = '';

while ($row = mysqli_fetch_array($res)){
    $options = $options."<option value=\"$row[0]\">$row[1] $row[2]</option>";
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
    <form id="myFormGrad" method="post" action="boli.php">
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
            <option value="aaa">aaa</option>
        </select>
        <select id="select3" name="denBoala">
            <option value="">Select...</option>
            <option value="">bbb</option>
        </select>
        <select id="select4" name="denBoala">
            <option value="">Select...</option>
            <option value="">ccc</option>
        </select>
        <select id="select5" name="denBoala">
            <option value="">Select...</option>
            <option value="">dd</option>
        </select>
        <select id="select6" name="denBoala">
            <option value="">Select...</option>
            <option value="">eee</option>
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
        }
        else{
            $("#select2").hide();
        }

    });
</script>
</body>
</html>

