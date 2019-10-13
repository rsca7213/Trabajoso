<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title lang="es"> Trabajoso | Registrarse </title>
    	<link rel="icon" href="img/favicon.png">
    	<link rel="stylesheet" href="css/registro/registroStyle.css">

	</head>

	<body>

	<?php
		if(isset($_POST['aceptarRegAsp'])){
			require("registrarAspirante.php");
		
		}

		if(isset($_POST['aceptarRegEmp'])){
			require("registrarEmpresa.php");
		
		}
	?>

		<div class="siteContainer"> 
			<h1 class="h1"> <a href="login.html" style="text-decoration: none; color: #313131;"> TRABAJOSO </a> </h1>
			<h3 class="h3"> ¿Necesitas empleo? <br> ¡Deja que nuestro oso lo consiga por ti! 	</h3>
			<div class="bearContainer"> 
				<img src="img/registroimg/bear.png" class="imagen">
			</div> 
			<div class="boxContainer"> 
				<div class="boxBannerContainer">
					<h2> &ensp; Registro </h2>
				</div>
				<div class="fadingBoxDefault">
					<p id="selOpcion"> Seleccione <br> una opción... </p>
					<div id="imagenSelOp">  <img src="img/registroimg/imagenSelOp.png" class="imagen"> </div>
				</div>
				<div class="fadingBoxEmpresa">
					<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
						<input type="text" name="nombreEmp" placeholder="Nombre De La Empresa" id="empNameBox" required> <br>
						<label for="empNameBox" id="empNameBoxLabel"> Nombre De La Empresa </label> <br>
						<input type="text" name="email" placeholder="Email" id="empEmailBox" required> <br>
						<label for="empEmailBox" id="empEmailBoxLabel"> Email </label> <br>
						<input type="password" name="clave" placeholder="Contraseña" id="empPasswordBox" required> <br>
						<label for="empPasswordBox" id="empPassBoxLabel"> Contraseña </label>
						<input type="submit" id="aceptarRegEmp" name="aceptarRegEmp" value="Registrarse">
					</form>
				</div>
				<div class="fadingBoxAspirante"> 
					<form id="form_datos" action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
						<input type="text" name="nombre" placeholder="Nombre Completo" id="nameBox" required> <br>
						<label for="nameBox" id="nameBoxLabel"> Nombre Completo </label>
						<input type="text" name="email" placeholder="Email" id="emailBox" required> <br>
						<label for="emailBox" id="emailBoxLabel" class="email"> Email </label>
						<input type="password" name="clave" placeholder="Contraseña" id="passwordBox" required> <br>
						<label for="passwordBox" id="passBoxLabel"> Contraseña </label>
						<input type="date" name="fecha" value="2000-12-31"  id="dateBox" required> <br>
						<label for="dateBox" id="dateBoxLabel"> Fecha De <br> Nacimiento </label>
						<input type="radio" name="sexo" id="radioMasc" value="Masculino" required>
						<label for="radioMasc" id="radioMascLabel"> Masculino </label>
						<input type="radio" name="sexo" id="radioFem" value="Femenino">
						<label for="radioFem" id="radioFemLabel"> Femenino </label>
						<label id="sexoLabel"> Sexo: </label>
						<input type="submit" id="aceptarRegAsp" name="aceptarRegAsp" value="Registrarse"> 
					</form>
				</div>
				<button id="regEmpresa"> Registrarse Como Empresa </button>
				<button id="regAspirante"> Registrarse Como Aspirante </button>
			</div>
		</div>
	</body>
	<script src="js/registro/fadingBoxScripts.js"> </script>
</html>