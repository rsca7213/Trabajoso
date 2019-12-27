<!DOCTYPE html>

<html lang="es">
	<head> 
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    	<title lang="es"> Trabajoso | Menú Principal de Empresa </title>
    	<link rel="icon" href="img/favicon.png">
    	<link rel="stylesheet" href="css/menuEmp/menuEmpresaStyle.css">
    	<link rel="stylesheet" href="css/menuEmp/perfilEmpresaStyle.css">
    	<link rel="stylesheet" href="css/menuEmp/formulariosEmpresaStyle.css">
    	<link rel="stylesheet" href="css/menuEmp/emparejamientosMenuEmpresaStyle.css">
	</head>

	<body> 

		<?php
			
			session_Start();

			include("php/conexion.php");
			$registros=$base->query("SELECT * FROM usuarios2 where id='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);



			$formularios=$base->query("SELECT * FROM formulariosempresas where idEmpresa='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);
			
			if(!isset($_SESSION["usuario"])){
				
				header("Location:interfazLogin.php");
			}

			else{
				if($_SESSION["perfil"]=='empresa'){
				}
				else{
					header("Location:php/cerrarSesion.php");
				}
				
			}

			if(isset($_POST['aceptarEditar'])){
				require("php/actualizarPerfil.php");
				actualizarPerfilEmpresa();
				header("Refresh:0");
			}

			if(isset($_POST['aceptarForm'])){
				require("php/actualizarFormulario.php");
				actualizarFormularioEmpresa();
				header("Refresh:0");
			}


			//para los emparejamientos	
			$emp=$base->query("SELECT * FROM formulariosempresas where idEmpresa='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);
			$estudiosBuscados=$emp[0]->nivelEstudios;
					$profesionBuscada=$emp[0]->profesion;
					$otraProfesionBuscada=$emp[0]->otraProfesion;
					$edadBuscada=$emp[0]->edadBuscada;
					$detalles=$emp[0]->detalles;
			$matchAsp=$base->query("SELECT * FROM formulariosaspirantes where nivelEstudios='" . $estudiosBuscados . "' and profesion='" .$profesionBuscada. "' and otraProfesion='" .$otraProfesionBuscada. "'")->fetchAll(PDO::FETCH_OBJ);

	

			
		?>


		<div class="siteContainer"> 
			<div class="mainBoxContainer">
				<div class="mainBoxDefault"> 
					<label id="defaultLabel"> ¡Bienvenido! <br><br> Menú Principal <br> seleccione una opción... </label>
					<img src="img/selectMenuDefault.png" id="flechaDefaultImg">
					<label id="footerLabel"> Copyright © Trabajoso, todos los derechos reservados. </label>
				</div>
				<div class="mainBoxPerfil"> 
					<label id="labelPerfil"> Editar Perfil </label> <br>
					<hr id="perfilLine1">
					<form id="perfilForm" action="<?php echo($_SERVER['PHP_SELF']);?>" method="post">
						<?php foreach($registros as $persona):?>
						<label for="nameBox" id="nameBoxLabel"> Nombre de la Empresa </label>
						<input type="text" name="nameBox" value="<?php echo($persona->nombre);?>" placeholder="Nombre de la Empresa" id="nameBox" required pattern=".{4,60}" title="Debe tener 4 caracteres como mínimo y 60 como máximo."> <br>
						<label for="emailBox" id="emailBoxLabel" class="email"> Email </label>
						<input type="email" name="emailBox" value="<?php echo($persona->correo);?>" placeholder="Email" id="emailBox" required pattern=".{4,50}" title="Debe tener 4 caracteres como mínimo y 50 como máximo."> <br>
						<label for="passwordBox" id="passBoxLabel"> Contraseña </label>
						<input type="password" name="passBox" value="<?php echo($persona->clave);?>" placeholder="Contraseña" id="passBox" required pattern="[^' ']{4,20}" title="Debe tener 4 caracteres como mínimo y 20 como máximo. No puede tener espacios.> <br>
						<label for="listaPaises" id="listaPaisLabel"> País </label>
						<select id="listaPaises" name="listaPaises">
							<option value="Argentina" <?php echo ($persona->pais=='Argentina')?'selected':'' ?>> Argentina </option>
						<option value="Bolivia" <?php echo ($persona->pais=='Bolivia')?'selected':'' ?>> Bolivia </option>
						<option value="Chile" <?php echo ($persona->pais=='Chile')?'selected':'' ?>> Chile </option>
						<option value="Colombia" <?php echo ($persona->pais=='Colombia')?'selected':'' ?>> Colombia </option>
						<option value="Costa Rica" <?php echo ($persona->pais=='Costa Rica')?'selected':'' ?>> Costa Rica </option>
						<option value="Cuba" <?php echo ($persona->pais=='Cuba')?'selected':'' ?>> Cuba </option>
						<option value="Ecuador" <?php echo ($persona->pais=='Ecuador')?'selected':'' ?>> Ecuador </option>
						<option value="El Salvador" <?php echo ($persona->pais=='El Salvador')?'selected':'' ?>> El Salvador </option>
						<option value="Guatemala" <?php echo ($persona->pais=='Guatemala')?'selected':'' ?>> Guatemala </option>
						<option value="Honduras" <?php echo ($persona->pais=='Honduras')?'selected':'' ?>> Honduras </option>
						<option value="México" <?php echo ($persona->pais=='México')?'selected':'' ?>> México </option>
						<option value="Nicaragua" <?php echo ($persona->pais=='Nicaragua')?'selected':'' ?>> Nicaragua </option>
						<option value="Panamá" <?php echo ($persona->pais=='Panamá')?'selected':'' ?>> Panamá </option>
						<option value="Paraguay" <?php echo ($persona->pais=='Paraguay')?'selected':'' ?>> Paraguay </option>
						<option value="Perú" <?php echo ($persona->pais=='Perú')?'selected':'' ?>> Perú </option>
						<option value="Puerto Rico" <?php echo ($persona->pais=='Puerto Rico')?'selected':'' ?>> Puerto Rico </option>
						<option value="República Dominicana" <?php echo ($persona->pais=='República Dominicana')?'selected':'' ?>> República Dominicana </option>
						<option value="Uruguay" <?php echo ($persona->pais=='Uruguay')?'selected':'' ?>> Uruguay </option>
						<option value="Venezuela" <?php echo ($persona->pais=='Venezuela')?'selected':'' ?>> Venezuela </option>
						</select> <br>
						<?php endforeach;?>
						<label for="dirEmpresa" id="dirEmpresaLabel"> Dirección </label>
						<textarea rows="4" name=direccion id="dirEmpresa" required placeholder="Dirección"><?php echo($persona->direccion);?></textarea> <br> 
						<hr id="perfilLine2">
						<input type="submit" id="aceptarEditar" name="aceptarEditar" value="Actualizar Perfil"> 
					</form>
					<button id="volverPerfil"> Regresar Al Menú </button>
					<button onClick="borrarPerfilyFormEmp();" id="borrarPerfil"> Borrar Perfil </button>
				</div>
				<div class="mainBoxForm">
					<label id="EditarFormLabel"> Editar Formulario de Busqueda de Empleados </label>
					<hr id="formLine1">
					<form action="<?php echo($_SERVER['PHP_SELF']);?>" method="post"> 
						<label for ="detallesText" id="detallesTextLabel"> Detalles del Empleo </label>
						<textarea rows="4" name=detallesText id="detallesText" required placeholder="Detalles del Empleo"><?php if($formularios!=null){echo($formularios[0]->detalles);}?></textarea> <br>
						<label for="listaEdad" id="listaEdadLabel"> Edad Buscada </label>
						<select id="listaEdad" name="listaEdad">
							<option <?php if($formularios!=null)echo($formularios[0]->edadBuscada=='18-24')?'selected':''?> value="18-24"> 18 a 24 años </option>
							<option <?php if($formularios!=null)echo($formularios[0]->edadBuscada=='25-34')?'selected':''?> value="25-34"> 25 a 34 años </option>
							<option <?php if($formularios!=null)echo($formularios[0]->edadBuscada=='35-44')?'selected':''?> value="35-44"> 35 a 44 años </option>
							<option <?php if($formularios!=null)echo($formularios[0]->edadBuscada=='45-54')?'selected':''?> value="45-54"> 45 a 54 años </option>
							<option <?php if($formularios!=null)echo($formularios[0]->edadBuscada=='55+')?'selected':''?> value="55+"> 55+ años </option>
						</select> <br>
						<label for="listaEducacion" id="listaEdLabel"> Nivel De Estudios Buscado </label>
						<select id="listaEducacion" name="listaEducacion"> 
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Secundaria')?'selected':''?> value="Secundaria"> Secundaria </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Técnico Superior')?'selected':''?> value="Técnico Superior"> Técnico Superior </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Pregrado Universitario')?'selected':''?> value="Pregrado Universitario"> Pregrado Universitario </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Postgrado Universitario')?'selected':''?> value="Postgrado Universitario"> Postgrado Universitario </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Doctorado')?'selected':''?> value="Doctorado"> Doctorado </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Magister')?'selected':''?> value="Magister"> Magister </option>
						</select> <br>
						<label for="listaProfesiones" id="listaProfLabel"> Profesión Buscada </label>
						<select id="listaProfesiones" name="listaProfesiones"> 
							<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Ingeniero Informático')?'selected':''?> value="Ingeniero Informático"> Ingeniero Informático </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Ingeniero Industrial')?'selected':''?> value="Ingeniero Industrial"> Ingeniero Industrial </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Ingeniero en Telecomunicaciones')?'selected':''?> value="Ingeniero en Telecomunicaciones"> Ingeniero En Telecomunicaciones </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Ingeniero Civil')?'selected':''?> value="Ingeniero Civil"> Ingeniero Civil </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Administrador')?'selected':''?> value="Administrador"> Administrador </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Contador')?'selected':''?> value="Contador"> Contador </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Comunicador Social')?'selected':''?> value="Comunicador Social"> Comunicador Social </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Educador')?'selected':''?> value="Educador"> Educador </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Filósofo')?'selected':''?> value="Filósofo"> Filósofo </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Escritor')?'selected':''?> value="Escritor"> Escritor </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Psicologo')?'selected':''?> value="Psicologo"> Psicologo </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Otro...')?'selected':''?> value="Otro..."> Otro... </option>
						</select> <br>
						<label for="textOtraProf" id="textOtraProfLabel"> Otra Profesión </label>
						<input type="text" id="textOtraProf" name="textOtraProf" value="<?php if($formularios!=null){echo($formularios[0]->otraProfesion);}?>" required pattern="[a-zA-ZÀ-ž\s]{4,40}" title="Debe tener 4 caracteres como mínimo y 40 como máximo.&#13;&#10;Solo puede tener letras y espacios." placeholder="Otra Profesión"> <br>
						<hr id="formLine2">
						<input type="submit" id="aceptarForm" name="aceptarForm" value="Actualizar Formulario">
					</form>
					<button onClick="borrarFormEmp();" id="borrarForm"> Borrar Formulario </button>
					<button id="volverForm"> Regresar Al Menú </button>
				</div>
				<div class="mainBoxEmps"> 
					<label id="tituloEmps"> Emparejamientos con Aspirantes </label>
					<hr id="eLine1">
					<div class="tableDivs">
					    <div class="tableDivsHeader">
							<div class="tablaHeader" id="nameHeader"> Nombre del <br> Aspirante </div>
							<div class="tablaHeader" id="mailHeader"> Email del <br> Aspirante </div>
							<div class="tablaHeader" id="paisHeader"> País del Aspirante </div>
							<div class="tablaHeader" id="edadSexoHeader"> Edad y Sexo <br> del Aspirante </div>
							<div class="tablaHeader" id="expHeader"> Curriculum del <br> Aspirante </div>
						</div>
						<div class="tableContent">

							<?php foreach($matchAsp as $asp):
								$control=0;
								$aspp=$base->query("SELECT * FROM usuarios2 where perfil='aspirante' and id='" .$asp->idAspirante. "'")->fetchAll(PDO::FETCH_OBJ);
								$fnac= $aspp[0]->fecha;
								$fnac= explode("-",$fnac);
								$age=(date("md", date("U", mktime(0, 0, 0, $fnac[1], $fnac[2], $fnac[0]))) > date("md")
   								 ? ((date("Y") - $fnac[0]) - 1)
    							: (date("Y") - $fnac[0]));

								if($edadBuscada=='55+'){
									
									$lookingAge='55';
									if($age>=55){
										$control=1;
									}
									else{
										$control=0;
									}
								}
								else{
    								$lookingAge= explode("-",$edadBuscada);
    								if(($age>=$lookingAge[0])&&($age<=$lookingAge[1])){
    									$control=1;
    								}
    								else{
    									$control=0;
    									
    								}
    							}




							?>

								<?php if($control==1){

								echo('<div class="tableContentRow">');
								echo('<div class="nameContent">');
								echo('<div class="nameText">');
								echo('<p>'.$aspp[0]->nombre.'</p>');
								echo('</div>');
								echo('</div>');
								echo('<div class="mailContent">');
								echo('<div class="mailText">');
								echo('<p>'.$aspp[0]->correo.'</p>');
								echo('</div>');
								echo('</div>');
								echo('<div class="paisContent">');
								echo('<div class="paisText">');
								echo('<p>'.$aspp[0]->pais.'</p>');
								echo('</div>');
								echo('</div>');
								echo('<div class="edadSexoContent">');
								echo('<div class="edadSexoText">');
								echo('<p>'.$age.' ('.$aspp[0]->sexo.')'.'<p>');
								echo('</div>');
								echo('</div>');
								echo('<div class="expContent">');
								echo('<div class="expText">');
								echo('<p>'.$asp->experiencia.'</p>');
								echo('</div>');
								echo('</div>');
								echo('<br>');
								echo('</div>');
							}


							?>
								
   							    
   						 <?php endforeach;?>


						</div>
					</div>
					<div id="upArrow"> <img class="imagen" src="img/menuAsp/arrowup.png" alt="subir"> </div>
					<div id="downArrow"> <img class="imagen" src="img/menuAsp/arrowdown.png" alt="bajar"> </div>
					<hr id="eLine2">
					<button id="volverEmps"> Regresar al Menú </button>
					<button id="add"> Agregar Fila (debug) </div>
				</div>
			</div>
			<div class="sidebarContainer">
				<div class="icon1Container"> <img src="img/menuEmp/perfil.png" class="imagen"> </div>
				<label id="icon1Text"> Editar Perfil</label>
				<hr id="hline2">
				<div class="icon2Container"> <img src="img/menuEmp/search.png" class="imagen"> </div>
				<label id="icon2Text"> Editar Formulario de Busqueda </label>
				<hr id="hline3">
				<div class="icon3Container" name="emparejamientos"> <img src="img/menuEmp/matches.png" class="imagen"> </div>
				<label id="icon3Text"> &emsp;Ver Emparejamientos </label>
				<hr id="hline1">
				<h3> TRABAJOSO </h3>
      	        <div class="bearContainer"> <img src="img/menuAsp/bear.png" class="imagen"> </div>
			</div>
			<div class="topbarContainer">
				<h1> Menú Principal </h1>
				<form action="/action.php"> 
					<input type="text" id="nombreEmpTopBar" name="nombreTopBar" readonly value="<?php echo($persona->nombre);?>">
				</form>
				<a href="php/cerrarSesion.php"> <button id="salirBtn"> Salir Del Sistema </button> </a>
			</div>
		</div>
	</body>

	<script src="js/menuEmp/scriptsMenuEmpresa.js"> </script>
	<script src="js/menuEmp/scriptsFormularioEmpresa.js"> </script>
	<script src="js/menuEmp/validarDatosEmpresa.js"> </script>
	<script src="js/ValidarDatosEliminar.js"> </script>
	<script src="js/menuEmp/scriptsEmparejamientosEmp.js"> </script>
</html>