<?php
	require('configs/include.php');
	
	class c_buscar_encuesta extends super_controller {

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
	    	if(isset($consulta)){
	    		
	    	}else{
	    		$this->orm->connect();
	    		$options['interes']['lvl2']="by_persona";
	    		$cod['interes']['persona']=$_SESSION['persona']['cedula'];
	    		$this->orm->read_data(array("interes"), $options, $cod);
	    		$interes = $this->orm->get_objects("interes",$components);
	    		
	    		$options['encuesta']['lvl2']="by_tipo";
	    		$cod['encuesta']['tipo']=$interes;
				$this->orm->read_data(array("encuesta"), $options, $cod);
				$encuestas= $this->orm->get_objects("encuesta");
	    	}
	    	$this->engine->assign('encuestas', $encuestas);
	    	$this->engine->assign('title', "Buscar encuesta");
	    	$this->engine->display('header.tpl');
	    	$this->engine->display($this->temp_aux);
	        $this->engine->display('buscar_encuesta.tpl');
	        $this->engine->display('footer.tpl');

	    }
		
		public function run(){ 
        	$this->display();
		}
	}

	$call = new c_buscar_encuesta();
	$call->run();

?>