<?php /* Smarty version Smarty-3.0.9, created on 2015-11-07 23:10:42
         compiled from "C:/wamp/www/glight/templates\registrar_representante.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30598563e76e2c2b350-80288344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '217431ddb057ace96aed12d925e5f96c553b8a8c' => 
    array (
      0 => 'C:/wamp/www/glight/templates\\registrar_representante.tpl',
      1 => 1446933664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30598563e76e2c2b350-80288344',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
		<title>Registrar representante</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
<body>
		<div class="square">
			<center><form id="signup-form" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
registrar_representante.php?option=RegistrarRepresentante" method="post">
				<table width="100%" border="0" cellpadding="0" cellspacing="5">
					<tr><td>					
						<center><b><h1>Registrar representante</h1></b><br />
						<b>Nombre de usuario(*):</b> <input type="text" name="nombre" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->nombre;?>
" <?php }?> required autocomplete="off"/><br />
						<b>C&eacutedula(*):</b> <input type="text" name="cedula" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->cedula;?>
" <?php }?> required autocomplete="off"/><br />
						<b>Contraseña(*):</b> <input type="password" name="contrasena"  required /><br />						
						<a class="button" href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php">Atrás</a>
			            <input class="btn btn-primary" type="submit" value="Registrar"/>
			            <input class="btn btn-primary" type="reset"  value="Borrar">
					</td></tr></table>
			</form></center>
		</div>
		
</body>

<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Untitled.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</footer>
</html>