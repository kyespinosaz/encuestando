<?php
	
	class empresa extends object_standard {

		//attribute variables
		protected $nit;
		protected $nombre;
		protected $direccion;
		protected $telefono;
		protected $persona;

		//components
		var $components = array();

		//auxiliars for primary key and for files
		var $auxiliars = array(); 
		
		//data about the attributes
		public function metadata(){
			return array("nit" => array(), "nombre" => array(), "direccion" => array(), "telefono" => array(),
					"persona"=> array("foreign_name" => "p_e", "foreign" => "persona", "foreign_attribute" => "cedula"));	
		}

		public function primary_key(){
			return array("nit");
		}

		public function relational_keys($class, $rel_name)
		{
			switch ($class)
			{
				case "persona":
				switch ($rel_name)
				{
					case "p_e":
						return array("persona");
						break;
				}
				break;

				default;
				break;
			}
		}

	}
?>