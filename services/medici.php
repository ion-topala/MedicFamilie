<?php

if(!isset($_SESSION))
{
    session_start();
}
include ("../form/connection.php");
include ("../form/functions.php");
$user_data = check_login($con);
?>

<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+Antique&display=swap" rel="stylesheet">
    <link href="http://localhost/MedicFamilie/style_index.css" rel="stylesheet">
    <link href="http://localhost/MedicFamilie/services/style_medici.css" rel="stylesheet">
</head>
<body>
<?php
include "../navbar_gen.php";
?>
<div class="main-table" >
<table>
    <tr>
        <th>Nume</th>
        <th>Prenume</th>
        <th>IDNP</th>
        <th>Data nasterii</th>
    </tr>
<?php
$sql = "SELECT nume_medic, prenume_medic, IDNP_medic, data_nasterii from  lista_medici";
$result = $con -> query($sql);

if ($result -> num_rows > 0){
    while ($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row['nume_medic'] ."</td><td>". $row['prenume_medic'] . "</td><td>". $row['IDNP_medic'] ."</td><td>". $row['data_nasterii']. "</td></tr>";
    }
    echo "</table>";
}
else{
    echo "0 results";
}
?>
</table>
</div>


<script src="http://localhost/MedicFamilie/script_index.js"></script>
</body>
</html>

