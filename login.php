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
						<li class="active">
                                                    <a href="login.php">Login</a>
						</li>
                                                <li>
                                                    <a href="registro.php">Registrarse</a>
						</li>
					</ul>
				</div>
				
			</nav>
                    <br>
    <div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
				<div class="form-group">
<?php
      require_once( "common.inc.php" );
      session_start();
      
      if ( isset( $_POST["action"] ) and $_POST["action"] == "login" ) {
        processForm();
      } else {
        displayForm( array(), array(), new Cliente( array() ) );
}
      function displayForm( $errorMessages, $missingFields, $cliente ) {
        displayPageHeader( "Logueate para poder realizar pedidos", true );
        if ( $errorMessages ) {
          foreach ( $errorMessages as $errorMessage ) {
            echo $errorMessage;
          }
} else { ?>
<p>Para acceder a algunas paginas debes estar registrado. Por favor, logueate o <a href="registro.php">registrate</a></p>
      <?php } ?>
        <form class="form-horizontal" role="form" action="login.php" method="post">
            <div class="form-group">
                <input type="hidden" name="action" value="login" />
                <label for="email"<?php validateField( "email", $missingFields ) ?> class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $cliente->getValueEncoded( "email" ) ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="pass" <?php if ( $missingFields ) ?> class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
			<input type="password" class="form-control" id="pass" name="pass"/>
                    </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
			<label><input type="checkbox"> Remember me</label>
                    </div>
		</div>
            </div>
            <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submitButton"  id="submitButton" class="btn btn-default" value="login">Iniciar sesión</button>
		</div>
            </div>
    </form>
        </div>
       </div>
    </div>
 </div>
<?php
  displayPageFooter();
}
function processForm() {
  $requiredFields = array( "email", "pass" );
  $missingFields = array();
  $errorMessages = array();
  $cliente = new Cliente( array(
    "email" => isset( $_POST["email"] ) ? preg_replace( "/[^ \@\.\-\_a-zA-Z0-9]/", "", $_POST["email"] ) : "",
    "pass" => isset( $_POST["pass"] ) ? preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["pass"] ) : "",
  ) );
  foreach ( $requiredFields as $requiredField ) {
    if ( !$cliente->getValue( $requiredField ) ) {
      $missingFields[] = $requiredField;
    }
}
  if ( $missingFields ) {
    $errorMessages[] = '<p>Rellena todos los formularios con los datos correctos</p>';
  } elseif ( !$loggedInCliente = $cliente->authenticate() ) {
    $errorMessages[] = '<p>Lo sentimos, no te encontramos en nuestra base de datos, email o contraseña incorrecta</p>';
}
  if ( $errorMessages ) {
    displayForm( $errorMessages, $missingFields, $cliente );
  } else {
    $_SESSION["cliente"] = $loggedInCliente;
    displayThanks();
} }
function displayThanks() {   
    displayPageHeader( "¡Gracias por iniciar sesión!", true );
   ?>
       <p>Gracias por loguearte. <a href="index.php">Indice</a>.</p>
   <?php
     displayPageFooter();
   }
?>
</body>
</html>