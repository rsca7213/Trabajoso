<?php
			$nombre=$_POST["nombre"];
			$correo=$_POST["email"];
			$clave=$_POST["clave"];
			$sexo=$_POST["sexo"];
			$sexo=$sexo[0];
			$fecha=$_POST["fecha"];
			$fecha2=explode("-",$fecha);
			$hoy=explode("-",date("Y-m-d"));
			$menor=0;

			if(((int)$hoy[0]-(int)$fecha2[0])==18){
				if((int)$fecha2[1]>(int)$hoy[1]){
					$menor=1;
				}
				else if((int)$fecha2[1]==(int)$hoy[1]){
					if((int)$fecha2[2]>(int)$hoy[2]){
					$menor=1;
				}
				}
			}
			else if(((int)$hoy[0]-(int)$fecha2[0])<18){
				$menor=1;
			}

			if($menor==1){
				echo("<script type=\"text/javascript\">alert('Debes ser mayor de edad para registrarte.');</script>");
			}

			else{
			try{
				
				$base= new PDO("mysql:host=localhost; dbname=trabajoso_bd","root","");
				$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$base->exec("SET CHARACTER SET utf8");

				$sql1="SELECT correo from perfil_aspirantes2 WHERE correo='" .$correo . "'";
				$resultado=$base->prepare($sql1);
				$resultado->execute(array());
				$filas=$resultado->rowCount();
				if($filas!=0){
					echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
				}
				else{
					$sql="INSERT INTO perfil_aspirantes2 (id,nombre,clave,correo,fecha,sexo) VALUES (0,:nombre,:clave,:email,:fecha,:sexo)";
				$resultado2=$base->prepare($sql);
				$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":email"=>$correo,":fecha"=>$fecha,":sexo"=>$sexo));
				
					echo("<script type=\"text/javascript\">alert('La cuenta ha sido creada exitosamente.');</script>");
				
					$resultado2->closeCursor();

				}
				$resultado->closeCursor();

				


				
			}
			catch(Exception $e){
				die("error: " . $e->GetMessage());
			}
			finally{
				$base=null;
				//header("Location:login.html");
			}
		}
			
		?>