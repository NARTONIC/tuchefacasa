<?php
require_once( "common.inc.php" );
session_start();
$_SESSION["cliente"] = "";

session_destroy();

header('Location: index.php');
?>
