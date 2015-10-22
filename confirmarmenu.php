<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tu Chef A Casa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="mostrarmenu.js"></script>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.php">Tu Chef A Casa</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="platos.php">Platos</a>
						</li>
						<li class="active">
							<a href="menus.php">Menu</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pedidos<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
                                                                    <a href="pedidosplatos.php">Platos</a>
								</li>
								<li>
                                                                    <a href="pedidosmenu.php">Menu</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                                            <?php
                                                require_once("common.inc.php");
                                                require_once("classes/Menu.class.php");
                                                require_once("classes/Plato.class.php");
                                                require_once("classes/Localidad.class.php");
                                                require_once("classes/Bebida.class.php");
                                                require_once("classes/Decoracion.class.php");
                                                require_once( "classes/Pedidos.class.php" );
                                                require_once("classes/Factura.class.php");
                                                require_once( "config.php");
                                                session_start();
                                                
                                                if (isset($_SESSION["cliente"])){
                                                    echo "<li><a href='#'>Bienvenido ".$_SESSION["cliente"]->getValue( "nombre" )."</a></li>";
                                                    echo "<li><a href='mispedidos.php'>Area Privada</a></li>";
                                                } else { 
                                                    header('Location: /tuchefacasa/login.php');
                                                }
                                                ?>
					</ul>
				</div>				
			</nav>
			<div class="carousel slide" id="carousel-935538">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-935538">
					</li>
					<li data-slide-to="1" data-target="#carousel-935538" class="active">
					</li>
					<li data-slide-to="2" data-target="#carousel-935538">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
                                            <img alt="" src="img/plato-1.jpg">
						<div class="carousel-caption">
							<h4>
								Carne de primera calidad
							</h4>
						</div>
					</div>
					<div class="item active">
						<img alt="" src="img/plato-2.jpg">
						<div class="carousel-caption">
							<h4>
								Grandes platos de Pasta
							</h4>
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/plato-3.jpg">
						<div class="carousel-caption">
							<h4>
								Sushi de primera calidad
							</h4>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-935538" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-935538" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
	<div id="main">
            <?php
                if(isset($_POST['insertar'])){
                    insertar();
                } else {
            ?>
            <form action="" method="post">
                 <table class="table table-hover">
				<thead>
					<tr>
						<th>
							DATOS PERSONALES
						</th>
						<th>
							
						</th>
					</tr>
				</thead>
				<tbody>
                                    <?php 
                                        $_SESSION['precio'] = 0.0;
                                        echo "<tr><th>Fecha</th><td>".$_SESSION["fecha"]."</td></tr>";
                    echo "<tr><th>Hora</th><td>".$_SESSION['hora']."</td></tr>";
                    echo "<tr><th>Localidad</th><td>";
                    $localidad = Localidad::getByCP($_SESSION['cp']);
                                 echo $localidad->getValueEncoded("nombre");
                    echo "</td></tr>";
                    echo "<tr><th>Direccion</th><td>".$_SESSION['direccion']."</td></tr>";
                    echo "<tr><th>Comensales</th><td>".$_SESSION['comensales']."</td></tr>";
                                    ?>
                                    <tr>
                                        <th>MENU</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    list($platos) = Menu::getByMenu($_SESSION['id_menu']);
                                    foreach ( $platos as $plato ) {
                                        echo "<tr><td>".$plato->getValueEncoded("nombre")."</td><td></td></tr>";           
                                    }
                    
                                    $menu = Menu::getById($_SESSION['id_menu']);
                    
                                    $_SESSION['precio'] += $menu->getValueEncoded("precio");
                                    $_SESSION['precio'] *= $_SESSION['comensales'];
                                    
                                    echo "<tr><th>DECORACION</th><th></th></tr>";
                                    $decoracion = Decoracion::getById($_SESSION['id_decoracion']);
                                    echo "<tr><td>".$decoracion->getValueEncoded("nombre")."</td><td></td></tr>";
                

                                                echo "<tr><th>VINO</th>
                                <th></th>
				</tr>";

                    $bebida = $_SESSION['bebidas'];
                    $cantidad = $_SESSION['cantidad'];

                    
                        $bebidas = Bebida::getById($bebida);
                        echo "<tr><th>Nombre</th><td>".$bebidas ->getValueEncoded("nombre")."</td></tr>";
                        echo "<tr><th>Precio</th><td>".$bebidas -> getValueEncoded("precio")."€</td></tr>";
                        echo "<tr><th>Cantidad</th><td>".$cantidad."</td></tr>";
                        $_SESSION['precio'] += $bebidas->getValueEncoded("precio") * $cantidad;
                    
                    
                    echo "<tr><th>TOTAL</th>
                                <th></th>
				</tr>";
                    echo "<tr><th>".$_SESSION['precio']."€</th><td></td></tr>";
                ?>
                                </tbody>
                </table>
               <input type="submit" value="enviar" name="insertar">
            </form>
            <?php
                }
                function insertar(){
                    $pedido = new Pedidos( array(
                        "id_cliente" => $_SESSION['cliente']->getValue( 'id_cliente' ),
                        "fecha" => $_SESSION['fecha'],
                        "hora" => $_SESSION['hora'],
                        "cp" => $_SESSION['cp'],
                        "direccion" => $_SESSION['direccion'], 
                        "comensales" => $_SESSION['comensales'] 
                   ));
                
                    $pedido->insert();

                if ( !$pedido = Pedidos::getByFecha( $_SESSION['fecha'] ) ) {
                echo "Error desconocido, pongase en contacto con el Administrador";
                } 

                $pedidos_menu = new Pedidos_menu ( array(
                        "id_menu" => $_SESSION['id_menu'],
                        "id_pedido" => $pedido -> getValueEncoded("id_pedido"),
                        "id_decoracion" => $_SESSION['id_decoracion']
                        ));
                    $pedidos_menu -> insert();


                    $N = count($_SESSION['bebidas']);
                    $bebida = $_SESSION['bebidas'];
                    for ($i=0;$i<$N;$i++){
                        $pedido_bebida = new Pedidos_bebidas (array(
                           "id_bebida" => $bebida[$i],
                                "id_pedido" => $pedido -> getValueEncoded("id_pedido"),
                                "cantidad" => $_SESSION['cantidad']
                            ));
                        $pedido_bebida -> insert();
                    }
                    
                    $factura = new Factura( array (
                        "id_pedido" => $pedido -> getValueEncoded("id_pedido"),
                        "precio" => $_SESSION['precio']
                    ));
                    $factura -> insert();
                        echo "Insertado correctamente";
                        echo "<a href='facturas.php' target='_blank'>Ver Factura</a>";
                }
?>
	</div>
</div>           
</body>
</html>
