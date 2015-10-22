<?php
      require_once ("DataObject.class.php");
      class Localidad extends DataObject {
        protected $data = array(
          "cp" => "",
          "nombre" => ""
);
  
public static function getLocalidad() {
          $conn = parent::connect();
          $sql = "SELECT * FROM localidad;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $localidades = array();
         foreach ( $st->fetchAll() as $row ) {
           $localidades[] = new Localidad( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($localidades);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

public static function getByCP($cp) {
          $conn = parent::connect();
          $sql = "SELECT * FROM localidad  WHERE cp = :cp";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":cp", $cp, PDO::PARAM_STR );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Localidad( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} }

       }
      
?>