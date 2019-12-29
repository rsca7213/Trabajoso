<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title lang="es"> Trabajoso | Iniciar Sesión </title>
    	<link rel="icon" href="img/favicon.png">
    	<link rel="stylesheet" href="css/login/loginStyle.css"> 
    </head>

    <body>

        <?php
        if(isset($_POST['InitBtn'])){
            require("php/comprobarLogin.php");
        
        }
		?>

    	<div class="siteContainer"> 
    		<div class="siteNameContainer"> 
    			<h2 class="h2"> <a href="index.html" style="text-decoration: none; color: #313131;"> TRABAJOSO </a> </h1>
    		</div>
    		<div class="siteSloganContainer"> 
    			<h3 class="h3"> ¿Necesitas empleo? <br> ¡Deja que nuestro oso lo consiga por ti!</h3>
    		</div>
    		<div class="boxesContainer"> 
    			<img src="img/loginimg/boxes.png" class="imagen">
    		</div>
    		<div class="toploginContainer"> 
    			<img src="img/loginimg/bear.png" class="imagen">
    		</div>
    		<div class="loginContainer">
    			<div class="headerContainer"> 
					<h1 class="h1"> &ensp; Iniciar Sesión </h1>
    			</div>
    			<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post"> 
    				<input type="email" name="email" placeholder="Email" id="input1" required pattern=".{4,50}" title="Debe tener 4 caracteres como mínimo y 50 como máximo."> <br>
    				<input type="password" name="clave" placeholder="Contraseña" id="input2" required pattern="[^' ']{4,20}" title="Debe tener 4 caracteres como mínimo y 20 como máximo. No puede tener espacios."> <br>
    				<input type="submit" id="InitBtn" name="InitBtn" value="Iniciar Sesión"> <br>
    			</form>
    			<a href="interfazRegistro.php"> <button id="RegBtn" href="interfazRegistro.php"> Registrarse </button> </a>
    			<!--<a href="login.html"> <button id="InitBtn" href="login.html"> Iniciar Sesión </button> </a>-->
    		</div>
    	</div>
    </body>
</html>