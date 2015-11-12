<?php
	require('configs/include.php');
	
	class c_crear_plan extends super_controller {

		public function crear(){
			$plan=new plan($this->post);

			if($this->validarCompletitud($plan)){							
				if($this->validarCaracteres($plan)){
					if($this->validarExistencia($plan)){
						$this->orm->connect();
						$this->orm->insert_data("normal", $plan);

						$this->temp_aux = 'message.tpl';
						$msg_type="Plan creado";
						$msg_content="El plan se ha creado exitosamente en la base de datos";
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

		private function validarCompletitud($plan){
			if(is_empty($plan->get('nombre')) || is_empty($plan->get('costo'))) {
				$this->temp_aux = 'message.tpl';
				$msg_type="Datos obligatorios vacíos";
				$msg_content="Debe ingresar todos los campos marcados por (*)";
				$msg_icon="warning";
				$this->engine->assign('object',$this->post);
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				return false;
			}
			
			return true;

		}

		private function validarCaracteres($plan){
			if(!is_numeric($plan->get('costo'))){
				$this->temp_aux = 'message.tpl';
				$msg_type="Caracteres no permitidos";
				$msg_content="Alguno de los caracteres ingresados para el campo ‘Costo’ no son permitidos";
				$msg_icon="warning";
				$this->engine->assign('object',$this->post);
				$this->engine->assign('msg_dir', "");
				$this->engine->assign('msg_icon', $msg_icon);
				$this->engine->assign('msg_type', $msg_type);
				$this->engine->assign('msg_content', $msg_content);
				return false;
			}
			return true;

		}

		private function validarExistencia($plan){
			$options['plan']['lvl2']="by_name";
			$cod['plan']['nombre']=$plan->get('nombre');

			$this->orm->connect();
			$this->orm->read_data(array("plan"), $options, $cod);
			$plan2 = $this->orm->get_objects("plan",$components);

			if(!is_empty($plan2)){
				$this->temp_aux = 'message.tpl';
				$msg_type="Nombre de plan ya registrado";
				$msg_content="El nombre del plan que está tratando de crear ya existe en la base de datos";
				$msg_icon="warning";
				$this->engine->assign('object',$this->post);
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

	    public function display(){
	    	$this->engine->assign('title', "Registrar usuario");
	    	$this->engine->display('header.tpl');
	    	$this->engine->display($this->temp_aux);
			$this->engine->display('crear_plan.tpl');
			$this->engine->display('footer.tpl');
	    }
		
		public function run(){
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

	$call = new c_crear_plan();
	$call->run();

?>