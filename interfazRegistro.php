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
			require("php/Registrar.php");
			registrarUsuario();
		
		}

		if(isset($_POST['aceptarRegEmp'])){
			require("php/Registrar.php");
			registrarEmpresa();
		
		}
	?>

		<div class="siteContainer"> 
			<h1 class="h1"> <a href="index.html" style="text-decoration: none; color: #313131;"> TRABAJOSO </a> </h1>
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
					<form id="formRegEmp" action="<?php echo($_SERVER['PHP_SELF']);?>" method="post" >
						<input type="text" name="nombreEmp" placeholder="Nombre De La Empresa" id="empNameBox" required pattern=".{4,60}" title="Debe tener 4 caracteres como mínimo y 60 como máximo."> <br>
						<label for="empNameBox" id="empNameBoxLabel"> Nombre De La Empresa </label> <br>
						<input type="email" name="email" placeholder="Email" id="empEmailBox" required pattern=".{4,50}" title="Debe tener 4 caracteres como mínimo y 50 como máximo."> <br>
						<label for="empEmailBox" id="empEmailBoxLabel"> Email </label> <br>
						<input type="password" name="clave" placeholder="Contraseña" id="empPasswordBox" required pattern="[^' ']{4,20}" title="Debe tener 4 caracteres como mínimo y 20 como máximo. No puede tener espacios."> <br>
						<label for="empPasswordBox" id="empPassBoxLabel"> Contraseña </label>
						<input type="submit" id="aceptarRegEmp" name="aceptarRegEmp" value="Registrarse">
						<select id="listaPaisesEmpresa" name="listaPaisesEmpresa">
							<option value="Argentina"> Argentina </option>
							<option value="Bolivia"> Bolivia </option>
							<option value="Chile"> Chile </option>
							<option value="Colombia"> Colombia </option>
							<option value="Costa Rica"> Costa Rica </option>
							<option value="Cuba"> Cuba </option>
							<option value="Ecuador"> Ecuador </option>
							<option value="El Salvador"> El Salvador </option>
							<option value="Guatemala"> Guatemala </option>
							<option value="Honduras"> Honduras </option>
							<option value="México"> México </option>
							<option value="Nicaragua"> Nicaragua </option>
							<option value="Panamá"> Panamá </option>
							<option value="Paraguay"> Paraguay </option>
							<option value="Perú"> Perú </option>
							<option value="Puerto Rico"> Puerto Rico </option>
							<option value="República Dominicana"> República Dominicana </option>
							<option value="Uruguay"> Uruguay </option>
							<option value="Venezuela"> Venezuela </option>
						</select>
						<label for="listaPaisesEmpresa" id="listaPaisEmpLabel"> País </label>
						<textarea rows="4" name=direccion id="dirEmpresa" required placeholder="Dirección" title="Debe tener 500 como máximo."></textarea> <br>
						<label for="dirEmpresa" id="dirEmpresaLabel"> Dirección </label>
					</form>
				</div>
				<div class="fadingBoxAspirante"> 
					<form id="form_datos" action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
						<input type="text" name="nombre" placeholder="Nombre Completo" id="nameBox" required pattern="[a-zA-ZÀ-ž\s]{4,60}" title="Debe tener 4 caracteres como mínimo y 60 como máximo.&#13;&#10;Solo puede tener letras y espacios."> <br>
						<label for="nameBox" id="nameBoxLabel"> Nombre Completo </label>
						<input type="email" name="email" placeholder="Email" id="emailBox" required pattern=".{4,50}"title="Debe tener 4 caracteres como mínimo y 50 como máximo."> <br>
						<label for="emailBox" id="emailBoxLabel" class="email"> Email </label>
						<input type="password" name="clave" placeholder="Contraseña" id="passwordBox" required pattern="[^' ']{4,20}" title="Debe tener 4 caracteres como mínimo y 20 como máximo. No puede tener espacios."> <br>
						<label for="passwordBox" id="passBoxLabel"> Contraseña </label>
						<input type="date" name="fecha" value="2000-12-31"  id="dateBox" required> <br>
						<label for="dateBox" id="dateBoxLabel"> Fecha De <br> Nacimiento </label>
						<input type="radio" name="sexo" id="radioMasc" value="Masculino" required>
						<label for="radioMasc" id="radioMascLabel"> Masculino </label>
						<input type="radio" name="sexo" id="radioFem" value="Femenino">
						<label for="radioFem" id="radioFemLabel"> Femenino </label>
						<label id="sexoLabel"> Sexo: </label>
						<input type="submit" id="aceptarRegAsp" name="aceptarRegAsp" value="Registrarse"> 
						<select id="listaPaisesAspirante" name="listaPaisesAspirante">
							<option value="Argentina"> Argentina </option>
							<option value="Bolivia"> Bolivia </option>
							<option value="Chile"> Chile </option>
							<option value="Colombia"> Colombia </option>
							<option value="Costa Rica"> Costa Rica </option>
							<option value="Cuba"> Cuba </option>
							<option value="Ecuador"> Ecuador </option>
							<option value="El Salvador"> El Salvador </option>
							<option value="Guatemala"> Guatemala </option>
							<option value="Honduras"> Honduras </option>
							<option value="México"> México </option>
							<option value="Nicaragua"> Nicaragua </option>
							<option value="Panamá"> Panamá </option>
							<option value="Paraguay"> Paraguay </option>
							<option value="Perú"> Perú </option>
							<option value="Puerto Rico"> Puerto Rico </option>
							<option value="República Dominicana"> República Dominicana </option>
							<option value="Uruguay"> Uruguay </option>
							<option value="Venezuela"> Venezuela </option>
						</select>
						<label for="listaPaisesAspirante" id="listaPaisAspLabel"> País </label>
					</form>
				</div>
				<button id="regEmpresa"> Registrarse Como Empresa </button>
				<button id="regAspirante"> Registrarse Como Aspirante </button>
			</div>
		</div>
	</body>
	<script src="js/registro/scriptsRegistro.js"> </script>
	<script src="js/registro/validarDatosRegistro.js"> </script>
</html>