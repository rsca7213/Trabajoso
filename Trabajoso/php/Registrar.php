<?php

		function registrarUsuario(){

			$nombre=$_POST["nombre"];
			$correo=$_POST["email"];
			$clave=$_POST["clave"];
			$sexo=$_POST["sexo"];
			$sexo=$sexo[0];
			$fecha=$_POST["fecha"];
			$fecha2=explode("-",$fecha);
			$hoy=explode("-",date("Y-m-d"));
			$menor=0;
			$pais=$_POST["listaPaisesAspirante"];

			try{
				
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql1="SELECT correo from usuarios2 WHERE correo='" .$correo . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
				$filas=$resultado->rowCount();

				if($filas!=0){
					echo("<script type=\"text/javascript\" defer>
						document.querySelector('#errorCover').style.visibility = 'visible';
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
						btn.addEventListener('click', () => {
							document.querySelector('#errorBtnText').style.visibility = 'hidden';
							document.querySelector('#errorBtn').style.visibility = 'hidden';
							document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
							document.querySelector('#errorBox').style.visibility = 'hidden';
							document.querySelector('#errorImg').style.visibility = 'hidden';
							document.querySelector('#errorText').style.visibility = 'hidden';
							document.querySelector('#errorImg').innerHTML = \"\";
							document.querySelector('#errorBtnIcon').innerHTML = \"\";
							document.querySelector('#errorCover').style.visibility = 'hidden';
						});
					</script>");
					//echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
				}
				else{

					$sql="INSERT INTO usuarios2 (id,nombre,clave,correo,fecha,sexo,pais,perfil,direccion) VALUES (0,:nombre,:clave,:email,:fecha,:sexo,:pais,'aspirante','')";
					$resultado2=$base->prepare($sql);
					$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":email"=>$correo,":fecha"=>$fecha,":sexo"=>$sexo,":pais"=>$pais));
					echo("<script type=\"text/javascript\" defer>
						document.querySelector('#errorCover').style.visibility = 'visible';
						document.querySelector('#errorBtnText').innerHTML = \"Ir a login\";
						document.querySelector('#errorText').innerHTML = \"La cuenta fue creada exitosamente!\";
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
						btn.addEventListener('click', () => {
							window.location.replace('interfazLogin.php');
							document.querySelector('#errorImg').innerHTML = \"\";
							document.querySelector('#errorBtnIcon').innerHTML = \"\";
							document.querySelector('#errorCover').style.visibility = 'hidden';
						});
					</script>");
					//echo("<script type=\"text/javascript\">alert('La cuenta ha sido creada exitosamente.');window.location.replace('interfazLogin.php');</script>");
				
					$resultado2->closeCursor();

				}
				$resultado->closeCursor();

				
			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\" defer>
						document.querySelector('#errorCover').style.visibility = 'visible';
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
						btn.addEventListener('click', () => {
							document.querySelector('#errorBtnText').style.visibility = 'hidden';
							document.querySelector('#errorBtn').style.visibility = 'hidden';
							document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
							document.querySelector('#errorBox').style.visibility = 'hidden';
							document.querySelector('#errorImg').style.visibility = 'hidden';
							document.querySelector('#errorText').style.visibility = 'hidden';
							document.querySelector('#errorImg').innerHTML = \"\";
							document.querySelector('#errorBtnIcon').innerHTML = \"\";
							document.querySelector('#errorCover').style.visibility = 'hidden';
						});
					</script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}
		}

		function registrarEmpresa(){
			$nombre=$_POST["nombreEmp"];
			$correo=$_POST["email"];
			$clave=$_POST["clave"];
			$pais=$_POST["listaPaisesEmpresa"];
			$direccion=$_POST["direccion"];

			
			try{
				
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql1="SELECT correo from usuarios2 WHERE correo='" . $correo . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
				$filas=$resultado->rowCount();

				if($filas!=0){
					echo("<script type=\"text/javascript\" defer>
						document.querySelector('#errorCover').style.visibility = 'visible';
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
						btn.addEventListener('click', () => {
							document.querySelector('#errorBtnText').style.visibility = 'hidden';
							document.querySelector('#errorBtn').style.visibility = 'hidden';
							document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
							document.querySelector('#errorBox').style.visibility = 'hidden';
							document.querySelector('#errorImg').style.visibility = 'hidden';
							document.querySelector('#errorText').style.visibility = 'hidden';
							document.querySelector('#errorImg').innerHTML = \"\";
							document.querySelector('#errorBtnIcon').innerHTML = \"\";
							document.querySelector('#errorCover').style.visibility = 'hidden';
						});
					</script>");
					//echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
				}
				else{

					$sql="INSERT INTO usuarios2 (id,nombre,clave,correo,pais,perfil,direccion) VALUES (0,:nombre,:clave,:email,:pais,'empresa',:direccion)";
					$resultado2=$base->prepare($sql);
					$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":email"=>$correo,":pais"=>$pais,":direccion"=>$direccion));
					echo("<script type=\"text/javascript\" defer>
						document.querySelector('#errorCover').style.visibility = 'visible';
						document.querySelector('#errorBtnText').innerHTML = \"Ir a login\";
						document.querySelector('#errorText').innerHTML = \"La cuenta fue creada exitosamente!\";
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
						btn.addEventListener('click', () => {
							window.location.replace('interfazLogin.php');
							document.querySelector('#errorImg').innerHTML = \"\";
							document.querySelector('#errorBtnIcon').innerHTML = \"\";
							document.querySelector('#errorCover').style.visibility = 'hidden';
						});
					</script>");
					//echo("<script type=\"text/javascript\">alert('La cuenta ha sido creada exitosamente.');window.location.replace('interfazLogin.php');</script>");
				
					$resultado2->closeCursor();

				}
				$resultado->closeCursor();

			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\" defer>
						document.querySelector('#errorCover').style.visibility = 'visible';
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
						btn.addEventListener('click', () => {
							document.querySelector('#errorBtnText').style.visibility = 'hidden';
							document.querySelector('#errorBtn').style.visibility = 'hidden';
							document.querySelector('#errorBtnIcon').style.visibility = 'hidden';
							document.querySelector('#errorBox').style.visibility = 'hidden';
							document.querySelector('#errorImg').style.visibility = 'hidden';
							document.querySelector('#errorText').style.visibility = 'hidden';
							document.querySelector('#errorImg').innerHTML = \"\";
							document.querySelector('#errorBtnIcon').innerHTML = \"\";
							document.querySelector('#errorCover').style.visibility = 'hidden';
						});
					</script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
				echo($e->GetMessage());
			}
			finally{
				$base=null;
			}		
		}
?>