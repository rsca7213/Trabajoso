
		<?php
		$perfil;
		$id;
			try{
				
				$base=new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				
				$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");
				$sql="SELECT * FROM usuarios2 WHERE correo like ?";
				
				$resultado=$base->prepare($sql);
				
				$email = $_POST["email"];
				$pass= $_POST["clave"];
				
				$resultado->execute(array($email));

				while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
					
					if($pass==$registro['clave']){
					$perfil=$registro['perfil'];
					$nombre=$registro['nombre'];
					$id=$registro['id'];
					$correo=$registro['correo'];
						session_start();
						$_SESSION["usuario"]=$nombre;
						$_SESSION["perfil"]=$perfil;
						$_SESSION["id"]=$id;
						$_SESSION["correo"]=$correo;
					
					if($perfil=="aspirante"){
						header("location:interfazMenuAspirante.php"); 

			   
			   		}else{
			   			header("location:interfazMenuEmpresa.php");  
			   
		   			}
					}
					else {
						echo("<script type=\"text/javascript\" defer> 
							const parent = document.querySelector('#loginCont'); 
							var a = document.createElement(\"div\"); 
							parent.appendChild(a); 
							a.innerHTML = \"Los datos introducidos son incorrectos.\";
							a.setAttribute(\"id\",\"errorText\");
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
						 </script>");
						//echo("<script type=\"text/javascript\">alert('Correo o contraseña inválidos.');</script>");
					}
				}

				
								
				$numeroRegistro=$resultado->rowCount();
				
				if($numeroRegistro==0){
					echo("<script type=\"text/javascript\" defer> 
							const parent = document.querySelector('#loginCont'); 
							var a = document.createElement(\"div\"); 
							parent.appendChild(a); 
							a.innerHTML = \"Los datos introducidos son incorrectos.\";
							a.setAttribute(\"id\",\"errorText\");
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
						 </script>");
					//echo("<script type=\"text/javascript\">alert('Correo o contraseña inválidos.');</script>");
					
					
				}
				


				
			}catch(Exception $e) {
				echo("<script type=\"text/javascript\" defer> 
							const parent = document.querySelector('#loginCont'); 
							var a = document.createElement(\"div\"); 
							parent.appendChild(a); 
							a.innerHTML = \"Error de conexión con el servidor.\";
							a.setAttribute(\"id\",\"errorText\");
							document.querySelector('#errorBox').style.visibility = 'visible';
							document.querySelector('#errorImg').style.visibility = 'visible';
						 </script>");
				//echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			
		?>
