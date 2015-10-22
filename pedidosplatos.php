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
                    <h3 class="text-center">
				Realizar Pedido Menú
                    </h3>
                     <?php
                                if ( isset( $_POST["action"] ) and $_POST["action"] == "register" ) {
                                    processForm();
                                } else {
                                    displayForm( array(), array(), new Pedidos( array() ) );
                                }

                                function errors($error){
                                    echo $error;
                                }

                                function displayForm( $errorMessages, $missingFields, $pedidos ) {
                                    if ( $errorMessages ) {
                                        foreach ( $errorMessages as $errorMessage ) {
                                            echo $errorMessage;
                                        }
                                    }
                            ?>
                    <form role="form" action="pedidosplatos.php" method="post">
                            <input type="hidden" name="action" value="register" />
				<div class="form-group">
					 <label for="fecha"<?php validateField("fecha", $missingFields)?>></label>
                                         
                                        <div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="16" type="text" value="" name="fecha" readonly>
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
				</div>
                            
                            <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
                            <script type="text/javascript" src="js/bootstrap.min.js"></script>
                            <script type="text/javascript" src="bootstrap-datetimepicker.js" charset="UTF-8"></script>
                            <script type="text/javascript" src="locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
                            <?php
                                            $dates = "";
                list($fechas) = Pedidos::getFecha();
                foreach ( $fechas as $fecha ) {
                        $dates .= "'".$fecha->getValueEncoded("fecha")."',";
                    }
                    $dates = substr($dates,0,-1);
                    
                    ?>
                            
                            <script type="text/javascript">
                                var array = [<?php echo $dates; ?>];
                                $('.form_date').datetimepicker({
                                language:  'es',
                                startDate: "+1d",
                                        autoclose: 1,
                                        todayHighlight: 1,
                                        startView: 2,
                                        minView: 2,
                                        forceParse: 0,
                                        beforeShowDay: function(date){
                                            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
                                            return [ array.indexOf(string) == -1 ]
                                        }
                                });
                               
                        </script>  
                        <br>
				<div class="form-group">
                                        <label for="hora">Hora: </label>
                                            <select name="hora">
                                                <?php 
                                                    for($i=0;$i<=23;$i++){
                                                        if($i<10){
                                                            echo "<option value='0".$i."'>0".$i."</option>";
                                                        } else {
                                                            echo "<option value=".$i.">".$i."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>

                                        <label for="minuto"></label>
                                            <select name="minuto">
                                                <?php 
                                                    for($i=0;$i<=59;$i++){
                                                        if($i<10){
                                                            echo "<option value='0".$i."'>0".$i."</option>";
                                                        } else {
                                                            echo "<option value=".$i.">".$i."</option>";
                                                        }
                                                    }
                                                ?>
                                            </select>				
                                </div>
                            <div class="form-group">
                                <label for="localidad">Localidad: <select name="localidad"></label>
                                <?php
                                    list($localidades) = Localidad::getLocalidad();
                                    foreach ( $localidades as $localidad ) {
                                        echo "<option value='".$localidad->getValueEncoded("cp")."'>".$localidad->getValueEncoded("nombre")."</option>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
					 <label for="direccion" <?php validateField("direccion", $missingFields)?>>Dirección: </label>
                                         <input class="form-control" type="text" name="direccion" /> 
                            </div>
                            <div class="form-group">
                                <label for="comensales">Comensales:</label>
                                <select name="comensales">
                                    <?php 
                                        for($i=1;$i<=12;$i++){
                                            echo "<option value=".$i.">".$i."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
    
     <?php
                displayPageFooter();
    }
    function processForm() {
        $requiredFields = array( "fecha", "direccion");
        $missingFields = array();
        $errorMessages = array();
        $pedidos = new Pedidos( array( "fecha" => isset( $_POST["fecha"] ) ? preg_match
                                     ('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $_POST["fecha"] ) : "",
                    "direccion" => isset( $_POST["direccion"] ) ? preg_replace
                                        ( "/[^ \’\,\.\-a-zA-Z0-9]/", "", $_POST["direccion"] ) : ""
        ) );

        foreach ( $requiredFields as $requiredField ) {
            if ( !$pedidos -> getValue( $requiredField ) ) {
                $missingFields[] = $requiredField;
            }
        }

        if ( $missingFields ) {
            $errorMessages[] = ' <p class="error" >Debes introducir una fecha y una direccion </p> ';
        }

        if ( Pedidos::getByFecha($_POST['fecha']) ) {
            $errorMessages[] = '<p class="error">Esta fecha ya ha sido seleccionada.</p>';
        } 
        
        
        if ( $errorMessages ) {
            displayForm( $errorMessages, $missingFields, $pedidos );
        } else {
            $_SESSION['fecha'] = $_POST["fecha"];
            $_SESSION['hora'] = $_POST['hora'].":".$_POST['minuto'];
            $_SESSION['cp'] = $_POST['localidad'];
            $_SESSION['direccion'] = $_POST['direccion'];
            $_SESSION['comensales'] = $_POST['comensales'];
            
            
            header('Location: pedidosplatos-platos.php');
    }
}
            ?>
</div>
</body>
</html>
