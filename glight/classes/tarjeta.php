<?php
 
class tarjeta extends object_standard{
	//attributes variables
	protected $saldo;
	protected $persona;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();

	//data about the attributes
	public function metadata(){
		return array("saldo" => array(), "persona" =>array("foreign_name" => "p_t", 
			"foreign" => "persona", "foreign_attribute" => "cedula")); 
	}

	public function primary_key(){
		return array("persona");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    case "persona":
		    	switch($rel_name){
		    		case "p_t";
		    			return array("persona");
		    			break;
		    	}

		    default:
			break;
		}
	}
}

?>