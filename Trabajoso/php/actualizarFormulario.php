<?php
function actualizarFormularioAspirante(){

			$curriculum=$_POST["curriculum"];
			$nivelEstudios=$_POST["educacion"];
			$profesiones=$_POST["listaProfesiones"];
			$otraProfesion=$_POST["otraProfesion"];
			$id=$_SESSION['id'];
			if($profesiones!='Otro...')$otraProfesion="";

			try{
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql1="SELECT idAspirante from formulariosaspirantes WHERE idAspirante='" . $id . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
				$filas=$resultado->rowCount();

				if($filas==0){

					$sql="INSERT INTO formulariosaspirantes (idAspirante,nivelEstudios,profesion,otraProfesion,experiencia) VALUES (:id,:nivelEst,:prof,:oProf,:xp)";
					$resultado2=$base->prepare($sql);

					$resultado2->execute(array(":id"=>$id,":nivelEst"=>$nivelEstudios,":prof"=>$profesiones,":oProf"=>$otraProfesion,":xp"=>$curriculum));
				
					echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Aceptar\";
							document.querySelector('#errorText').innerHTML = \"El formulario de búsqueda ha sido creado correctamente!\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"img/loginimg/checkroundblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"img/loginimg/checkround.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							document.querySelector('#errorCover').style.backgroundColor = 'black';
							document.querySelector('#errorCover').style.opacity = \"0.2\";
							document.querySelector('#errorCover').style.visibility = 'visible';
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.href = window.location.href;
								document.querySelector('#errorCover').style.backgroundColor = 'transparent';
								document.querySelector('#errorCover').style.opacity = \"0\";
							});
					</script>");
					//echo("<script type=\"text/javascript\">alert('El formulario ha sido creado exitosamente.');</script>");
				
					$resultado2->closeCursor();
				}
				else{

					$sql3="UPDATE formulariosaspirantes SET nivelEstudios=:nivelEst, profesion=:prof, otraProfesion=:oProf, experiencia=:xp WHERE idAspirante='" . $_SESSION['id'] . "'" ;
					$resultado3=$base->prepare($sql3);
					$resultado3->execute(array(":nivelEst"=>$nivelEstudios,":prof"=>$profesiones,":oProf"=>$otraProfesion,":xp"=>$curriculum));
				
					echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Aceptar\";
							document.querySelector('#errorText').innerHTML = \"El formulario de búsqueda se ha actualizado correctamente!\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"img/loginimg/checkroundblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"img/loginimg/checkround.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn = document.querySelector('#errorBtn');
							document.querySelector('#errorCover').style.backgroundColor = 'black';
							document.querySelector('#errorCover').style.opacity = \"0.2\";
							document.querySelector('#errorCover').style.visibility = 'visible';
							btn.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.href = window.location.href;
								document.querySelector('#errorCover').style.backgroundColor = 'transparent';
								document.querySelector('#errorCover').style.opacity = \"0\";
							});
					</script>");
					//echo("<script type=\"text/javascript\">alert('Formulario actualizado correctamente.');</script>");
				
					$resultado3->closeCursor();

				}
				$resultado->closeCursor();
	
			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\" defer>
				document.querySelector('#errorBtnText').innerHTML = \"Cerrar\";
				document.querySelector('#errorText').innerHTML = \"Error de conexión con el servidor, intentelo de nuevo.\";
				var img = document.createElement(\"img\");
				img.setAttribute(\"class\",\"imagen\");
				img.setAttribute(\"alt\",\"X\");
				img.setAttribute(\"src\",\"img/loginimg/xblack.png\");
				document.querySelector('#errorBtnIcon').appendChild(img);
				var boxImg = document.createElement(\"img\");
				boxImg.setAttribute(\"class\",\"imagen\");
				boxImg.setAttribute(\"alt\",\"error\");
				boxImg.setAttribute(\"src\",\"img/loginimg/error.png\");
				document.querySelector('#errorImg').appendChild(boxImg);
				document.querySelector('#errorBtnText').style.visibility = 'visible';
				document.querySelector('#errorBtn').style.visibility = 'visible';
				document.querySelector('#errorBtnIcon').style.visibility = 'visible';
				document.querySelector('#errorBox').style.visibility = 'visible';
				document.querySelector('#errorImg').style.visibility = 'visible';
				document.querySelector('#errorText').style.visibility = 'visible';
				const btn = document.querySelector('#errorBtn');
				document.querySelector('#errorCover').style.backgroundColor = 'black';
				document.querySelector('#errorCover').style.opacity = \"0.2\";
				document.querySelector('#errorCover').style.visibility = 'visible';
				btn.addEventListener('click', () => {
					document.querySelector('#errorBtnText').style.visibility = 'hidden';
					document.querySelector('#errorBtn').style.visibility = 'hidden';
					document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
					document.querySelector('#errorBox').style.visibility = 'hidden';
					document.querySelector('#errorImg').style.visibility = 'hidden';
					document.querySelector('#errorText').style.visibility = 'hidden';
					document.querySelector('#errorImg').innerHTML = \"\";
					document.querySelector('#errorBtnIcon').innerHTML = \"\";
					window.location.href = window.location.href;
					document.querySelector('#errorCover').style.backgroundColor = 'transparent';
					document.querySelector('#errorCover').style.opacity = \"0\";
				});
				</script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}
		}

		function actualizarFormularioEmpresa(){
			$detalles=$_POST["detallesText"];
			$edad=$_POST["listaEdad"];
			$nivelEstudios=$_POST["listaEducacion"];
			$profesiones=$_POST["listaProfesiones"];
			$otraProfesion=$_POST["textOtraProf"];
			$id=$_SESSION['id'];
			if($profesiones!='Otro...')$otraProfesion="";

			try{
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql1="SELECT idEmpresa from formulariosempresas WHERE idEmpresa='" . $id . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
				$filas=$resultado->rowCount();

				if($filas==0){
					$sql="INSERT INTO formulariosempresas (idEmpresa,nivelEstudios,profesion,otraProfesion,edadBuscada,detalles) VALUES (:id,:nivelEst,:prof,:oProf,:edadB,:details)";
					$resultado2=$base->prepare($sql);

					$resultado2->execute(array(":id"=>$id,":nivelEst"=>$nivelEstudios,":prof"=>$profesiones,":oProf"=>$otraProfesion,":edadB"=>$edad,":details"=>$detalles));
					echo("<script type=\"text/javascript\">
							document.querySelector('#errorBtnText').innerHTML = \"Aceptar\";
							document.querySelector('#errorText').innerHTML = \"El formulario de búsqueda ha sido creado correctamente!\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"img/loginimg/checkroundblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"img/loginimg/checkround.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn1 = document.querySelector('#errorBtn');
							document.querySelector('#errorCover').style.backgroundColor = 'black';
							document.querySelector('#errorCover').style.opacity = \"0.2\";
							document.querySelector('#errorCover').style.visibility = 'visible';
							btn1.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.href = window.location.href;
								document.querySelector('#errorCover').style.backgroundColor = 'transparent';
								document.querySelector('#errorCover').style.opacity = \"0\";
							});
					</script>");
					//echo("<script type=\"text/javascript\">alert('El formulario ha sido creado exitosamente.');</script>");
				
					$resultado2->closeCursor();
				}
				else{

					$sql3="UPDATE formulariosempresas SET nivelEstudios=:nivelEst, profesion=:prof, otraProfesion=:oProf, edadBuscada=:edadB, detalles=:details WHERE idEmpresa='" . $_SESSION['id'] . "'" ;
					$resultado3=$base->prepare($sql3);
					$resultado3->execute(array(":nivelEst"=>$nivelEstudios,":prof"=>$profesiones,":oProf"=>$otraProfesion,":edadB"=>$edad,":details"=>$detalles));
					echo("<script type=\"text/javascript\">
							document.querySelector('#errorBtnText').innerHTML = \"Aceptar\";
							document.querySelector('#errorText').innerHTML = \"El formulario de búsqueda se ha actualizado correctamente!\";
							var img = document.createElement(\"img\");
							img.setAttribute(\"class\",\"imagen\");
							img.setAttribute(\"alt\",\"iralogin\");
							img.setAttribute(\"src\",\"img/loginimg/checkroundblack.png\");
							document.querySelector('#errorBtnIcon').appendChild(img);
							var boxImg = document.createElement(\"img\");
							boxImg.setAttribute(\"class\",\"imagen\");
							boxImg.setAttribute(\"alt\",\"exito\");
							boxImg.setAttribute(\"src\",\"img/loginimg/checkround.png\");
							document.querySelector('#errorImg').appendChild(boxImg);
							document.querySelector('#errorBtnText').style.visibility = 'visible';
							document.querySelector('#errorBtn').style.visibility = 'visible';
							document.querySelector('#errorBtnIcon').style.visibility = 'visible';
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
							document.querySelector('#errorText').style.visibility = 'visible';
							const btn1 = document.querySelector('#errorBtn');
							document.querySelector('#errorCover').style.backgroundColor = 'black';
							document.querySelector('#errorCover').style.opacity = \"0.2\";
							document.querySelector('#errorCover').style.visibility = 'visible';
							btn1.addEventListener('click', () => {
								document.querySelector('#errorBtnText').style.visibility = 'hidden';
								document.querySelector('#errorBtn').style.visibility = 'hidden';
								document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
								document.querySelector('#errorBox').style.visibility = 'hidden';
								document.querySelector('#errorImg').style.visibility = 'hidden';
								document.querySelector('#errorText').style.visibility = 'hidden';
								document.querySelector('#errorImg').innerHTML = \"\";
								document.querySelector('#errorBtnIcon').innerHTML = \"\";
								window.location.href = window.location.href;
								document.querySelector('#errorCover').style.backgroundColor = 'transparent';
								document.querySelector('#errorCover').style.opacity = \"0\";
							});
					</script>");
					//echo("<script type=\"text/javascript\">alert('Formulario actualizado correctamente.');</script>");
				
					$resultado3->closeCursor();

				}
				$resultado->closeCursor();
				
			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\">
				document.querySelector('#errorBtnText').innerHTML = \"Cerrar\";
				document.querySelector('#errorText').innerHTML = \"Error de conexión con el servidor, intentelo de nuevo.\";
				var img = document.createElement(\"img\");
				img.setAttribute(\"class\",\"imagen\");
				img.setAttribute(\"alt\",\"X\");
				img.setAttribute(\"src\",\"img/loginimg/xblack.png\");
				document.querySelector('#errorBtnIcon').appendChild(img);
				var boxImg = document.createElement(\"img\");
				boxImg.setAttribute(\"class\",\"imagen\");
				boxImg.setAttribute(\"alt\",\"error\");
				boxImg.setAttribute(\"src\",\"img/loginimg/error.png\");
				document.querySelector('#errorImg').appendChild(boxImg);
				document.querySelector('#errorBtnText').style.visibility = 'visible';
				document.querySelector('#errorBtn').style.visibility = 'visible';
				document.querySelector('#errorBtnIcon').style.visibility = 'visible';
				document.querySelector('#errorBox').style.visibility = 'visible';
				document.querySelector('#errorImg').style.visibility = 'visible';
				document.querySelector('#errorText').style.visibility = 'visible';
				const btn1 = document.querySelector('#errorBtn');
				document.querySelector('#errorCover').style.backgroundColor = 'black';
				document.querySelector('#errorCover').style.opacity = \"0.2\";
				document.querySelector('#errorCover').style.visibility = 'visible';
				btn1.addEventListener('click', () => {
					document.querySelector('#errorBtnText').style.visibility = 'hidden';
					document.querySelector('#errorBtn').style.visibility = 'hidden';
					document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
					document.querySelector('#errorBox').style.visibility = 'hidden';
					document.querySelector('#errorImg').style.visibility = 'hidden';
					document.querySelector('#errorText').style.visibility = 'hidden';
					document.querySelector('#errorImg').innerHTML = \"\";
					document.querySelector('#errorBtnIcon').innerHTML = \"\";
					window.location.href = window.location.href;
					document.querySelector('#errorCover').style.backgroundColor = 'transparent';
					document.querySelector('#errorCover').style.opacity = \"0\";
				});
				</script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}
		}
			
?>