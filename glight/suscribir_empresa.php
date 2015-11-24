<?php
	require('configs/include.php');
	
	class c_suscribir_empresa extends super_controller {

		public function suscribir()		
	    {
	        $empresa = new empresa($this->post);

			if($empresa->validarCompletitud()){
				if($empresa->validarCaracteresNIT()){
					if($empresa->validarCaracteresTelefono()){
						if($this->validarRepresentante()){
					        $this->orm->connect();
					        $this->orm->insert_data("normal",$empresa);
					       
					        $this->displayMessage("Registro completado","Empresa suscrita correctamente");
					        $this->orm->close();
		 				}else{
		 					$this->displayMessage("Rol actual no válido", "No tiene permiso para realizar esta acción");
		 				}
					}else{
						$this->displayMessage("Caracteres no permitidos","Alguno de los caracteres ingresados para el campo ‘Teléfono’ no son permitidos");
					}
				}else{
					$this->displayMessage("Caracteres no permitidos","Alguno de los caracteres ingresados para el campo 'NIT' no son permitidos");
				}
			}else{
				$this->displayMessage("Datos obligatorios vacíos","Debe ingresar todos los campos marcados por (*)");
			}
	    }

		private function validarRepresentante(){
			$options['persona']['lvl2']="by_cedula";
			$cod['persona']['cedula']=$_SESSION['persona']['cedula'];
			$this->orm->connect();
			$this->orm->read_data(array("persona"), $options, $cod);
			$persona = $this->orm->get_objects("persona");
			//print_r2($persona);
			$this->orm->close();

			if($persona[0]->get('rol')=="representante"){				
				return true;
			}
			return false;
		}

		private function displayMessage($msg_type, $msg_content){
			if($msg_type == "Registro completado"){				
				$msg_icon="check-square";
				$msg_dir=$gvar['l_global']."login.php";
			}elseif($msg_type == "Acción no permitida"){
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
				$this->engine->assign('title', "Suscribir empresa");
				$this->engine->assign('persona',$_SESSION['persona']['cedula']);
		    	$this->engine->display('header.tpl');	    	
		        $this->engine->display($this->temp_aux);	        		        
		        $this->engine->display('suscribir_empresa.tpl');	        
		        $this->engine->display('footer.tpl');
		    }else{
		    	$this->displayMessage("Acción no permitida","Usted no tiene permisos para realizar esta acción");
		    	$this->engine->display('header.tpl');	    	
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
							$this->displayMessage("Información ya registrada", "El nombre de empresa o NIT que está tratando de registrar ya existe en la base de datos");
						}else{
							echo substr ($e->getMessage(),-4);
						}					
					}    
        	$this->display();
		}
	}

	$call = new c_suscribir_empresa();
	$call->run();

?>