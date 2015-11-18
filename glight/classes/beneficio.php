<?php
 
class beneficio extends object_standard{
	//attributes variables
	protected $encuesta;
	protected $tarjeta;
	protected $fecha;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();

	//data about the attributes
	public function metadata(){
		return array("encuesta" =>array("foreign_name" => "e_b", 
			"foreign" => "encuesta", "foreign_attribute" => "codigo"),
			"tarjeta" =>array("foreign_name" => "t_b", 
			"foreign" => "tarjeta", "foreign_attribute" => "persona"),
			"fecha" => array()); 
	}

	public function primary_key(){
		return array("encuesta, tarjeta");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    case "encuesta":
		    	switch($rel_name){
		    		case "e_b";
		    			return array("encuesta");
		    			break;
		    	}

		    	case "tarjeta":
		    	switch($rel_name){
		    		case "t_b";
		    			return array("tarjeta");
		    		break;
		    	}

		    default:
			break;
		}
	}
}

?>