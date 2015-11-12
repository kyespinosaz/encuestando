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
}

?>