<?php
       
	try{
		$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
		$base->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		
	}catch(Exception $e){
		die("Error line: " . $e->getLine());//acaba con la conexion
	}
	   
?>