<?php /* Smarty version Smarty-3.0.9, created on 2015-11-23 19:56:50
         compiled from "C:/wamp/www/encuestando/glight/templates\registrar_representante.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107656536172608816-76112969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b28d7f56b6a4cd4279a090c585ef7dc05097e462' => 
    array (
      0 => 'C:/wamp/www/encuestando/glight/templates\\registrar_representante.tpl',
      1 => 1448305006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107656536172608816-76112969',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="square">
			<center><form id="signup-form" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
registrar_representante.php?option=RegistrarRepresentante" method="post">
				<table width="100%" border="0" cellpadding="0" cellspacing="5">
					<tr><td>					
						<center><b><h1>Registrar representante</h1></b><br />
						<b>Nombre(*):</b> <input type="text" name="nombre" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->nombre;?>
" <?php }?> required autocomplete="off"/><br />
						<b>C&eacutedula(*):</b> <input type="text" name="cedula" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->cedula;?>
" <?php }?> required autocomplete="off"/><br />
						<b>Contraseña(*):</b> <input type="password" name="contrasena"  required /><br />						
						<a class="button" href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php">Atrás</a>
			            <input class="button" type="submit" value="Registrar"/>
			            <input class="button" type="reset"  value="Borrar">
					</td></tr></table>
			</form></center>
</div>
