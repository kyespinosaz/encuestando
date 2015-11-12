<?php
 
class interes extends object_standard{
	//attributes variables
	protected $codigo;
	protected $tipo;
	protected $persona;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();

	//data about the attributes
	public function metadata(){
		return array("codigo" => array(), "tipo" => array(), 
			"persona" =>array("foreign_name" => "p_i", 
			"foreign" => "persona", "foreign_attribute" => "cedula")); 
	}

	public function primary_key(){
		return array("codigo");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    case "persona":
		    	switch($rel_name){
		    		case "p_i";
		    			return array("persona");
		    			break;
		    	}

		    default:
			break;
		}
	}
}

?>