<?php
 
class respuesta extends object_standard{
	//attributes variables
	protected $codigo;
	protected $opcion;
	protected $usuario;

	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();

	//data about the attributes
	public function metadata(){
		return array("codigo" => array(),
			"opcion" =>array("foreign_name" => "o_r", 
			"foreign" => "opcion", "foreign_attribute" => "codigo"),
			"usuario" =>array("foreign_name" => "u_r", 
			"foreign" => "persona", "foreign_attribute" => "cedula")); 
	}

	public function primary_key(){
		return array("codigo");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    case "opcion":
		    	switch($rel_name){
		    		case "o_r";
		    			return array("opcion");
		    		break;
		    	}
		    case "usuario":
		    	switch($rel_name){
		    		case "u_r";
		    			return array("usuario");
		    		break;
		    	}

		    default:
			break;
		}
	}
}

?>