<?php
 
class pregunta extends object_standard{
	//attributes variables
	protected $codigo;
	protected $numero;
	protected $contenido;
	protected $encuesta;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();

	//data about the attributes
	public function metadata(){
		return array("codigo" => array(), "numero" => array(), 
			"contenido" => array(), 
			"encuesta" =>array("foreign_name" => "e_p", 
			"foreign" => "encuesta", "foreign_attribute" => "codigo")); 
	}

	public function primary_key(){
		return array("codigo");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    case "encuesta":
		    	switch($rel_name){
		    		case "e_p";
		    			return array("encuesta");
		    			break;
		    	}

		    default:
			break;
		}
	}
}

?>