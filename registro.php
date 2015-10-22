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
                                                require_once("classes/Menu.class.php");
                                                session_start();
                                                
                                                if (isset($_SESSION["cliente"])){
                                                    echo "<li><a href='#'>Bienvenido ".$_SESSION["cliente"]->getValue( "nombre" )."</a></li>";
                                                    echo "<li><a href='mispedidos.php'>Area Privada</a></li>";
                                                } else {
                                            ?>
						<li>
							<a href="login.php">Login</a>
						</li>
                                                <li class="active">
                                                    <a href="registro.php">Registrarse</a>
						</li>
                                                <?php
                                                }
                                                ?>
					</ul>
				</div>
			</nav>
                    <br /><br /><br />
			<div class="carousel slide" id="carousel-935538">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-935538">
					</li>
					<li data-slide-to="1" data-target="#carousel-935538" class="active">
					</li>
					<li data-slide-to="2" data-target="#carousel-935538">
					</li>
				</ol>
		</div>
	</div>
            <br>
    <div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
				<div class="form-group">
<?php
      require_once( "common.inc.php" );
      if ( isset( $_POST["action"] ) and $_POST["action"] == "register" ) {
        processForm();
      } else {
        displayForm( array(), array(), new Cliente( array() ) );
}
      function displayForm( $errorMessages, $missingFields, $cliente ) {
        displayPageHeader( "<h2 class='text-center'>Area de Registro</h2>" );
        if ( $errorMessages ) {    
            foreach ( $errorMessages as $errorMessage ) {
                echo $errorMessage;
            }
        } else {
?>
    <h3 class="text-center">Bienvenido a Tu Chef A Casa</h3>
    <p class="text-center">Para registrarte, por favor, rellena todos los campos</p>
    <p class="text-center">Todos los que estan marcados con (*) son obligatorios</p>
<?php } ?>
    <form class="form-horizontal" role="form" action="registro.php" method="post">
        <div class="form-group">
            <input type="hidden" name="action" value="register" />
            <label for="email"<?php validateField( "email", $missingFields ) ?> class="col-sm-2 control-label">E-mail: *</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" value="
                        <?php echo $cliente->getValueEncoded( "email" ) ?>" />
                </div>
            </div>
            
        <div class="form-group">
            <label for="pass" class="col-sm-2 control-label">Contraseña *</label>
            <div class="col-sm-10">    
                <input type="password" class="form-control" name="pass" id="pass" value="" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="pass2"<?php if ( $missingFields )?> class="col-sm-2 control-label">Re-escribe contraseña *</label>
            <div class="col-sm-10">  
                <input type="password" class="form-control" name="pass2" id="pass2" value="" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="nombre"<?php validateField( "nombre", $missingFields ) ?> class="col-sm-2 control-label">Nombre *</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name="nombre" id="nombre" value="
                    <?php echo $cliente->getValueEncoded( "nombre" ) ?>" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="apellidos"<?php validateField( "apellidos", $missingFields ) ?> class="col-sm-2 control-label">Apellidos *</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="
                    <?php echo $cliente->getValueEncoded( "apellidos" ) ?>" />
            </div>
        </div>
        
        <div class="form-group">
            <label for="telefono"<?php validateField( "telefono", $missingFields ) ?> class="col-sm-2 control-label">Telefono *</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" name="telefono" id="telefono" value="
                    <?php echo $cliente->getValueEncoded( "telefono" ) ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submitButton"  id="submitButton" class="btn btn-default" value="Send Details">Enviar</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">  
                <button type="reset" name="resetButton" id="resetButton" value="Reset Form" class="btn btn-default">Reset</button>
            </div>
        </div>    
    </form>
<?php
  displayPageFooter();
}
function processForm() {
  $requiredFields = array( "email", "pass", "nombre","apellidos", "telefono");
  $missingFields = array();
  $errorMessages = array();
  $cliente = new Cliente( array(
    "email" => isset( $_POST["email"] ) ? preg_replace("/[^ \@\.\-\_a-zA-Z0-9]/", "", $_POST["email"] ) : "",
      
    "pass" => ( isset( $_POST["pass"] ) and isset($_POST["pass2"] ) and $_POST["pass"] == $_POST["pass2"] ) ?
    preg_replace( "/[^ \-\_a-zA-Z0-9]/", "", $_POST["pass"] ) : "",
    
    "nombre" => isset( $_POST["nombre"] ) ? preg_replace ( "/[^ \'\-a-zA-Z0-9]/", "", $_POST["nombre"] ) : "",
    
    "apellidos" => isset( $_POST["apellidos"] ) ? preg_replace ( "/[^ \'\-a-zA-Z0-9]/", "", $_POST["apellidos"] ) : "",
    
    "telefono" => isset($_POST["telefono"]) ? preg_replace ("/[^ \'\-0-9]/", "", $_POST["telefono"]) : ""
      
  ) );
  foreach ( $requiredFields as $requiredField ) {      
      if ( !$cliente->getValue( $requiredField ) ) {
         $missingFields[] = $requiredField;
} }
     if ( $missingFields ) {
       $errorMessages[] = '<p>Algunos campos no han sido rellenados</p>';
}
     if ( !isset( $_POST["pass"] ) or !isset( $_POST["pass2"] ) or
   !$_POST["pass"] or !$_POST["pass2"] or ( $_POST["pass"] != $_POST["pass2"] ) ) {
       $errorMessages[] = '<p>Introduce correctamente ambas contraseñas(Deben ser la misma)</p>';
}

     if ( Cliente::getByEmail( $cliente->getValue( "email" ) ) ) {
       $errorMessages[] = '<p class="error">Este email ya existe.</p>';
}
     if ( $errorMessages ) {
       displayForm( $errorMessages, $missingFields, $cliente );
     } else {
       $cliente->insert();
       displayThanks();
} }
   function displayThanks() {
     displayPageHeader( "¡GRacias por registrarte!" );
   ?>
       <p>¡Gracias!. Ahora ya puedes realizar pedidos.</p>
   <?php
     displayPageFooter();
} ?>
	</div>
</div>

</body>
</html>