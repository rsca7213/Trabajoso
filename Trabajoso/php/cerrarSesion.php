<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Documento</title>

	</head>

	<body>
		<?php
			
			session_start();// hay que inscribir esta instruccion siempre para cerrar la sesion
			session_destroy();
			
			header("Location:../interfazLogin.php");
			echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			
		?>


	</body>


</html>