<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title lang="es"> Trabajoso | Menú Principal de Aspirante </title>
    	<link rel="icon" href="img/favicon.png">
    	<link rel="stylesheet" href="css/menuAsp/menuAspiranteStyle.css"> 
    	<link rel="stylesheet" href="css/menuAsp/perfilAspiranteStyle.css">
    	<link rel="stylesheet" href="css/menuAsp/formularioAspiranteStyle.css">
    	<link rel="stylesheet" href="css/menuAsp/emparejamientosMenuAspiranteStyle.css">
	</head>

	<body>
		<div id="errorCover"> </div>
		<div id="errorBox"> 
			<div id="errorText"></div>
			<div id="errorBtn"> 
				<div id="errorBtnText"></div>
				<div id="errorBtnIcon"></div>
			</div>
			<div id="errorImg"> </div>
		</div>

		<?php

			session_Start();

			include("php/conexion.php");
			$registros=$base->query("SELECT * FROM usuarios2 where id='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);



			$formularios=$base->query("SELECT * FROM formulariosaspirantes where idAspirante='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);

			
			if(!isset($_SESSION["usuario"])){
				
				header("Location:interfazLogin.php");
			}

			else{
				if($_SESSION["perfil"]=='aspirante'){
				
				}
				else{
					header("Location:php/cerrarSesion.php");
				}
				
			}

			if(isset($_POST['aceptarEditar'])){
				require("php/actualizarPerfil.php");
				actualizarPerfilAspirante();
			}

			if(isset($_POST['aceptarForm'])){
				require("php/actualizarFormulario.php");
				actualizarFormularioAspirante();
			}

			

			//para los emparejamientos
			$asp=$base->query("SELECT * FROM formulariosaspirantes where idAspirante='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);
			$lafecha=$base->query("SELECT fecha FROM usuarios2 where id='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);
			$estudiosBuscados=$asp[0]->nivelEstudios;
			$profesionBuscada=$asp[0]->profesion;
			$otraProfesionBuscada=$asp[0]->otraProfesion;
			$fecha=$lafecha[0]->fecha;
			$fnac= $fecha;
			$fnac= explode("-",$fnac);
			$age=(date("md", date("U", mktime(0, 0, 0, $fnac[1], $fnac[2], $fnac[0]))) > date("md")
   								 ? ((date("Y") - $fnac[0]) - 1)
    							: (date("Y") - $fnac[0]));
			$xp=$asp[0]->experiencia;

			if($age>=18 && $age<=24){
				$edadBuscada='18-24';
			}
			else if($age>=25 && $age<=34){
				$edadBuscada='25-34';
			}
			else if($age>=35 && $age <=44){
				$edadBuscada='35-44';
			}
			else if($age>=45 && $age<=54){
				$edadBuscada='45-54';
			}
			else{
				$edadBuscada='55+';
			}

			$matchEmp=$base->query("SELECT * FROM formulariosempresas where nivelEstudios='" .$estudiosBuscados. "' and profesion='" .$profesionBuscada. "' and otraProfesion='" .$otraProfesionBuscada. "' and edadBuscada='" .$edadBuscada."'")->fetchAll(PDO::FETCH_OBJ);

			
			



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

					<label for="nameBox" id="nameBoxLabel"> Nombre Completo </label>
					<input type="text" name="nombre" placeholder="Nombre Completo" id="nameBox" value="<?php echo($persona->nombre);?>" required pattern="[a-zA-ZÀ-ž\s]{4,60}" title="Debe tener 4 caracteres como mínimo y 60 como máximo.&#13;&#10;Solo puede tener letras, letras acentuadas y espacios."> <br>
					<label for="emailBox" id="emailBoxLabel" class="email"> Email </label>
					<input type="email" name="email" placeholder="Email" id="emailBox" value="<?php echo($persona->correo);?>" required pattern=".{4,50}"title="Debe tener 4 caracteres como mínimo y 50 como máximo."> <br>
					<label for="passwordBox" id="passBoxLabel"> Contraseña </label>
					<input type="password" name="clave" placeholder="Contraseña" id="passwordBox" value="<?php echo($persona->clave);?>" required pattern="[^' ']{4,20}" title="Debe tener 4 caracteres como mínimo y 20 como máximo. No puede tener espacios."> <br>
					<label for="dateBox" id="dateBoxLabel"> Fecha De Nacimiento </label>
					<input type="date" name="fecha" id="dateBox" value="<?php echo($persona->fecha);?>" required> <br>
					<label id="sexoLabel"> Sexo: </label>
					<label for="radioMasc" id="radioMascLabel"> Masculino </label>
					<input type="radio" name="sexo" id="radioMasc" value="Masculino" <?php echo ($persona->sexo=='M')?'checked':'' ?> required>
					<label for="radioFem" id="radioFemLabel"> Femenino </label>
					<input type="radio" name="sexo" id="radioFem" value="Femenino" <?php echo ($persona->sexo=='F')?'checked':'' ?>> <br>
					<label for="listaPaises" id="listaPaisLabel"> País </label>
					<select id="listaPaises" name="PaisesAspirante">
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
					<hr id="perfilLine2">
					<input type="submit" id="aceptarEditar" name="aceptarEditar" value="Actualizar Perfil">
				</form>
				<button id="volverPerfil"> Regresar Al Menú </button>
				

 				<button onClick="borrarPerfilyFormAsp();" id="borrarPerfil" name="borrarPerfil"> Borrar Perfil </button> 
			</div>
			<div class="mainBoxForm"> 
				<label id="EditarFormLabel"> Editar Formulario de Busqueda de Empleo </label>
				<hr id="formLine1">
				<form id="formulForm" action="<?php echo($_SERVER['PHP_SELF']);?>" method="post"> 
					
					<label for ="curriculumText" id="curriculumTextLabel"> Experiencia ó Curriculum </label>

					<textarea rows="4" name=curriculum id="curriculumText" required placeholder="Experiencia ó Curriculum"><?php if($formularios!=null){echo($formularios[0]->experiencia);}?></textarea> <br>
					<label for="listaEducacion" id="listaEdLabel"> Nivel De Estudios </label>
					<select id="listaEducacion" name="educacion"> 
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Secundaria')?'selected':''?> value="Secundaria"> Secundaria </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Técnico Superior')?'selected':''?> value="Técnico Superior"> Técnico Superior </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Pregrado Universitario')?'selected':''?> value="Pregrado Universitario"> Pregrado Universitario </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Postgrado Universitario')?'selected':''?> value="Postgrado Universitario"> Postgrado Universitario </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Doctorado')?'selected':''?> value="Doctorado"> Doctorado </option>
						<option <?php if($formularios!=null)echo($formularios[0]->nivelEstudios=='Magister')?'selected':''?> value="Magister"> Magister </option>
					</select> <br>
					<label for="listaProfesiones" id="listaProfLabel"> Profesión </label>
					<select id="listaProfesiones" name="listaProfesiones"> 
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Ingeniero Informático')?'selected':''?> value="Ingeniero Informático"> Ingeniero Informático </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Ingeniero Industrial')?'selected':''?> value="Ingeniero Industrial"> Ingeniero Industrial </option>
						<option <?php if($formularios!=null)echo($formularios[0]->profesion=='Ingeniero En Telecomunicaciones')?'selected':''?> value="Ingeniero En Telecomunicaciones"> Ingeniero En Telecomunicaciones </option>
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
					<label for="otraProfesion" id="textOtraProfLabel"> Otra Profesión </label>
					<input type="text" name="otraProfesion" value="<?php if($formularios!=null){echo($formularios[0]->otraProfesion);}?>" id="textOtraProf" required pattern="[a-zA-ZÀ-ž\s]{4,40}" title="Debe tener 4 caracteres como mínimo y 40 como máximo.&#13;&#10;Solo puede tener letras y espacios." placeholder="Otra Profesión"> <br>\
					<hr id="formLine2">
					<input type="submit" id="aceptarForm" name="aceptarForm" value="Actualizar Formulario">
					
				</form>
				<button onClick="borrarFormAsp();" id="borrarForm" name="borrarForm"> Borrar Formulario </button> 
				
				<button id="volverForm"> Regresar Al Menú </button>
			</div>
			<div class="mainBoxEmps"> 
				<label id="tituloEmps"> Emparejamientos con Empresas </label>
				<hr id="eLine1">
				<div class="tableDivs">
				    <div class="tableDivsHeader">
						<div class="tablaHeader" id="nameHeader"> Nombre de <br> la Empresa </div>
						<div class="tablaHeader" id="mailHeader"> Email de <br> la Empresa </div>
						<div class="tablaHeader" id="paisHeader"> País de la Empresa </div>
						<div class="tablaHeader" id="detHeader"> Detalles del <br> Empleo Ofrecido </div>
						<div class="tablaHeader" id="dirHeader"> Dirección de <br> la Empresa </div>
					</div>
					<div class="tableContent">

						<?php foreach($matchEmp as $emp):
								/*$control=0;
								
								
								if($emp->edadBuscada=='55+'){
									
									$lookingAge='55';
									if($age>=55){
										$control=1;
									}
									else{
										$control=0;
									}
								}
								else{
    								$lookingAge= explode("-",$emp->edadBuscada);
    								if(($age>=$lookingAge[0])&&($age<=$lookingAge[1])){
    									$control=1;
    								}
    								else{
    									$control=0;
    									
    								}
    							}

							?>*/
							$empp=$base->query("SELECT * FROM usuarios2 where id='" .$emp->idEmpresa. "'")->fetchAll(PDO::FETCH_OBJ);

							//<?php if($control==1){

								echo('<div class="tableContentRow">');
								echo('<div class="nameContent">');
								echo('<div class="nameText">');
								echo('<p>'.$empp[0]->nombre.'</p>');
								echo('</div>');
								echo('</div>');
								echo('<div class="mailContent">');
								echo('<div class="mailText">');
								echo('<p>'.$empp[0]->correo.'</p>');
								echo('</div>');
								echo('</div>');
								echo('<div class="paisContent">');
								echo('<div class="paisText">');
								echo('<p>'.$empp[0]->pais.'</p>');
								echo('</div>');
								echo('</div>');
								echo('<div class="detContent">');
								echo('<div class="detText">');
								echo('<p>'.$emp->detalles.'<p>');
								echo('</div>');
								echo('</div>');
								echo('<div class="dirContent">');
								echo('<div class="dirText">');
								echo('<p>'.$empp[0]->direccion.'</p>');
								echo('</div>');
								echo('<div class="mapsImg">
     							 			<a href="https://google.com/maps/search/'.$empp[0]->nombre.'/'.$empp[0]->direccion.'/'.$empp[0]->pais.'" target="_blank"><img class="imagen" src="img/menuAsp/vermaps.png" alt="mapa"></a>
     							 		</div>');
								echo('</div>');
								echo('<br>');
								echo('</div>');
							//}


							
							
		     
   						endforeach;?>

						
					</div>
				</div>
				<div id="upArrow"> <img class="imagen" src="img/menuAsp/arrowup.png" alt="subir"> </div>
				<div id="downArrow"> <img class="imagen" src="img/menuAsp/arrowdown.png" alt="bajar"> </div>
				<hr id="eLine2">
				<button id="volverEmps"> Regresar al Menú </button>
			</div>
		</div>
		<div class="sidebarContainer">
			<div class="icon1Container"> <img src="img/menuAsp/perfil.png" class="imagen"> </div>
			<label id="icon1Text"> Editar Perfil</label>
			<hr id="hline2">
			<div class="icon2Container"> <img src="img/menuAsp/search.png" class="imagen"> </div>
			<label id="icon2Text"> Editar Formulario de Busqueda </label>
			<hr id="hline3">
			<div class="icon3Container"> <img src="img/menuAsp/matches.png" class="imagen"> </div>

			<label id="icon3Text"> &emsp;Ver Emparejamientos </label>
			<hr id="hline1">
			<h3> TRABAJOSO </h3>
            <div class="bearContainer"> <img src="img/menuAsp/bear.png" class="imagen"> </div>
		</div>
		<div class="topbarContainer">
			<h1> Menú Principal </h1>
			<form action="/action.php"> 
				<input type="text" id="nombreAspTopBar" name="nombreTopBar" readonly value="<?php echo($persona->nombre);?>">
			</form>
			<a href="php/cerrarSesion.php"> <button id="salirBtn"> Salir Del Sistema </button> </a>
		</div>
		</div>

	</body>

	<script src="js/menuAsp/scriptsMenuAspirante.js"> </script>
	<script src="js/menuAsp/scriptsFormularioAspirante.js"> </script>
	<script src="js/menuAsp/validarDatosAspirante.js"> </script>
	<script src="js/validarDatosEliminar.js"> </script>
	<script src="js/menuAsp/scriptsEmparejamientosAsp.js"> </script>
</html>