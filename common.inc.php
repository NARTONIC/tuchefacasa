<?php

      require_once( "config.php" );
      require_once( "classes/Cliente.class.php" );
      require_once( "classes/Pedidos.class.php" );
      require_once( "classes/Pedidos_platos.class.php");
      require_once( "classes/Pedidos_bebidas.class.php");
      require_once( "classes/Pedidos_menu.class.php");

function validateField( $fieldName, $missingFields ) {
        if ( in_array( $fieldName, $missingFields ) ) {
          echo ' class="error"';
        }
}
      function setChecked( DataObject $obj, $fieldName, $fieldValue ) {
        if ( $obj->getValue( $fieldName ) == $fieldValue ) {
          echo ' checked="checked"';
        }
}
      function setSelected( DataObject $obj, $fieldName, $fieldValue ) {
        if ( $obj->getValue( $fieldName ) == $fieldValue ) {
          echo ' selected="selected"';
        }
}

function checkLogin() {
        session_start();
        if ( !$_SESSION["cliente"] or !$_SESSION["cliente"] = Cliente::getCliente
      ( $_SESSION["cliente"]->getValue( "id_cliente" ) ) ) {
          $_SESSION["cliente"] = "";
          header( "Location: login.php" );
          exit;
        } else {
          
        }
}
      function displayPageHeader( $pageTitle ) {
      ?>
      <!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Strict//EN”
       “http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd”>
      <html xmlns=”http://www.w3.org/1999/xhtml” xml:lang=”en” lang=”en”>
        <head>
          <title><?php echo $pageTitle?></title>

        </head>
<body>
          <h1><?php echo $pageTitle?></h1>
      <?php
}
      function displayPageFooter() {
      ?>
        </body>
      </html>
<?php }
?>
￼