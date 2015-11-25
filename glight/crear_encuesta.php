<?php
	require('configs/include.php');
	
	class c_crear_encuesta extends super_controller {

		public function crear()		
	    {
	        $encuesta = new encuesta($this->post);
	        $tz = 'America/Bogota';	
	        $encuesta->set('fechaPublicacion',(new DateTime("now",new DateTimeZone($tz)))->format('Y-m-d'));
	        	
			if($encuesta->validarCompletitud()){
				if(isset($this->post->pregunta)){
					if($encuesta->validarFecha()){
						if($encuesta->validarCaracteres()){
							if($this->ValidarPreguntas($this->post->pregunta,$this->post->opcion)){
								if($this->validarCategorias()){
								
							        $this->orm->connect();
							        $this->orm->insert_data("normal",$encuesta);

							        $num_preg=1;

									$options['encuesta']['lvl2']="by_nombre";
									$cod['encuesta']['nombre']=$encuesta->get('nombre');
									$this->orm->connect();
									$this->orm->read_data(array("encuesta"), $options, $cod);
									$encuesta = $this->orm->get_objects("encuesta");

									foreach ($this->post->interes as $key => $value) {
										settype($categoria, 'object');
										$categoria->tipo = $value;
										$categoria->encuesta= $encuesta[0]->get('codigo');
										$categoria=new categoria($categoria);
										$this->orm->insert_data("normal", $categoria);
										unset($categoria);
									}

							        foreach ($this->post->pregunta as $key => $value) {
										settype($pregunta, 'object');
										$pregunta->contenido = $value;
										$pregunta->numero = $num_preg;								

										$pregunta->encuesta=$encuesta[0]->get('codigo');
										$pregunta=new pregunta($pregunta);
										$this->orm->insert_data("normal", $pregunta);

										$num_opc=1;

										$options['pregunta']['lvl2']="by_encuesta_numero";
										$cod['pregunta']['encuesta']=$pregunta->get('encuesta');
										$cod['pregunta']['numero']=$pregunta->get('numero');
										$this->orm->connect();
										$this->orm->read_data(array("pregunta"), $options, $cod);
										$pregunta = $this->orm->get_objects("pregunta");

										for ($i = (($num_preg-1)*4); $i <= ($num_preg*4-1); $i++) {
											
											settype($opcion, 'object');
											$opcion->contenido = $this->post->opcion[$i];
											$opcion->numero = $num_opc;

											$opcion->pregunta= $pregunta[0]->get('codigo');
											$opcion=new opcion($opcion);
											$this->orm->insert_data("normal", $opcion);
											unset($opcion);

											$num_opc = $num_opc + 1;
										}

										unset($pregunta);
										$num_preg = $num_preg + 1;
									}
								       
								        $this->displayMessage("Registro completado","Encuesta creada correctamente");
								        $this->orm->close();    
				 				}else{
				 					$this->displayMessage("Datos obligatorios vacíos", "Debe seleccionar al menos una categoría");
				 				}
			 				}else{
			 					$this->displayMessage("Datos obligatorios vacíos", "Debe ingresar las preguntas completas con sus respectivas opciones");
			 				}
			 			}else{
			 				$this->displayMessage("Caracteres no permitidos", "Alguno de los caracteres ingresados para el campo Retribución no son permitidos");
			 			}						
					}else{
						$this->displayMessage("Fecha inválida","Debe ingresar una fecha de finalización posterior a la actual");
					}
				}else{
					$this->displayMessage("Datos obligatorios vacíos","Debe ingresar al menos una pregunta con sus opciones correspondiente");
				}
			}else{
				$this->displayMessage("Datos obligatorios vacíos","Debe ingresar todos los campos marcados por (*)");
			}
	    }

	    private function validarCategorias(){
			if(is_empty($this->post->interes)) {
					return false;
				}
				return true;
		}

		private function ValidarEmpresasRepresentante(){
			$options['empresa']['lvl2']="by_persona";
			$cod['empresa']['persona']=$_SESSION['persona']['cedula'];

			$this->orm->connect();
			$this->orm->read_data(array("empresa"), $options, $cod);
			$empresas = $this->orm->get_objects("empresa");
			//print_r2($empresas);
			$this->orm->close();

			if(isset($empresas)){
	    		$this->engine->assign('empresas', $empresas);				
				return true;
			}
			return false;
		}   

		private function ValidarPreguntas($preguntas,$opciones){
			foreach ($preguntas as $key => $value) {
				if(is_empty($value)){
					return false;
				}
			}
			
			foreach ($opciones as $key => $value) {
				if(is_empty($value)){
					return false;
				}
			}

			//print_r2($empresas);
			return true;
		}   


		private function displayMessage($msg_type, $msg_content){
			if(strcmp($msg_type, "Registro completado")==0){				
				$msg_icon="check-square";
				$msg_dir=$gvar['l_global']."login.php";
			}elseif (($msg_type == "Empresa no encontrada")||($msg_type == "Acción no permitida")) {
				$msg_icon="warning";
				$msg_dir=$gvar['l_global']."login.php";
			}else{
				$msg_icon="warning";
				$msg_dir="";
			}

			$this->temp_aux = 'message.tpl';
			$this->engine->assign('object',$this->post);
			$this->engine->assign('msg_icon', $msg_icon);
			$this->engine->assign('msg_dir', $msg_dir);			
			$this->engine->assign('msg_type', $msg_type);
			$this->engine->assign('msg_content', $msg_content);
		}

	    public function display()
	    {	
	    	if($_SESSION['persona']['rol']=='representante'){
		    	if($this->ValidarEmpresasRepresentante()){
					/*$this->orm->connect();
					$options['empresa']['lvl2']="by_persona";
					$this->orm->read_data(array("empresa"), $options);
					$canal_inicial=$this->orm->get_objects("canal");
					$this->engine->assign('canal_inicial',$canal_inicial);*/
					//$tz = 'America/Bogota';	
					//echo (new DateTime("now",new DateTimeZone($tz)))->format('Y-m-d H:i:s');

					$this->engine->assign('title', "Crear encuesta");
			    	$this->engine->display('header.tpl');	    	
			        $this->engine->display($this->temp_aux);	        		        
			        $this->engine->display('crear_encuesta.tpl');
			        $this->engine->display('footer.tpl');
		    	}else{
		    		$this->engine->display('header.tpl');	     		
		    		$this->displayMessage("Empresa no encontrada","Para crear encuestas necesita tener al menos una empresa registrada en el sistema");
		    		$this->engine->display($this->temp_aux);
		    		$this->engine->display('footer.tpl');
		    	}
		    }else{
		    		$this->engine->display('header.tpl');	     		
		    		$this->displayMessage("Acción no permitida","Usted no tiene permisos para realizar esta acción");
		    		$this->engine->display($this->temp_aux);
		    		$this->engine->display('footer.tpl');
		    }
	    }

	    public function run()
		{
			try {if (isset($this->get->option)){$this->{$this->get->option}();}}
		        catch (Exception $e) 
					{
						/*$this->error=1; $this->msg_warning=$e->getMessage();
						$this->engine->assign('object',$this->post);
						$this->engine->assign('type_warning',$this->type_warning);
						$this->engine->assign('msg_warning',$this->msg_warning);
						$this->temp_aux = 'message.tpl';*/
						if ((substr ($e->getMessage(),-4))==1062){
							$this->displayMessage("Nombre  ya existe", "La información que ha ingresado ya existe en la base de datos");
						}elseif ((substr ($e->getMessage(),-4))==1452){
							$this->displayMessage("Empresa no válida", "La empresa seleccionada no se encuentra en la base de datos");						
						}else{
							$this->displayMessage("Error", $e->getMessage());
						}					
					}    
        	$this->display();
		}

    }

$call = new c_crear_encuesta();

$call->run();

?>