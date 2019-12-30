<?php

	session_Start();
	include("php/conexion.php");
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

?>