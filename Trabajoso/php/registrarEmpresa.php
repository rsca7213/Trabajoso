<?php
			$nombre=$_POST["nombreEmp"];
			$correo=$_POST["email"];
			$clave=$_POST["clave"];

			

			
			try{
				
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql1="SELECT correo from perfil_empresas WHERE correo='" . $correo . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
				$filas=$resultado->rowCount();
				if($filas!=0){
					echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
				}
				else{
					$sql="INSERT INTO perfil_empresas (id,nombre,clave,correo) VALUES (0,:nombre,:clave,:email)";
				$resultado2=$base->prepare($sql);
				$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":email"=>$correo));
				
					echo("<script type=\"text/javascript\">alert('La cuenta ha sido creada exitosamente.');</script>");
				
					$resultado2->closeCursor();

				}
				$resultado->closeCursor();

			}
			catch(Exception $e){
				//die("error: " . $e->GetMessage());
				echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
				//header("Location:login.html");
			}
			
		?>