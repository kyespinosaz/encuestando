<?php
 
class opcion extends object_standard{
	//attributes variables
	protected $codigo;
	protected $numero;
	protected $contenido;
	protected $pregunta;
	
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	//data about the attributes
	public function metadata(){
		return array("codigo" => array(), "numero" => array(), 
			"contenido" => array(), 
			"pregunta" =>array("foreign_name" => "p_o", 
			"foreign" => "pregunta", "foreign_attribute" => "codigo")); 
	}
	public function primary_key(){
		return array("codigo");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    case "pregunta":
		    	switch($rel_name){
		    		case "p_o";
		    			return array("pregunta");
		    			break;
		    	}
		    default:
			break;
		}
	}
}
?>