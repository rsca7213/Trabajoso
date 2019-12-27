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

						echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
					}else{

						$sql="UPDATE usuarios2 SET nombre=:nombre,clave=:clave,correo=:correo, fecha=:fecha, sexo=:sexo, pais=:pais WHERE id='" . $_SESSION['id'] . "'" ;
						$resultado2=$base->prepare($sql);
						$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":correo"=>$correo,":fecha"=>$fecha,":sexo"=>$sexo,":pais"=>$pais));
				
						echo("<script type=\"text/javascript\">alert('Perfil actualizado correctamente.');</script>");
				
						$resultado2->closeCursor();

			    	}
				}
				else{

					$sql3="UPDATE usuarios2 SET nombre=:nombre,clave=:clave,correo=:correo, fecha=:fecha, sexo=:sexo, pais=:pais WHERE id='" . $_SESSION['id'] . "'" ;
						$resultado3=$base->prepare($sql3);
						$resultado3->execute(array(":nombre"=>$nombre,":clave"=>$clave,":correo"=>$correo,":fecha"=>$fecha,":sexo"=>$sexo,":pais"=>$pais));
				
						echo("<script type=\"text/javascript\">alert('Perfil actualizado correctamente.');</script>");
				
						$resultado3->closeCursor();
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

						echo("<script type=\"text/javascript\">alert('El correo electrónico ya existe.');</script>");
					}else{

						$sql="UPDATE usuarios2 SET nombre=:nombre,clave=:clave,correo=:correo, pais=:pais, direccion=:direccion WHERE id='" . $_SESSION['id'] . "'" ;
						$resultado2=$base->prepare($sql);
						$resultado2->execute(array(":nombre"=>$nombre,":clave"=>$clave,":correo"=>$correo,":pais"=>$pais,":direccion"=>$direccion));
				
						echo("<script type=\"text/javascript\">alert('Perfil actualizado correctamente.');</script>");
				
						$resultado2->closeCursor();

			    	}
				}
				else{

					$sql3="UPDATE usuarios2 SET nombre=:nombre,clave=:clave,correo=:correo,pais=:pais,direccion=:direccion WHERE id='" . $_SESSION['id'] . "'" ;
						$resultado3=$base->prepare($sql3);
						$resultado3->execute(array(":nombre"=>$nombre,":clave"=>$clave,":correo"=>$correo,":pais"=>$pais,":direccion"=>$direccion));
				
						echo("<script type=\"text/javascript\">alert('Perfil actualizado correctamente.');</script>");
				
						$resultado3->closeCursor();
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
?>