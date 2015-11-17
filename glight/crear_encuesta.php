<?php
	require('configs/include.php');
	
	class c_crear_encuesta extends super_controller {	    

	    public function display()
	    {	    	
			$this->engine->assign('title', "Suscribir empresa");

			$this->engine->assign('persona',$_SESSION['persona']['cedula']);
	    	$this->engine->display('header.tpl');	    	
	        $this->engine->display($this->temp_aux);	        		        
	        $this->engine->display('suscribir_empresa.tpl');	        
	        $this->engine->display('footer.tpl');
	    }

    }

$call = new c_suscribir_empresa();
$call->run();

?>