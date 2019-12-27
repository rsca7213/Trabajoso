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
					echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
				}
				else{

					$sql="INSERT INTO usuarios2 (id,nombre,clave,correo,fecha,sexo,pais,perfil,direccion) VALUES (0,:nombre,:clave,:email,:fecha,:sexo,:pais,'aspirante','')";
					$resultado2=$base->prepare($sql);
					$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":email"=>$correo,":fecha"=>$fecha,":sexo"=>$sexo,":pais"=>$pais));
				
					echo("<script type=\"text/javascript\">alert('La cuenta ha sido creada exitosamente.');window.location.replace('interfazLogin.php');</script>");
				
					$resultado2->closeCursor();

				}
				$resultado->closeCursor();

				
			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
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

					echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
				}
				else{

					$sql="INSERT INTO usuarios2 (id,nombre,clave,correo,pais,perfil,direccion) VALUES (0,:nombre,:clave,:email,:pais,'empresa',:direccion)";
					$resultado2=$base->prepare($sql);
					$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":email"=>$correo,":pais"=>$pais,":direccion"=>$direccion));
				
					echo("<script type=\"text/javascript\">alert('La cuenta ha sido creada exitosamente.');window.location.replace('interfazLogin.php');</script>");
				
					$resultado2->closeCursor();

				}
				$resultado->closeCursor();

			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
				echo($e->GetMessage());
			}
			finally{
				$base=null;
			}		
		}
?>