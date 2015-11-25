<?php
 
class encuesta extends object_standard{
	//attributes variables
	protected $codigo;
	protected $nombre;
	protected $retribucion;
	protected $fechaPublicacion;
	protected $fechaFinalizacion;
	protected $empresa;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();

	//data about the attributes
	public function metadata(){
		return array("codigo" => array(), "nombre" => array(), 
			"retribucion" => array(), "fechaPublicacion" => array(),
			"fechaFinalizacion" => array(),
			"empresa" =>array("foreign_name" => "e_e", 
			"foreign" => "empresa", "foreign_attribute" => "nit")); 
	}

	public function primary_key(){
		return array("codigo");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    case "empresa":
		    	switch($rel_name){
		    		case "e_e";
		    			return array("empresa");
		    			break;
		    	}

		    default:
			break;
		}
	}

	public function validarCompletitud(){				
			if(is_empty($this->get('nombre')) || is_empty($this->get('retribucion')) || is_empty($this->get('fechaPublicacion')) || is_empty($this->get('fechaFinalizacion')) || is_empty($this->get('empresa'))){
				return false;
			}
			return true;
	}

	public function validarFecha(){
		return (strtotime($this->get('fechaPublicacion'))<strtotime($this->get('fechaFinalizacion')));		
	}

	public function validarCaracteres(){
		if ( !preg_match('/^[0-9]*$/',$this->get('retribucion')) ){
				return false;
		}
		return true;
	}
}
?>