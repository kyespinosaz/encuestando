<?php
	require('configs/include.php');
	require('modules/m_phpass/PasswordHash.php');
	
	class c_editar_usuario extends super_controller {

		private function displayMessage($msg_type, $msg_content){
			if($msg_type == "Edición completada"){				
				$msg_icon="check-square";
				$msg_dir=$gvar['l_global']."login.php";
			}elseif ($msg_type == "Acción no permitida") {
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

		public function editar(){
			$persona=new persona($this->post);			
			$persona->set("rol","usuario");
			$persona->set("cedula",$_SESSION['persona']['cedula']);

			if($persona->validarCompletitud()){
				if($this->validarIntereses()){
					if($persona->validarCaracteres()){		

						$this->orm->connect();
						$this->orm->update_data("by_cedula",$persona);

						$interes=new interes();
						$interes->set("persona",$_SESSION['persona']['cedula']);
						$this->orm->delete_data("by_persona",$interes);
						
						unset($interes);

						foreach ($this->post->interes as $key => $value) {							
							settype($interes, 'object');
							$interes->tipo = $value;
							$interes->persona= $persona->get('cedula');
							$interes=new interes($interes);
							//print_r2($interes);
							$this->orm->insert_data("normal", $interes);
							unset($interes);
						}

						$_SESSION['persona']['cedula']=$persona->get('cedula');
						$_SESSION['persona']['nombre']=$persona->get('nombre');
						$_SESSION['persona']['sexo']=$persona->get('sexo');
						$_SESSION['persona']['ocupacion']=$persona->get('ocupacion');
						$_SESSION['persona']['rol']=$persona->get('rol');
						$this->session=$_SESSION;

						$this->displayMessage("Edición completada","El usuario ha sido editado correctamente");
						$this->orm->close();						
					}else{
						$this->displayMessage("Caracteres no permitidos","Alguno de los caracteres ingresados para el campo ‘Cédula’ no son permitido");
					}

				}else{
					$this->displayMessage("Datos obligatorios vacíos","Debe seleccionar al menos un interés");
				}

			}else{
				$this->displayMessage("Datos obligatorios vacíos","Debe ingresar todos los campos marcados por (*)");

			}

		}

		private function validarIntereses(){
			if(is_empty($this->post->interes)) {
					return false;
				}
				return true;
		}


	    public function display(){
	    	if($_SESSION['persona']['rol']=='usuario'){
	    		$persona=new persona();			
				$persona->set("nombre",$_SESSION['persona']['nombre']);
				$persona->set("cedula",$_SESSION['persona']['cedula']);
				//$persona->set("contrasena",$_SESSION['persona']['contrasena']);
				$persona->set("sexo",$_SESSION['persona']['sexo']);
				$persona->set("ocupacion",$_SESSION['persona']['ocupacion']);
				//$persona->set("rol",$_SESSION['persona']['rol']);

				$cod['interes']['persona']=$_SESSION['persona']['cedula'];
				$options['interes']['lvl2']="by_persona";
				$this->orm->connect();
				$this->orm->read_data(array("interes"),$options,$cod);
				$interes = $this->orm->get_objects("interes");
		        $this->orm->close();
		        //print_r2($interes);

				$this->engine->assign('persona', $persona);
				$this->engine->assign('interes', $interes);
		    	$this->engine->assign('title', "Editar usuario");
		    	$this->engine->display('header.tpl');
		    	$this->engine->display($this->temp_aux);
		        $this->engine->display('editar_usuario.tpl');
		        $this->engine->display('footer.tpl');
		    }else{
		    		$this->engine->display('header.tpl');	     		
		    		$this->displayMessage("Acción no permitida","Usted no tiene permisos para realizar esta acción");
		    		$this->engine->display($this->temp_aux);
		    		$this->engine->display('footer.tpl');
		    }
	    }
		
		public function run(){
			try {if (isset($this->get->option)){$this->{$this->get->option}();}}
		    
		    catch (Exception $e){
				/*$this->error=1; $this->msg_warning=$e->getMessage();
				$this->engine->assign('object',$this->post);
				$this->engine->assign('type_warning',$this->type_warning);
				$this->engine->assign('msg_warning',$this->msg_warning);
				$this->temp_aux = 'message.tpl';*/									
				if ((substr ($e->getMessage(),-4))==1062){
					$this->displayMessage("Información ya registrada", "El nombre de usuario o cédula que está tratando de registrar ya existe en la base de datos");
				}else{
					$this->displayMessage("Error", $e->getMessage());
				}
			}   
        	$this->display();
		}
	}

	$call = new c_editar_usuario();
	$call->run();

?>