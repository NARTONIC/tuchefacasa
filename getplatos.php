<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','root','tuchefacasa.com');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT platos.nombre as nombre FROM platos_menu, platos, menu
    WHERE platos_menu.id_menu = menu.id_menu AND platos_menu.id_plato = platos.id_plato
    AND menu.id_menu =  '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table class='table'>
<thead>
<tr>
<th>Platos</th>
</tr>
</thead>
<tbody>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "</tr>";
}
echo "</tbody></table>";
mysqli_close($con);
?>
</body>
</html>