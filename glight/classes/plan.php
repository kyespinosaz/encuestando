<?php
 
class plan extends object_standard{
	//attributes variables
	protected $codigo;
	protected $nombre;
	protected $costo;
	protected $vigencia;
		
	//components
	var $components = array();
	
	//auxiliars for primary key and for files
	var $auxiliars = array();
	
	//data about the attributes
	public function metadata(){
		return array("codigo" => array(), "nombre" => array(), 
			"costo" => array(),"vigencia" => array()); 
	}

	public function primary_key(){
		return array("codigo");
	}
	
	public function relational_keys($class, $rel_name){
		switch($class){		
		    default:
			break;
		}
	}
}

?>