<?php
	require('configs/include.php');
	
	class c_suscribir_empresa extends super_controller {

		public function suscribir()		
	    {
	        $empresa = new empresa($this->post);

			if($this->validarCompletitud($empresa)){
				if($this->validarCaracteres($empresa)){
					if($this->validarExistencia($empresa)){
						if($this->validarRepresentante()){

					        $this->orm->connect();
					        $this->orm->insert_data("normal",$empresa);
					       
					        
					        $this->temp_aux = 'message.tpl';
							$msg_type="Registro completado";
							$msg_icon="check-square";
							$msg_content="Empresa suscrita correctamente";
							$msg_dir=$gvar['l_global']."login.php";
							$this->engine->assign('msg_dir', $msg_dir);
							$this->engine->assign('msg_icon', $msg_icon);
							$this->engine->assign('msg_type', $msg_type);
							$this->engine->assign('msg_content', $msg_content);
		 					$this->orm->close();
		 				}
					}
				}
			}
	    }


	    private function validarCompletitud($empresa){
	    	if(is_empty($empresa->get('nombre'))){
	    		$this->temp_aux = 'message.tpl';
	    		$this->engine->assign('object',$this->post);
	    		$msg_icon="warning";
				$msg_type="Campos vacíos: ";
				$msg_content="Debe ingresar un nombre";
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				return false;
			}

			if(is_empty($empresa->get('nit'))){
	    		$this->temp_aux = 'message.tpl';
	    		$this->engine->assign('object',$this->post);
	    		$msg_icon="warning";
				$msg_type="Campos vacíos: ";
				$msg_content="Debe ingresar un NIT";
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				return false;
			}

			if(is_empty($empresa->get('direccion'))){
	    		$this->temp_aux = 'message.tpl';
	    		$this->engine->assign('object',$this->post);
	    		$msg_icon="warning";
				$msg_type="Campos vacíos: ";
				$msg_content="Debe ingresar una dirección";
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				return false;
			}

			if(is_empty($empresa->get('telefono'))){
	    		$this->temp_aux = 'message.tpl';
	    		$this->engine->assign('object',$this->post);
	    		$msg_icon="warning";
				$msg_type="Campos vacíos: ";
				$msg_content="Debe ingresar un teléfono";
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				return false;
			}

			return true;
		}

		private function validarCaracteres($empresa){
			if (!preg_match('/^[0-9]*$/',$empresa->get('nit'))){
				$this->temp_aux = 'message.tpl';
				$this->engine->assign('object',$this->post);
				$msg_icon="warning";
				$msg_type="Caracteres no permitidos";
				$msg_content="Algunos de los caracteres ingresados para el campo NIT no son permitidos";
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				return false;
			}

			if (!preg_match('/^[0-9.-]*$/',$empresa->get('telefono'))){
				$this->temp_aux = 'message.tpl';
				$this->engine->assign('object',$this->post);
				$msg_icon="warning";
				$msg_type="Caracteres no permitidos";
				$msg_content="Algunos de los caracteres ingresados para el campo teléfono no son permitidos";
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				return false;
			}

			return true;
		}

		private function validarExistencia($empresa){
			$options['empresa']['lvl2']="by_nit";
			$cod['empresa']['nit']=$empresa->get('nit');

			$this->orm->connect();
			$this->orm->read_data(array("empresa"), $options, $cod);
			$empresa2 = $this->orm->get_objects("empresa",$components);

			if(!is_empty($empresa2)){
				$this->temp_aux = 'message.tpl';
				$this->engine->assign('object',$this->post);
				$msg_icon="warning";
				$msg_type="NIT ya registrado";
				$msg_content="El NIT que está tratando de registrar ya existe en la base de datos";
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				$this->orm->close();
				return false;
			}
			$this->orm->close();
			return true;
		}

		private function validarRepresentante(){
			$options['persona']['lvl2']="by_cedula";
			$cod['persona']['cedula']=$_SESSION['persona']['cedula'];

			$this->orm->connect();
			$this->orm->read_data(array("persona"), $options, $cod);
			$persona = $this->orm->get_objects("persona");

			if(strcmp($persona[0]->get('rol'),"representante")!==0){
				$this->temp_aux = 'message.tpl';
				$this->engine->assign('object',$this->post);
				$msg_icon="warning";
				$msg_type="Rol actual no válido";
				$msg_content="No tiene permiso para realizar esta acción";
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				$this->orm->close();
				return false;
			}
			$this->orm->close();
			return true;
		}

	    public function display()
	    {	    	
			$this->engine->assign('title', "Suscribir empresa");

			$this->engine->assign('persona',$_SESSION['persona']['cedula']);
	    	$this->engine->display('header.tpl');	    	
	        $this->engine->display($this->temp_aux);	        		        
	        $this->engine->display('suscribir_empresa.tpl');	        
	        $this->engine->display('footer.tpl');
	    }
		
		public function run()
		{
			try {if (isset($this->get->option)){$this->{$this->get->option}();}}
		        catch (Exception $e) 
				{
					$this->error=1; $this->msg_warning=$e->getMessage();
					$this->engine->assign('object',$this->post);
					$this->engine->assign('type_warning',$this->type_warning);
					$this->engine->assign('msg_warning',$this->msg_warning);
					$this->temp_aux = 'message.tpl';					
				}    
        $this->display();

		}
	}

	$call = new c_suscribir_empresa();
	$call->run();

?>