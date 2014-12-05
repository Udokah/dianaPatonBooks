<?php
session_start() ;

/**
 * A simple PHP MVC skeleton
 */

// load application config (error reporting etc.)
require 'application/config/config.php';

// load application class
function __autoload($class) { 
	$lib = 'application/libs/' . $class . '.php' ;
	$model = 'application/models/' . $class . '.php' ;
	if(file_exists($lib)){
		include_once($lib) ;
	}else if(file_exists($model)){
		include_once($model) ;
	}
} 

$lib = new Library () ;

// start the application
$app = new Application();



