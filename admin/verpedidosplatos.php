<!DOCTYPE html>

<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<title>Tuchefacasa | Gastronomía y Pequeños Eventos</title>
	 <link rel=stylesheet href="../css/estilos.css" type="text/css">
	 <style type="text/css" id="syntaxhighlighteranchor"></style>
</head>

<body class="blog custom-background mp6 customizer-styles-applied single-author indexed highlander-enabled highlander-light">

<div id="page">

		
<header id="masthead" role="banner">
    <h1 id="site-title"><a href="index.php" title="Tuchefacasa" rel="home">Tuchefacasa</a></h1>
    <a class="custom-header" href="index.php" rel="home">
            <img class="custom-header-image" src="https://tuchefacasa.files.wordpress.com/2014/04/cropped-cropped-chefacasa_fotor2.jpg" width="940" height="359" alt="" />
	</a>
        <div id="login">

        </div>
	
	<nav id="access" role="navigation">
            <div id="header">
            <ul class="nav">
		<li><a href="admin.php">Inicio</a></li>
                <li><a href="platos.php">Platos</a></li>
                <li><a href="menus.php">Menus</a></li>
                <li><a href="">Pedidos</a>
                    <ul>
                        <li><a href="verpedidosplatos.php">Ver Pedidos Platos</a></li>
                        <li><a href="pedidosmenu.php">Ver Pedidos Menu</a></li>
                    </ul>
		</li>
            </ul>
	</div>
	</nav>
</header>
	<div id="main">
            <?php

$con = mysqli_connect('localhost','root','root','tuchefacasa.com');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="select * from pedidos";
$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>ID PEDIDO</th>
<th>ID CLIENTE</th>
<th>FECHA</th>
<th>HORA</th>
<th>CODIGO POSTAL</th>
<th>DIRECCION</th>
<th>COMENSALES</th>
<th>VER</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id_pedido'] . "</td>";
    echo "<td>" . $row['id_cliente'] . "</td>";
    echo "<td>" . $row['fecha'] . "</td>";
    echo "<td>" . $row['hora'] . "</td>";
    echo "<td>" . $row['cp'] . "</td>";
    echo "<td>" . $row['direccion'] . "</td>";
    echo "<td>" . $row['comensales'] . "</td>";
    echo "<td> <a href='detallepedido.php?id_pedido=".$row['id_pedido']."'> Ver </a></td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
	</div>
</div>

</body>
</html>


