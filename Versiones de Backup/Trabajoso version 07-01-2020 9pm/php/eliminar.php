<!DOCTYPE html>

<html lang="es">
	<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title lang="es"> Trabajoso | Eliminar </title>
		<link rel="icon" href="../img/favicon.png">
		<link rel="stylesheet" href="../css/eliminar.css">
	</head>

	<body>
	<div id="errorBox"> 
		<div id="errorText"></div>
		<div id="errorBtn"> 
			<div id="errorBtnText"></div>
			<div id="errorBtnIcon"></div>
		</div>
		<div id="errorImg"> </div>
	</div>
	<?php
	session_start();

	
		$op=$_GET['op'];
		$comp=$_GET['clave'];

		//si la contraseña es nula regresa al menu respectivo
		if($comp!='null'){

		//elimina el perfil y el formulario del aspirante
		if($op==1){

			try{
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");


				$sql5="SELECT clave from usuarios2 WHERE id='" .$_SESSION['id'] . "'";
				$resultado5=$base->prepare($sql5);
				$resultado5->execute(array());

				while($registro=$resultado5->fetch(PDO::FETCH_ASSOC)){
					
					$claveComparar=$registro['clave'];
				}

				$resultado5->closeCursor();


				if($comp==$claveComparar){

					$sql2="DELETE from formulariosaspirantes WHERE idAspirante='" . $_SESSION['id'] . "'";
					$resultado2=$base->prepare($sql2);
					$resultado2->execute(array());
					$resultado2->closeCursor();
			


					$sql1="DELETE from usuarios2 WHERE id='" . $_SESSION['id'] . "'";
					$resultado=$base->prepare($sql1);
					$resultado->execute(array());
			
					$resultado->closeCursor();
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Ir a login\";
							document.querySelector('#errorText').innerHTML = \"Su perfil y su formulario de búsqueda han sido eliminados correctamente.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/greenTrash.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../php/cerrarSesion.php');
							});
						</script>");
					//echo("<script type=\"text/javascript\">alert('Perfil y formulario eliminados con éxito');window.location.replace('../php/cerrarSesion.php');</script>");
	
			}
			else{
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"La clave introducida es incorrecta.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/error.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuAspirante.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Clave inválida');window.location.replace('../interfazMenuAspirante.php');</script>");
			}
		}
			catch(Exception $e){
				echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"Error de conexión con el servidor, intentelo de nuevo.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/error.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuAspirante.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}
		

		}
		//elimina solo el formulario del aspirante
		else if($op==2){

		try{
			$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");

			$sql5="SELECT clave from usuarios2 WHERE id='" .$_SESSION['id'] . "'";
			$resultado5=$base->prepare($sql5);
			$resultado5->execute(array());

			while($registro=$resultado5->fetch(PDO::FETCH_ASSOC)){
					
				$claveComparar=$registro['clave'];
			}

			$resultado5->closeCursor();

			if($comp==$claveComparar){

				$sql2="DELETE from formulariosaspirantes WHERE idAspirante='" . $_SESSION['id'] . "'";
				$resultado2=$base->prepare($sql2);
				$resultado2->execute(array());
				$resultado2->closeCursor();
			
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"Su formulario de búsqueda ha sido eliminado correctamente.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/greenTrash.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuAspirante.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Formulario eliminado con éxito');window.location.replace('../interfazMenuAspirante.php');</script>");
				
			}
			else{
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"La clave introducida es incorrecta.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/error.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuAspirante.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Clave inválida');window.location.replace('../interfazMenuAspirante.php');</script>");
			}	
			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"Error de conexión con el servidor, intentelo de nuevo.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/error.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuAspirante.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}

		}
		//elimina el perfil y el formulario de la empresa
		else if($op==3){

			try{
			$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
			$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");


			$sql5="SELECT clave from usuarios2 WHERE id='" .$_SESSION['id'] . "'";
			$resultado5=$base->prepare($sql5);
			$resultado5->execute(array());

			while($registro=$resultado5->fetch(PDO::FETCH_ASSOC)){
					
				$claveComparar=$registro['clave'];
			}

			$resultado5->closeCursor();


			if($comp==$claveComparar){

				$sql2="DELETE from formulariosempresas WHERE idEmpresa='" . $_SESSION['id'] . "'";
				$resultado2=$base->prepare($sql2);
				$resultado2->execute(array());
				$resultado2->closeCursor();
			


				$sql1="DELETE from usuarios2 WHERE id='" . $_SESSION['id'] . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
			
				$resultado->closeCursor();
				echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Ir a login\";
							document.querySelector('#errorText').innerHTML = \"Su perfil y su formulario de búsqueda han sido eliminados correctamente.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/greenTrash.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../php/cerrarSesion.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Perfil y formulario eliminados con éxito');window.location.replace('../php/cerrarSesion.php');</script>");
	
			}
			else{
					echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"La clave introducida es incorrecta.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/error.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuEmpresa.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Clave inválida');window.location.replace('../interfazMenuEmpresa.php');</script>");
			}
		}
			catch(Exception $e){
				echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"Error de conexión con el servidor, intentelo de nuevo.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/error.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuEmpresa.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}

		}

		//elimina el formulario de la empresa
		else if($op==4){

			try{
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql5="SELECT clave from usuarios2 WHERE id='" .$_SESSION['id'] . "'";
				$resultado5=$base->prepare($sql5);
				$resultado5->execute(array());

				while($registro=$resultado5->fetch(PDO::FETCH_ASSOC)){
					
					$claveComparar=$registro['clave'];
				}

				$resultado5->closeCursor();


				if($comp==$claveComparar){

					$sql2="DELETE from formulariosempresas WHERE idEmpresa='" . $_SESSION['id'] . "'";
					$resultado2=$base->prepare($sql2);
					$resultado2->execute(array());
					$resultado2->closeCursor();
			
				echo("<script type=\"text/javascript\" defer>
					document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
					document.querySelector('#errorText').innerHTML = \"Su formulario de búsqueda ha sido eliminado correctamente.\";
					var img = document.createElement(\"img\");
					img.setAttribute(\"class\",\"imagen\");
					img.setAttribute(\"alt\",\"iralogin\");
					img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
					document.querySelector('#errorBtnIcon').appendChild(img);
					var boxImg = document.createElement(\"img\");
					boxImg.setAttribute(\"class\",\"imagen\");
					boxImg.setAttribute(\"alt\",\"exito\");
					boxImg.setAttribute(\"src\",\"../img/loginimg/greenTrash.png\");
					document.querySelector('#errorImg').appendChild(boxImg);
					document.querySelector('#errorBtnText').style.visibility = 'visible';
					document.querySelector('#errorBtn').style.visibility = 'visible';
					document.querySelector('#errorBtnIcon').style.visibility = 'visible';
					document.querySelector('#errorBox').style.visibility = 'visible';
					document.querySelector('#errorImg').style.visibility = 'visible';
					document.querySelector('#errorText').style.visibility = 'visible';
					const btn = document.querySelector('#errorBtn');
					btn.addEventListener('click', () => {
						document.querySelector('#errorBtnText').style.visibility = 'hidden';
						document.querySelector('#errorBtn').style.visibility = 'hidden';
						document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
						document.querySelector('#errorBox').style.visibility = 'hidden';
						document.querySelector('#errorImg').style.visibility = 'hidden';
						document.querySelector('#errorText').style.visibility = 'hidden';
						document.querySelector('#errorImg').innerHTML = \"\";
						document.querySelector('#errorBtnIcon').innerHTML = \"\";
						window.location.replace('../interfazMenuEmpresa.php');
					});
				</script>");
				//echo("<script type=\"text/javascript\">alert('Formulario eliminado con éxito');window.location.replace('../interfazMenuEmpresa.php');</script>");
			}
			else{
				echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"La clave introducida es incorrecta.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/error.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuEmpresa.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Clave inválida');window.location.replace('../interfazMenuEmpresa.php');</script>");
			}
				
			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"Error de conexión con el servidor, intentelo de nuevo.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/error.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuEmpresa.php');
							});
						</script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}

		}

	}
	else if($op==1 ||$op==2){
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"Operación cancelada con exito.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/cancel.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuAspirante.php');
							});
						</script>");	
		//echo("<script type=\"text/javascript\">alert('Operación cancelada con éxito.');window.location.replace('../interfazMenuAspirante.php');</script>");
	}

	else if($op==3 ||$op==4){
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Regresar\";
							document.querySelector('#errorText').innerHTML = \"Operación cancelada con exito.\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"../img/loginimg/exitblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"../img/loginimg/cancel.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.replace('../interfazMenuEmpresa.php');
							});
						</script>");
		//echo("<script type=\"text/javascript\">alert('Operación cancelada con éxito.');window.location.replace('../interfazMenuEmpresa.php');</script>");
	}

	

	
			
	?>
	</body>
</html>
