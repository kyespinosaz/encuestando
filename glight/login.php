<?php

require('configs/include.php');
require('modules/m_phpass/PasswordHash.php');

class c_login extends super_controller {
	
	public function display()
	{
		$this->engine->assign('title', "Log in");
		if(!is_empty($this->session)){
			$this->engine->display('header.tpl');
		}
		$this->engine->display($this->temp_aux);
		$this->engine->display('inicio.tpl');
        $this->engine->display('footer.tpl');            
	}


    private function validarCompletitud(){
		if(is_empty($this->post->nombre) || is_empty($this->post->contrasena))
		{
		    $this->temp_aux = 'message.tpl';
			$msg_icon="warning";
			$msg_type="Datos obligatorios vacíos";
			$msg_content="Debe ingresar todos los campos marcados por (*)";
			$this->engine->assign('msg_icon', $msg_icon);
			$this->engine->assign('msg_type', $msg_type);
			$this->engine->assign('msg_content', $msg_content);
			return false;
		}
		return true;
    }

    private function validarPersona(){
    	$cod['persona']['contrasena']=$this->post->contrasena;
		$cod['persona']['nombre']=$this->post->nombre;
		$options['persona']['lvl2']="one_login";
		$this->orm->connect();
		$this->orm->read_data(array("persona"),$options,$cod);
		$persona = $this->orm->get_objects("persona");
        $this->orm->close();
		
		if (empty($persona[0]))
		{
		    $this->temp_aux = 'message.tpl';
			$msg_icon="warning";
			$msg_type="Información inexistente";
			$msg_content="La información que ha ingresado no existe en la base de datos";
			$this->engine->assign('msg_icon', $msg_icon);
			$this->engine->assign('msg_type', $msg_type);
			$this->engine->assign('msg_content', $msg_content);
			return false;
		}
		else
		{
			$_SESSION['persona']['cedula']=$persona[0]->get('cedula');
			$_SESSION['persona']['nombre']=$persona[0]->get('nombre');
			$_SESSION['persona']['sexo']=$persona[0]->get('sexo');
			$_SESSION['persona']['ocupacion']=$persona[0]->get('ocupacion');
			$_SESSION['persona']['rol']=$persona[0]->get('rol');
			$this->session=$_SESSION;
			return true;
		}
    }

	
	public function login()
	{
		if($this->validarCompletitud()){
			$this->validarPersona();
		}
	}
	
	
	
	
	public function run()
	{
		try 
		{
            if (isset($this->get->option))
            {
                $this->{$this->get->option}();
            }
		}
		catch (Exception $e) 
		{
            $this->error=1; 
            $this->msg_warning=$e->getMessage(); 
            $this->temp_aux = 'message.tpl';
            $this->engine->assign('type_warning',$this->type_warning); 
            $this->engine->assign('msg_warning',$this->msg_warning);
		}
		$this->display();
	}

	public function logout()
	{
		session_destroy();
		unset($this->session);
        header('Location: login.php');
	}

}
$call = new c_login();
$call->run();
?>