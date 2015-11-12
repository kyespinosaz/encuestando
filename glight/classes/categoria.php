<?php
 
class categoria extends object_standard{
	//attributes variables
	protected $tipo;
	protected $encuesta;

	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();

	//data about the attributes
	public function metadata(){
		return array("tipo" => array(), 
			"encuesta" =>array("foreign_name" => "e_c", 
			"foreign" => "encuesta", "foreign_attribute" => "codigo")); 
	}

	public function primary_key(){
		return array("tipo", "encuesta");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    case "encuesta":
		    	switch($rel_name){
		    		case "e_c";
		    			return array("encuesta");
		    			break;
		    	}

		    default:
			break;
		}
	}
}

?>