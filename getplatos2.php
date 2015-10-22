<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','root','tuchefacasa.com');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM platos WHERE id_tipo ='".$q."'";
$result = mysqli_query($con,$sql);

echo "<table class='table'>
<thead>
<tr>
<th>Plato</th>
<th>Precio</th>
</tr>
</thead>
<tbody>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['precio'] . "€</td>";
    echo "</tr>";
}
echo "</tbody></table>";
mysqli_close($con);
?>
</body>
</html>