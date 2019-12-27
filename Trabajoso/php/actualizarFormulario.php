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
				
					echo("<script type=\"text/javascript\">alert('El formulario ha sido creado exitosamente.');</script>");
				
					$resultado2->closeCursor();
				}
				else{

					$sql3="UPDATE formulariosaspirantes SET nivelEstudios=:nivelEst, profesion=:prof, otraProfesion=:oProf, experiencia=:xp WHERE idAspirante='" . $_SESSION['id'] . "'" ;
					$resultado3=$base->prepare($sql3);
					$resultado3->execute(array(":nivelEst"=>$nivelEstudios,":prof"=>$profesiones,":oProf"=>$otraProfesion,":xp"=>$curriculum));
				
					echo("<script type=\"text/javascript\">alert('Formulario actualizado correctamente.');</script>");
				
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
				
					echo("<script type=\"text/javascript\">alert('El formulario ha sido creado exitosamente.');</script>");
				
					$resultado2->closeCursor();
				}
				else{

					$sql3="UPDATE formulariosempresas SET nivelEstudios=:nivelEst, profesion=:prof, otraProfesion=:oProf, edadBuscada=:edadB, detalles=:details WHERE idEmpresa='" . $_SESSION['id'] . "'" ;
					$resultado3=$base->prepare($sql3);
					$resultado3->execute(array(":nivelEst"=>$nivelEstudios,":prof"=>$profesiones,":oProf"=>$otraProfesion,":edadB"=>$edad,":details"=>$detalles));
				
					echo("<script type=\"text/javascript\">alert('Formulario actualizado correctamente.');</script>");
				
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