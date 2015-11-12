<?php
	require('configs/include.php');
	require('modules/m_phpass/PasswordHash.php');
	
	class c_registrar_representante extends super_controller {


		private function displayMessage($msg_type, $msg_content){
			if(strcmp($msg_type, "Registro completado")==0){
				$this->engine->assign('red',1);
				$msg_icon="check-square";
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

		public function RegistrarRepresentante(){
			$persona=new persona($this->post);			
			$persona->set("rol","representante");

			if($persona->validarCompletitud()){
					if($persona->validarCaracteres()){
						try{
							$this->orm->connect();
							$this->orm->insert_data("normal", $persona);
							$this->displayMessage("Registro completado","El representante se ha registrado exitosamente en la base de datos");
							$this->orm->close();

						}catch(Exception $e){

							if ((substr ($e->getMessage(),-4))==1062){
								$this->displayMessage("Información ya registrada", "El nombre de usuario o cédula que está tratando de registrar ya existe en la base de datos");
							}else{
								echo substr ($e->getMessage(),-4);
							}
							
						}
						
					}else{
						$this->displayMessage("Caracteres no permitidos","Alguno de los caracteres ingresados para el campo ‘Cédula’ no son permitido");
					}

				}else{
				$this->displayMessage("Datos obligatorios vacíos","Debe ingresar todos los campos marcados por (*)");

			}

		}



	    public function display(){
	    	$this->engine->assign('title', "Registrar representante");
	    	$this->engine->display('header.tpl');
	    	$this->engine->display($this->temp_aux);
	        $this->engine->display('registrar_representante.tpl');
	        $this->engine->display('footer.tpl');

	    }
		
		public function run(){
			try {if (isset($this->get->option)){$this->{$this->get->option}();}}
		    
		    catch (Exception $e){
					$this->error=1; $this->msg_warning=$e->getMessage();
					$this->engine->assign('object',$this->post);
					$this->engine->assign('type_warning',$this->type_warning);
					$this->engine->assign('msg_warning',$this->msg_warning);
					$this->temp_aux = 'message.tpl';					
			}   
 
        	$this->display();
		}
	}	
	

	$call = new c_registrar_representante();
	$call->run();

?>