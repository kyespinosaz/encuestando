<?php
/**
 * Project:     Framework G - G Light
 * File:        db.php
 * 
 * For questions, help, comments, discussion, etc., please join to the
 * website www.frameworkg.com
 * 
 * @link http://www.frameworkg.com/
 * @copyright 2013-02-07
 * @author Group Framework G  <info at frameworkg dot com>
 * @version 1.2
 */
class db
{
    var $server = C_DB_SERVER; //DB server
	var $user = C_DB_USER; //DB user
    var $pass = C_DB_PASS; //DB password
	var $db = C_DB_DATABASE_NAME; //DB database name
	var $limit = C_DB_LIMIT; //DB limit of elements by page
	var $cn;
	var $numpages;
	
	public function db(){}
	
	//connect to database
	public function connect()
	{
		$this->cn = mysqli_connect($this->server, $this->user, $this->pass);
		if(!$this->cn) {die("Failed connection to the database: ".mysqli_error($this->cn));}
		if(!mysqli_select_db($this->cn,$this->db)) {die("Unable to communicate with the database $db: ".mysqli_error($this->cn));}
		mysqli_query($this->cn,"SET NAMES utf8");
	}
	
	//function for doing multiple queries
	public function do_operation($operation, $class = NULL)
	{
		$result = mysqli_query($this->cn, $operation) ;
		if(!$result) {$this->throw_sql_exception($class);}	
	}
	
	//function for obtain data from db in object form
	private function get_data($operation)
	{		
		$data = array(); 
		$result = mysqli_query($this->cn, $operation) or die(mysqli_error($this->cn));
		while ($row = mysqli_fetch_object($result))
		{
			array_push($data, $row);
		}
		return $data;
	}
	
	//throw exception to web document
	private function throw_sql_exception($class)
    {
		$errno = mysqli_errno($this->cn); $error = mysqli_error($this->cn);
		$msg = $error."<br /><br /><b>Error number:</b> ".$errno;
        throw new Exception($msg);
    }
	
	//for avoid sql injections, this functions cleans the variables
	private function escape_string(&$data)
	{
		if(is_object($data))
		{
			foreach ($data->metadata() as $key => $attribute)
			{if(!is_empty($data->get($key))){$data->set($key,mysqli_real_escape_string($this->cn,$data->get($key)));}}
		}
		else if(is_array($data))
		{
			foreach ($data as $key => $value) 
			{if(!is_array($value)){$data[$key]=mysqli_real_escape_string($this->cn,$value);}}
		}
	}
	
	//function for add data to db
	public function insert($options,$object) 
	{
		switch($options['lvl1'])
		{																																																																																													
			case "persona":
			switch($options['lvl2']){
				case "normal":
					$this->escape_string($object);
					$nombre=$object->get('nombre');
					$cedula=$object->get('cedula');
      				$hasher = new PasswordHash(8, FALSE);
					$contrasena = $hasher->HashPassword($object->get('contrasena'));
					unset($hasher);
					$sexo=$object->get('sexo');
					$ocupacion=$object->get('ocupacion');
					$rol=$object->get('rol');
					$this->do_operation("INSERT INTO persona (nombre,cedula,contrasena,sexo,ocupacion,rol) VALUES
						('$nombre', '$cedula', '$contrasena', '$sexo', '$ocupacion', '$rol');");
					break;
			}
			break;
			case "interes":
			switch($options['lvl2']){
				case "normal":
					$this->escape_string($object);
					$tipo=$object->get('tipo');
					$persona=$object->get('persona');
					$this->do_operation("INSERT INTO interes (tipo, persona) VALUES
						('$tipo', '$persona');");
					break;
			}
			break;
			case "categoria":
			switch($options['lvl2']){
				case "normal":
					$this->escape_string($object);
					$tipo=$object->get('tipo');
					$encuesta=$object->get('encuesta');
					$this->do_operation("INSERT INTO categoria (tipo, encuesta) VALUES
						('$tipo', '$encuesta');");
					break;
			}
			break;
			case "plan":
			switch ($options['lvl2']) {
				case 'normal':
					$this->escape_string($object);
					$nombre=$object->get('nombre');
					$costo=$object->get('costo');
					$vigencia=$object->get('vigencia');
					$this->do_operation("INSERT INTO plan (nombre,costo,vigencia) VALUES
						('$nombre', '$costo', '$vigencia');");
					break;
			}
			break;
			case "tarjeta":
			switch ($options['lvl2']) {
				case 'normal':
					$this->escape_string($object);
					$persona=$object->get('persona');
					$this->do_operation("INSERT INTO tarjeta (saldo, persona) VALUES
						(0, '$persona');");
					break;
			}
			break;
			case "empresa":
			switch($options['lvl2'])
			{
				case "normal":
					$this->escape_string($object);
					$nit=$object->get('nit');
					$nombre=$object->get('nombre');
					$direccion=$object->get('direccion');
					$telefono=$object->get('telefono');
					$persona=$object->get('persona');
					$this->do_operation("INSERT INTO empresa (nit,nombre,direccion,telefono,persona) VALUES
						('$nit', '$nombre','$direccion', '$telefono', '$persona');");
					break;					
			}
			break;
			case "encuesta":
			switch($options['lvl2'])
			{
				case "normal":
					$this->escape_string($object);
					$nombre=$object->get('nombre');
					$retribucion=$object->get('retribucion');
					$fechaPublicacion=$object->get('fechaPublicacion');
					$fechaFinalizacion=$object->get('fechaFinalizacion');
					$empresa=$object->get('empresa');
					$this->do_operation("INSERT INTO encuesta (nombre,retribucion,fechaPublicacion,fechaFinalizacion,empresa) VALUES
						('$nombre', '$retribucion','$fechaPublicacion', '$fechaFinalizacion', '$empresa');");
					break;					
			}
			break;
			case "pregunta":
			switch($options['lvl2'])
			{
				case "normal":
					$this->escape_string($object);
					$numero=$object->get('numero');
					$contenido=$object->get('contenido');
					$encuesta=$object->get('encuesta');
					$this->do_operation("INSERT INTO pregunta (numero,contenido,encuesta) VALUES
						('$numero', '$contenido','$encuesta');");
					break;					
			}
			break;
			case "opcion":
			switch($options['lvl2'])
			{
				case "normal":
					$this->escape_string($object);
					$numero=$object->get('numero');
					$contenido=$object->get('contenido');
					$pregunta=$object->get('pregunta');
					$this->do_operation("INSERT INTO opcion (numero,contenido,pregunta) VALUES
						('$numero', '$contenido','$pregunta');");
					break;					
			}
			break;


			case "respuesta":
			switch($options['lvl2'])
			{
				case "normal":
					$this->escape_string($object);
					$opcion=$object->get('opcion');
					$usuario=$object->get('usuario');
					$this->do_operation("INSERT INTO respuesta (opcion, usuario) VALUES
						('$opcion', '$usuario');");
				break;					
			}
			break;
			
			case "beneficio":
			switch($options['lvl2'])
			{
				case "normal":
					$this->escape_string($object);
					$encuesta=$object->get('encuesta');
					$tarjeta=$object->get('tarjeta');
					$fecha=$object->get('fecha');
					$retribucion=$object->get('retribucion');
					$this->do_operation("INSERT INTO beneficio (encuesta, tarjeta, fecha, retribucion) VALUES
						('$encuesta', '$tarjeta', '$fecha', $retribucion);");
				break;					
			}
			break;
			
			default: break;
		}
	}
	
	//function for edit data from db
	public function update($options,$object) 
	{
		switch($options['lvl1'])
		{																																																																																																		
			case "persona":
			switch($options['lvl2']){
				case "by_cedula":
					$this->escape_string($object);					
					$nombre=$object->get('nombre');
					$cedula=$object->get('cedula');				
					$hasher = new PasswordHash(8, FALSE);
					$contrasena = $hasher->HashPassword($object->get('contrasena'));
					unset($hasher);
					$sexo=$object->get('sexo');
					$ocupacion=$object->get('ocupacion');
					$rol=$object->get('rol');
					$this->do_operation("UPDATE persona SET nombre='$nombre',contrasena='$contrasena',sexo='$sexo',ocupacion='$ocupacion' ,rol='$rol'  where cedula='$cedula'"); 
					break;
			}
			break;

			case "tarjeta":
			switch($options['lvl2'])
			{
				case "saldo":
						$this->escape_string($object);
						$persona=$object->get('persona');
						$saldo=$object->get('saldo');
						$this->do_operation("UPDATE tarjeta set saldo=$saldo WHERE persona='$persona';");
				break;
			}
			break;
			
			default: break;
		}
	}
	
	//function for delete data from db
	public function delete($options,$object)
	{
		switch($options['lvl1'])
		{																																																																																												
			case "interes":
			switch($options['lvl2'])
			{
				case "by_persona":
					$this->escape_string($object);
					$persona=$object->get('persona');									
					$this->do_operation("DELETE FROM interes WHERE persona='$persona'"); 
				break;			
			}			
			break;
			
			default: break;			  
		}
	}
	
	//function that returns an array with data from a operation
	public function select($option,$data){
		$info = array();
		switch($option['lvl1'])
		{
			case "persona":
			switch($option['lvl2']){
				case "all": 
					$info=$this->get_data("SELECT * FROM persona;");
				break;
				case "by_cedula":
					$this->escape_string($data);
					$cedula=$data['cedula'];
					$info=$this->get_data("SELECT * FROM persona WHERE cedula=$cedula;");
				break;
				case "by_name":
					$this->escape_string($data);
					$nombre=$data['nombre'];
					$info=$this->get_data("SELECT * FROM persona WHERE nombre='$nombre';");
				break;
				case "one_login":
					$nombre = mysqli_real_escape_string($this->cn, $data['nombre']);
					$contrasena = $data['contrasena'];
					$result = $this->get_data("SELECT nombre, contrasena FROM persona WHERE nombre='$nombre';");
					$hasher = new PasswordHash(8, FALSE);
					if ($hasher->CheckPassword($contrasena, $result[0]->contrasena))
						$info = $this->get_data("SELECT * FROM persona WHERE nombre = '$nombre';");
					unset($hasher);
                break;
			}
			break;

			case "tarjeta":
			switch ($option['lvl2']) {
				case 'by_persona':
						$this->escape_string($data);
						$persona=$data['persona'];
						$info=$this->get_data("SELECT * FROM tarjeta WHERE persona=$persona;");
				break;
			}

			case "plan":
			switch ($option['lvl2']) {
				case 'all':
						$info=$this->get_data("SELECT * FROM plan;");
				break;
				
				case 'by_name':
					$this->escape_string($data);
					$nombre=$data['nombre'];
					$info=$this->get_data("SELECT * FROM plan WHERE nombre='$nombre';");
				break;
			}
			case "empresa":
			switch($option['lvl2']){
				case "all": 
					$info=$this->get_data("SELECT * FROM empresa;");
				break;
				case "by_nit":
					$this->escape_string($data);
					$nit=$data['nit'];
					$info=$this->get_data("SELECT * FROM empresa WHERE nit=$nit;");
				break;
				case "by_persona":
					$this->escape_string($data);
					$persona=$data['persona'];
					$info=$this->get_data("SELECT e.nit, e.nombre, e.direccion, e.telefono, e.persona FROM empresa e, persona p WHERE p.cedula=e.persona AND e.persona=$persona;");
				break;
				case "by_persona_nit":
					$this->escape_string($data);
					$persona=$data['persona'];
					$nit=$data['empresa'];
					$info=$this->get_data("SELECT e.nit, e.nombre, e.direccion, e.telefono, e.persona FROM empresa e, persona p WHERE p.cedula=e.persona AND e.persona=$persona AND e.nit=$nit;");
				break;
			}
			break;
			case "interes":
			switch($option['lvl2']){
				case "by_persona":
					$this->escape_string($data);
					$persona=$data['persona'];
					$info=$this->get_data("SELECT * FROM interes WHERE persona='$persona';");
				break;
			}
			case "encuesta":
			switch ($option['lvl2']) {
				case "all": 
					$info=$this->get_data("SELECT * FROM encuesta;");
				break;

				case "by_codigo":
					$this->escape_string($data);
					$codigo=$data['codigo'];
					$info=$this->get_data("SELECT * FROM encuesta WHERE codigo=$codigo;");
				break;

				case "by_nombre":
					$this->escape_string($data);
					$nombre=$data['nombre']; 
					$info=$this->get_data("SELECT * FROM encuesta WHERE nombre='$nombre';");
				break;

				case "by_tipo":
					$this->escape_string($data);
					$tipo=$data['tipo'];
					settype($tipos, 'array');
					foreach ($tipo as $key => $value) {
						array_push($tipos, $value->get('tipo'));
						
					}
					$in="'" . implode("', '", $tipos) . "'";
					$info=$this->get_data("SELECT * FROM categoria WHERE tipo IN ($in);");
					settype($encuestas, 'array');
					foreach ($info as $key => $value) {
						if(!in_array($value->encuesta, $encuestas)){
							array_push($encuestas, $value->encuesta);
						}
						
					}
					$in="'" . implode("', '", $encuestas) . "'";
					$info=$this->get_data("SELECT * FROM encuesta WHERE codigo IN ($in);");
				break;

				case "by_consulta":
					$this->escape_string($data);
					$consulta=$data['consulta'];
					$trozos=explode(" ",$consulta); 
   					$numero=count($trozos);
   					if($numero==1){
   						$info=$this->get_data("SELECT * FROM encuesta WHERE nombre LIKE '%$consulta%'");
   					}else{
   						$info=$this->get_data("SELECT *, MATCH (nombre) AGAINST ('$consulta') AS puntuacion FROM encuesta 
   							WHERE MATCH (nombre) AGAINST ('$consulta') ORDER BY puntuacion DESC LIMIT 50;");
   					}
				break;
			}

			case "pregunta":
			switch ($option['lvl2']) {
				case 'all':
						$info=$this->get_data("SELECT * FROM pregunta;");
				break;
				
				case 'by_cod':
					$this->escape_string($data);
					$codigo=$data['codigo'];
					$info=$this->get_data("SELECT * FROM pregunta WHERE codigo='$codigo';");
				break;
				case 'by_encuesta':
					$this->escape_string($data);
					$encuesta=$data['encuesta'];
					$info=$this->get_data("SELECT * FROM pregunta WHERE encuesta=$encuesta;");
				break;
				case 'by_encuesta_numero':
					$this->escape_string($data);
					$encuesta=$data['encuesta'];
					$numero=$data['numero'];
					$info=$this->get_data("SELECT * FROM pregunta WHERE encuesta=$encuesta AND numero=$numero;");
				break;
			}

			case "opcion":
			switch ($option['lvl2']) {
				case 'all':
						$info=$this->get_data("SELECT * FROM opcion;");
				break;
				
				case 'by_cod':
					$this->escape_string($data);
					$codigo=$data['codigo'];
					$info=$this->get_data("SELECT * FROM opcion WHERE codigo='$codigo';");
				break;

				case 'by_pregunta':
					$this->escape_string($data);
					$encuesta=$data['pregunta'];
					$info=$this->get_data("SELECT * FROM opcion WHERE pregunta=$pregunta;");
				break;
			}			
			default: break;

			case "beneficio":
				switch($option['lvl2']){
					case "by_encuesta":
						$this->escape_string($data);
						$encuesta=$data['encuesta'];
						$info=$this->get_data("SELECT * FROM beneficio WHERE encuesta=$encuesta;");
					break;
			}
			break;
		}
		return $info;
	}
	
	//close the db connection
	public function close()
	{
		if($this->cn){mysqli_close($this->cn);}
	}
	
}
?>