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
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Tu Chef A Casa</a>
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
                                                require_once("classes/Menu.class.php");
                                                session_start();
                                                
                                                if (isset($_SESSION["cliente"])){
                                                    echo "<li><a href='logout.php'>Bienvenido ".$_SESSION["cliente"]->getValue( "nombre" )."</a></li>";
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
                    <br />
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
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h3 class="text-center">
				¡Bienvenido a tuchefacasa.com!
			</h3>
			<div class="row clearfix">
				<div class="col-md-6 column">
					<h3>
						Pidete un menú
					</h3>
					<p>
                                            Disfrute de una serie de menús degustación. Hay diferentes precios que se pueden ajustar a tu bolsillo, desde mas economicos a mas caros y además podrás escoger una decoracción para la mesa de vustra casa para poder disfrutar mejor de la velada con el chef en vuestro hogar.<small><a href="pedidosmenu.php">¡Realicé su pedido ahora mismo!</a></small>
					</p>
				</div>
				<div class="col-md-6 column">
					<h3>
						Pidete un menú personalizado
					</h3>
					<p>
                                            Tambíen puedes crear tu propio con los platos que mas te gusten y poderlos disfrutar en vuestro hogar<small><a href="pedidosplatos.php">¡Realice su pedido ahora mismo!</a></small>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
