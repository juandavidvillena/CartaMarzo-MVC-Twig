<?php

	$con = $_GET["con"]??"usuario" ;
    $ope = $_GET["ope"]??"index" ;
    
	// creamos el nombre completo del controlador
	$nom = "{$con}Controller" ;

	// importar el controlador necesario
	require_once "controlador/$nom.php" ;

	// instanciamos el controlador
	$controller = new $nom() ;

	// invocamos la operación a realizar
	$controller->$ope() ;

