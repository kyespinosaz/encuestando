<?php
	require('configs/include.php');
	
	class c_responder_encuesta extends super_controller {

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

	    public function display(){
	    	$options['encuesta']['lvl2']="by_codigo";
	    	$cod['encuesta']['codigo']=$_GET["codigo"];

    	   	$options['pregunta']['lvl2']="by_encuesta";
	    	$cod['pregunta']['encuesta']=$_GET["codigo"];

	    	$components['encuesta']['pregunta']=array("e_p");
	    	$this->orm->connect();
			$this->orm->read_data(array("encuesta", "pregunta"),
				$options,$cod);
			$encuesta=$this->orm->get_objects("encuesta", $components);
			print_r2($encuesta);

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