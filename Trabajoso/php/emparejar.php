<?php 
	
	$op=$_GET['op'];
	

	if($op=='1'){
		session_Start();
		include("conexion.php");
		
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
	}


	else if($op=='2'){
		session_Start();
		include("conexion.php");
		$resultadoEmparejamientos=0;

	try{
				


			//para los emparejamientos	
			$emp=$base->query("SELECT * FROM formulariosempresas where idEmpresa='" . $_SESSION['id'] . "'")->fetchAll(PDO::FETCH_OBJ);
			$estudiosBuscados=$emp[0]->nivelEstudios;
					$profesionBuscada=$emp[0]->profesion;
					$otraProfesionBuscada=$emp[0]->otraProfesion;
					$edadBuscada=$emp[0]->edadBuscada;
					$detalles=$emp[0]->detalles;
			$matchAsp=$base->query("SELECT * FROM formulariosaspirantes where nivelEstudios='" . $estudiosBuscados . "' and profesion='" .$profesionBuscada. "' and otraProfesion='" .$otraProfesionBuscada. "'")->fetchAll(PDO::FETCH_OBJ);


			foreach($matchAsp as $asp):
				$control=0;
				$aspp=$base->query("SELECT * FROM usuarios2 where perfil='aspirante' and id='" .$asp->idAspirante. "'")->fetchAll(PDO::FETCH_OBJ);
				$fnac= $aspp[0]->fecha;
				$fnac= explode("-",$fnac);
				$age=(date("md", date("U", mktime(0, 0, 0, $fnac[1], $fnac[2], $fnac[0]))) > date("md")
   								 ? ((date("Y") - $fnac[0]) - 1)
    							: (date("Y") - $fnac[0]));

				if($edadBuscada=='55+'){
									
					$lookingAge='55';
						if($age>=55){
							$control=1;
							$resultadoEmparejamientos=1;
						}
						else{
							$control=0;

						}
					}
				else{
    				$lookingAge= explode("-",$edadBuscada);
    				if(($age>=$lookingAge[0])&&($age<=$lookingAge[1])){
    					$control=1;
    					$resultadoEmparejamientos=1;
    				}
    				else{
    					$control=0;
    									
    				}
    			}

																    
   			endforeach;


			echo json_encode($resultadoEmparejamientos);

	

				
			}
			catch(Exception $e){
				echo("<script type=\"text/javascript\">alert('Error al conectarse con la base de datos.');</script>");
			}
			finally{
				$base=null;
			}
	}

?>