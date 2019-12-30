<?php
	session_Start();

			include("php/conexion.php");
	try{
				


			$asp=$base->query("SELECT * FROM formulariosaspirantes where idAspirante='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);
			$lafecha=$base->query("SELECT fecha FROM usuarios2 where id='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);
			$estudiosBuscados=$asp[0]->nivelEstudios;
			$profesionBuscada=$asp[0]->profesion;
			$otraProfesionBuscada=$asp[0]->otraProfesion;
			$fecha=$lafecha[0]->fecha;
			$fnac= $fecha;
			$fnac= explode("-",$fnac);
			$age=(date("md", date("U", mktime(0, 0, 0, $fnac[1], $fnac[2], $fnac[0]))) > date("md")
   								 ? ((date("Y") - $fnac[0]) - 1)
    							: (date("Y") - $fnac[0]));
			$xp=$asp[0]->experiencia;

			if($age>=18 && $age<=24){
				$edadBuscada='18-24';
			}
			else if($age>=25 && $age<=34){
				$edadBuscada='25-34';
			}
			else if($age>=35 && $age <=44){
				$edadBuscada='35-44';
			}
			else if($age>=45 && $age<=54){
				$edadBuscada='45-54';
			}
			else{
				$edadBuscada='55+';
			}


			$sql1="SELECT * FROM formulariosempresas where nivelEstudios='" .$estudiosBuscados. "' and profesion='" .$profesionBuscada. "' and otraProfesion='" .$otraProfesionBuscada. "' and edadBuscada='" .$edadBuscada."'";
			$abc=$base->prepare($sql1);
			$abc->execute(array());
			$filas=$abc->rowCount();

			echo json_encode($filas);

	

				
			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}





?>