<?php
	require('configs/include.php');
	
	class c_responder_encuesta extends super_controller {

		private function displayMessage($msg_type, $msg_content){
			if(strcmp($msg_type, "Acción no permitida")==0){
				$msg_icon="warning";
				$msg_dir=$gvar['l_global']."login.php";

			}if(strcmp($msg_type, "Preguntas sin responder")==0){
				$msg_icon="warning";
				$msg_dir="";

			}if(strcmp($msg_type, "Encuesta respondida exitosamente")==0){
				$msg_icon="check-square";
				$msg_dir=$gvar['l_global']."login.php";

			}else{
				$msg_icon="warning";
				$msg_dir=$gvar['l_global']."c_buscar_encuesta.php";
			}

			$this->temp_aux = 'message.tpl';
			$this->engine->assign('object',$this->post);
			$this->engine->assign('msg_icon', $msg_icon);
			$this->engine->assign('msg_dir', $msg_dir);			
			$this->engine->assign('msg_type', $msg_type);
			$this->engine->assign('msg_content', $msg_content);

		}

		private function validarParticipacion($codigo){
			$this->orm->connect();
			$options['beneficio']['lvl2']="by_encuesta";
			$cod['beneficio']['encuesta']=$codigo;
			$this->orm->read_data(array("beneficio"), $options, $cod);
	    	$beneficio = $this->orm->get_objects("beneficio",$components);

	    	if(is_empty($beneficio)){
	    		return true;
	    	}

	    	return false;
	    	$this->orm->close();
		}

		public function responder(){
			$this->orm->connect();
			$codigo=$this->post->encuesta;
			unset($this->post->encuesta);

			$options['pregunta']['lvl2']="num_preguntas_by_encuesta";
			$cod['pregunta']['encuesta']=$codigo;
			$numPreguntas =$this->orm->read_data2(array("pregunta"), $options, $cod);

			$options['encuesta']['lvl2']="by_codigo";
			$cod['encuesta']['codigo']=$codigo;
			$this->orm->read_data(array("encuesta"),$options,$cod);
			$encuesta=$this->orm->get_objects("encuesta", $options,$cod);
			$encuesta=new encuesta($encuesta[0]);

			print_r2($numPreguntas);
			print_r2($this->post);

			if($numPreguntas[0]==sizeof($this->post)){

				foreach ($this->post as $key => $value) {
					$respuesta=new respuesta();
					$respuesta->set('opcion', $value[0]);
					$respuesta->set('usuario', $_SESSION['persona']['cedula']);
					$this->orm->insert_data("normal", $respuesta);
					unset($respuesta);
				}

				$beneficio= new beneficio();				
				$beneficio->set('encuesta', $encuesta->get('codigo'));
				$beneficio->set('tarjeta', $_SESSION['persona']['cedula']);
				$beneficio->set('fecha',date("y-m-d"));
				$beneficio->set('retribucion', $encuesta->get('retribucion'));
				$this->orm->insert_data("normal", $beneficio);
				
				$options['tarjeta']['lvl2']="by_persona";
				$cod['tarjeta']['persona']=$_SESSION['persona']['cedula'];
				$this->orm->read_data(array("tarjeta"),$options,$cod);
				$tarjeta=$this->orm->get_objects("tarjeta", $options,$cod);
				$tarjeta=new tarjeta($tarjeta[0]);

				$tarjeta->set('saldo', ($tarjeta->get('saldo') + $encuesta->get('retribucion')));
				$this->orm->update_data("saldo",$tarjeta);

				//$this->displayMessage('Encuesta respondida exitosamente','¡Gracias por participar!');
				
			}else{
				$this->displayMessage('Preguntas sin responder','Por favor seleccione una opción de respuesta para cada una de las preguntas presente en la encuesta');
				
				$options['encuesta']['lvl2']="by_codigo";
				$cod['encuesta']['codigo']=$encuesta;

				$options['pregunta']['lvl2']="by_encuesta";
				$cod['pregunta']['encuesta']=$encuesta;

				$options['opcion']['lvl2'] = "all";

				$components['encuesta']['pregunta']=array("e_p");
				$components['pregunta']['opcion']= array("p_o");
				$this->orm->read_data(array("encuesta", "pregunta", "opcion"),$options,$cod);
				$encuesta=$this->orm->get_objects("encuesta", $components);
							
				$this->engine->assign('encuesta', $encuesta[0]);
			}

			$this->orm->close();
		}

	    public function display(){
	    	if($_SESSION['persona']['rol']=='usuario'){
		    		if(isset($_GET['codigo'])){
			    		if($this->validarParticipacion($_GET['codigo'])){
				    		$options['encuesta']['lvl2']="by_codigo";
					    	$cod['encuesta']['codigo']=$_GET["codigo"];

				    	   	$options['pregunta']['lvl2']="by_encuesta";
					    	$cod['pregunta']['encuesta']=$_GET["codigo"];

					    	$options['opcion']['lvl2'] = "all";

					    	$components['encuesta']['pregunta']=array("e_p");
					    	$components['pregunta']['opcion']= array("p_o");
					    	$this->orm->connect();
							$this->orm->read_data(array("encuesta", "pregunta", "opcion"),
								$options,$cod);
							$encuesta=$this->orm->get_objects("encuesta", $components);
							
							$this->engine->assign('encuesta', $encuesta[0]);
			    		}else{
			    			$this->displayMessage('Encuesta no disponible','Usted ya ha participado en esta encuesta');
			    		}
		    		}
	    	}else{
	    		$this->displayMessage('Acción no permitida','Usted no tiene permisos para realizar esta acción');
	    	}

	    	$this->engine->assign('title', "Responder encuesta");
	    	$this->engine->display('header.tpl');
	    	$this->engine->display($this->temp_aux);
		    $this->engine->display('responder_encuesta.tpl');
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

	$call = new c_responder_encuesta();
	$call->run();

?>