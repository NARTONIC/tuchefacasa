<!DOCTYPE html>
<html lang="es">
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
						<li>
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
                                                require_once("config.php");
                                                require_once("classes/Pedidos.class.php");
                                                session_start();
                                                
                                                if (isset($_SESSION["cliente"])){
                                                    echo "<li><a href='#'>Bienvenido ".$_SESSION["cliente"]->getValue( "nombre" )."</a></li>";
                                                    echo "<li><a href='mispedidos.php'>Area Privada</a></li>";
                                                } else {
                                            ?>
						<li>
							<a href="login.php">Login</a>
						</li>
                                                <li>
                                                    <a href="registro.php">Registrarse</a>
						</li>
                                                <?php
                                                }
                                                ?>
					</ul>
				</div>
			</nav>
                    
			
		</div>
	</div>
    <br />
    <br />
    <br />
	<div class="row clearfix">
		<div class="col-md-12 column">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>
							ID PEDIDO
						</th>
						<th>
							FECHA
						</th>
						<th>
							HORA
						</th>
						<th>
							CP
						</th>
                                                <th>
							DIRECCIÓN
						</th>
                                                <th>
							COMENSALES
						</th>
					</tr>
				</thead>
				<tbody>
                                    <?php
                                        
                                        $id_cliente = $_SESSION["cliente"]->getValue( "id_cliente" );
                                        list($pedidos) = Pedidos::getByCliente($id_cliente);
                                        foreach ( $pedidos as $pedido ) {
                                            echo "<tr>";
                                                echo "<td><a href='facturas/".$pedido->getValueEncoded("id_pedido").".pdf'>Ver Pedido</a></td>";           
                                                echo "<td>".$pedido->getValueEncoded("fecha")."</td>";
                                                echo "<td>".$pedido->getValueEncoded("hora")."</td>";
                                                echo "<td>".$pedido->getValueEncoded("cp")."</td>";
                                                echo "<td>".$pedido->getValueEncoded("direccion")."</td>";
                                                echo "<td>".$pedido->getValueEncoded("comensales")."</td>";
                                            echo "</tr>";
                                        
                                    }
                                    ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>
