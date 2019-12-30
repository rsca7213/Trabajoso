<?php
		function actualizarPerfilAspirante(){

			$nombre=$_POST["nombre"];
			$correo=$_POST["email"];
			$clave=$_POST["clave"];
			$sexo=$_POST["sexo"];
			$sexo=$sexo[0];
			$fecha=$_POST["fecha"];
			$fecha2=explode("-",$fecha);
			$hoy=explode("-",date("Y-m-d"));
			$menor=0;
			$pais=$_POST["PaisesAspirante"];

			try{
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql1="SELECT id,correo from usuarios2 WHERE correo='" . $correo . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
				$filas=$resultado->rowCount();

				if($filas!=0){
					while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
					
						$idConsultado=$registro['id'];

					}

					if($idConsultado!=$_SESSION['id']){
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Cerrar\";
							document.querySelector('#errorText').innerHTML = \"El correo electrónico ya existe.\";
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
						//echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
					}else{

						$sql="UPDATE usuarios2 SET nombre=:nombre,clave=:clave,correo=:correo, fecha=:fecha, sexo=:sexo, pais=:pais WHERE id='" . $_SESSION['id'] . "'" ;
						$resultado2=$base->prepare($sql);
						$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":correo"=>$correo,":fecha"=>$fecha,":sexo"=>$sexo,":pais"=>$pais));
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Aceptar\";
							document.querySelector('#errorText').innerHTML = \"Perfil actualizado correctamente!\";
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
						//echo("<script type=\"text/javascript\">alert('Perfil actualizado correctamente.');</script>");
				
						$resultado2->closeCursor();

			    	}
				}
				else{

					$sql3="UPDATE usuarios2 SET nombre=:nombre,clave=:clave,correo=:correo, fecha=:fecha, sexo=:sexo, pais=:pais WHERE id='" . $_SESSION['id'] . "'" ;
						$resultado3=$base->prepare($sql3);
						$resultado3->execute(array(":nombre"=>$nombre,":clave"=>$clave,":correo"=>$correo,":fecha"=>$fecha,":sexo"=>$sexo,":pais"=>$pais));
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Aceptar\";
							document.querySelector('#errorText').innerHTML = \"Perfil actualizado correctamente!\";
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
						//echo("<script type=\"text/javascript\">alert('Perfil actualizado correctamente.');</script>");
				
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
				echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}
		}

		function actualizarPerfilEmpresa(){
			$nombre=$_POST["nameBox"];
			$correo=$_POST["emailBox"];
			$clave=$_POST["passBox"];
			$pais=$_POST["listaPaises"];
			$direccion=$_POST["direccion"];

			try{
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql1="SELECT id,correo from usuarios2 WHERE correo='" . $correo . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
				$filas=$resultado->rowCount();

				if($filas!=0){
					while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
					
						$idConsultado=$registro['id'];

					}

					if($idConsultado!=$_SESSION['id']){
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Cerrar\";
							document.querySelector('#errorText').innerHTML = \"El correo electrónico ya existe.\";
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
						//echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
					}else{

						$sql="UPDATE usuarios2 SET nombre=:nombre,clave=:clave,correo=:correo, pais=:pais, direccion=:direccion WHERE id='" . $_SESSION['id'] . "'" ;
						$resultado2=$base->prepare($sql);
						$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":correo"=>$correo,":pais"=>$pais,":direccion"=>$direccion));
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Aceptar\";
							document.querySelector('#errorText').innerHTML = \"Perfil actualizado correctamente!\";
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
						//echo("<script type=\"text/javascript\">alert('Perfil actualizado correctamente.');</script>");
				
						$resultado2->closeCursor();

			    	}
				}
				else{

					$sql3="UPDATE usuarios2 SET nombre=:nombre,clave=:clave,correo=:correo,pais=:pais,direccion=:direccion WHERE id='" . $_SESSION['id'] . "'" ;
						$resultado3=$base->prepare($sql3);
						$resultado3->execute(array(":nombre"=>$nombre,":clave"=>$clave,":correo"=>$correo,":pais"=>$pais,":direccion"=>$direccion));
						echo("<script type=\"text/javascript\" defer>
							document.querySelector('#errorBtnText').innerHTML = \"Aceptar\";
							document.querySelector('#errorText').innerHTML = \"Perfil actualizado correctamente!\";
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
						//echo("<script type=\"text/javascript\">alert('Perfil actualizado correctamente.');</script>");
				
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
?>