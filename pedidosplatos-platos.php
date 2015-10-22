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
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
  <link href="bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>  
        <script src="funciones.js"></script>
           <?php
                require_once("common.inc.php");
                require_once("config.php");
                require_once("classes/Localidad.class.php");
                require_once("classes/Pedidos.class.php");
               ?>

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
                                            require_once("classes/Plato.class.php");
                                            require_once("config.php");
                
                                            session_start();
                                                
                                                if (isset($_SESSION["cliente"])){
                                                    echo "<li><a href='#'>Bienvenido ".$_SESSION["cliente"]->getValue( "nombre" )."</a></li>";
                                                    echo "<li><a href='mispedidos.php'>Area Privada</a></li>";
                                                } else {
                                                    header('Location: /tuchefacasa/login.php');
                                                    echo "Si tienes una cuenta, <a href='login.php'> conectate</a> o <a href='registro.php'>registrate</a>";
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
	<div class="row clearfix">
		<div class="col-md-12 column">
	<div id="main">
            <div id="platos">
                <?php
                if(isset($_POST['confirm'])){
                    bebidas();
                } else {
            ?>
                <form action="pedidosplatos-platos.php" method="post" name="check">
                    <table class="table table-hover">
				<thead>
					<tr>
						<th>
							
						</th>
						<th>
							PLATO
						</th>
						<th>
							PRECIO
						</th>
					</tr>
				</thead>
				<tbody>
            <?php
                    list($platos) = Plato::getByTipo("carne");
                    foreach ( $platos as $plato ) {
                            echo "<tr><td><input type='checkbox' id='platos' onclick='validar();' name='platos[]' value='".$plato->getValueEncoded("id_plato").
                                    "'></td><td>".$plato->getValueEncoded("nombre")."</td><td>".$plato->getValueEncoded("precio")."€</td>";
                            echo "</tr>";
                    }
                
               ?>
            <?php
                    list($platos) = Plato::getByTipo("entra");
                    foreach ( $platos as $plato ) {
                            echo "<tr><td><input type='checkbox' id='platos' onclick='validar();' name='platos[]' value='".$plato->getValueEncoded("id_plato").
                                    "'></td><td>".$plato->getValueEncoded("nombre")."</td><td>".$plato->getValueEncoded("precio")."€</td>";
                            echo "</tr>";
                    }
                
               ?>
            <?php
                    list($platos) = Plato::getByTipo("pesca");
                    foreach ( $platos as $plato ) {
                            echo "<tr><td><input type='checkbox' id='platos' onclick='validar();' name='platos[]' value='".$plato->getValueEncoded("id_plato").
                                    "'></td><td>".$plato->getValueEncoded("nombre")."</td><td>".$plato->getValueEncoded("precio")."€</td>";
                            echo "</tr>";
                    }
                
               ?>
            <?php
                    list($platos) = Plato::getByTipo("postr");
                    foreach ( $platos as $plato ) {
                            echo "<tr><td><input type='checkbox' id='platos' onclick='validar();' name='platos[]' value='".$plato->getValueEncoded("id_plato").
                                    "'></td><td>".$plato->getValueEncoded("nombre")."</td><td>".$plato->getValueEncoded("precio")."€</td>";
                            echo "</tr>";
                    }
                
               ?>
                                    </tbody>
			</table>
            		<button type="submit" id="boton" class="btn btn-default" name="confirm" disabled>Submit</button>

            </form>  
            </div>
             <?php
                }
                function bebidas(){
                    $_SESSION['platos'] = $_POST['platos'];
                    header('Location: pedidosplatos-bebidas.php'); 
                }
                ?>
	</div>
</div>
        </div>
</div>
</body>
</html>
