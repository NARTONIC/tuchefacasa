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
                $q = $_GET['id_pedido'];
                
                $con = mysqli_connect('localhost','root','root','tuchefacasa.com');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

$nombre = "select cliente.nombre AS nombre from pedidos, cliente where pedidos.id_cliente=cliente.id_cliente and pedidos.id_pedido = $q;";
$fecha = "select fecha from pedidos where id_pedido = $q;";
$localidad =" select localidad.nombre AS localidad from pedidos, localidad where pedidos.cp = localidad.cp and pedidos.id_pedido = $q;";
$direccion = "select direccion AS direccion from pedidos where id_pedido = $q;";
$comensales = "select comensales AS comensales from pedidos where id_pedido = $q;";
$platos = "select platos.nombre AS platos from pedidos, platos, pedidos_platos
where pedidos.id_pedido = pedidos_platos.id_pedido and pedidos_platos.id_plato = platos.id_plato and pedidos.id_pedido=$q;";
$menu ="select menu.nombre AS menu from pedidos, menu, pedido_menu
where pedidos.id_pedido = pedido_menu.id_pedido and pedido_menu.id_menu = menu.id_menu and pedidos.id_pedido = $q;";
$bebidas = "select bebidas.nombre AS bebida from pedidos, pedidos_bebidas, bebidas
where pedidos.id_pedido = pedidos_bebidas.id_pedido and pedidos_bebidas.id_bebida = bebidas.id_bebida
and pedidos.id_pedido=$q;";    
$resultnombre = mysqli_query($con,$nombre);
    echo "<table>";
        echo "<tr>";
            while($row = mysqli_fetch_array($resultnombre)) {
                echo "<td>NOMBRE</td>";
                echo "<td>".$row['nombre']."</td>";
            }
        echo "</tr>";
        $resultfecha = mysqli_query($con,$fecha);
        echo "<tr>";
            while($row = mysqli_fetch_array($resultfecha)) {
                echo "<td>FECHA</td>";
                echo "<td>".$row['fecha']."</td>";
            }
        echo "</tr>";
        $resultlocalidad = mysqli_query($con,$localidad);
        echo "<tr>";
            while($row = mysqli_fetch_array($resultlocalidad)) {
                echo "<td>LOCALIDAD</td>";
                echo "<td>".$row['localidad']."</td>";
            }
        echo "</tr>";
        $resultdireccion = mysqli_query($con,$direccion);
        echo "<tr>";
            while($row = mysqli_fetch_array($resultdireccion)) {
                echo "<td>DIRECCION</td>";
                echo "<td>".$row['direccion']."</td>";
            }
        echo "</tr>";
        $resultcomensales = mysqli_query($con,$comensales);
        echo "<tr>";
            while($row = mysqli_fetch_array($resultcomensales)) {
                echo "<td>COMENSALES</td>";
                echo "<td>".$row['comensales']."</td>";
            }
        echo "</tr>";
        $resultplatos = mysqli_query($con,$platos);
        $resultmenu = mysqli_query($con,$menu);
        $row_cnt = $resultplatos->num_rows;
        if ($row_cnt == 0){
            while($row = mysqli_fetch_array($resultmenu)) {
                echo "<tr>";
                echo "<td>MENU</td>";
                echo "<td>".$row['menu']."</td>";
                echo "</tr>";
            }
        } else {
            while($row = mysqli_fetch_array($resultplatos)) {
                echo "<tr>";
                echo "<td>PLATO</td>";
                echo "<td>".$row['platos']."</td>";
                echo "</tr>";
            }
        }
    echo "</table>";
    
    echo "<h3>BEBIDAS</h3>";
    echo "<table>";
    $resultbebidas = mysqli_query($con,$bebidas);
    while($row = mysqli_fetch_array($resultbebidas)) {
                echo "<tr>";
                echo "<td>".$row['bebida']."</td>";
                echo "</tr>";
            }
mysqli_close($con);
            ?>
	</div>
</div>

</body>
</html>


