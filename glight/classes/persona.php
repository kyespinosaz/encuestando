<?php
 
class persona extends object_standard{
	//attributes variables
	protected $nombre;
	protected $cedula;
	protected $contrasena;
	protected $sexo;
	protected $ocupacion;
	protected $rol;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata(){
		return array("nombre" => array(), "cedula" => array(), 
			"contrasena" => array(),"sexo" => array(), 
			"ocupacion" => array(), "rol" => array()); 
	}

	public function primary_key(){
		return array("cedula");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    default:
			break;
		}
	}

	public function validarCompletitud(){
			if(strcmp($this->get('rol'), "usuario")==0){
				if(is_empty($this->get('nombre')) || is_empty($this->get('cedula')) || is_empty($this->get('contrasena'))){
					return false;
				}else{
					return true;
				}			
			}
			if(strcmp($this->get('rol'), "representante")==0){
				if(is_empty($this->get('nombre')) || is_empty($this->get('cedula')) || is_empty($this->get('contrasena'))){
					return false;
				}else{
					return true;
				}			
			}

	}

	public function validarCaracteres(){
		if ( !preg_match('/^[0-9]*$/',$this->get('cedula')) ){
				return false;
		}
		return true;
	}
}

?>