<?php
      require_once ("DataObject.class.php");
      class Tipos extends DataObject {
        protected $data = array(
          "id_tipo" => "",
          "nombre" => ""
);
  
public static function getTipos() {
          $conn = parent::connect();
          $sql = "SELECT * FROM tipos;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $tipos = array();
         foreach ( $st->fetchAll() as $row ) {
           $tipos[] = new Tipos( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($tipos);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

public static function getBebidas() {
          $conn = parent::connect();
          $sql = "SELECT * FROM tipos_bebidas;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $tipos = array();
         foreach ( $st->fetchAll() as $row ) {
           $tipos[] = new Tipo( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($tipos);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

       }
      
?>