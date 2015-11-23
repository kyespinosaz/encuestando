<?php /* Smarty version Smarty-3.0.9, created on 2015-11-23 19:53:46
         compiled from "C:/wamp/www/encuestando/glight/templates\registrar_usuario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26245565360babad2a2-98118003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ac12a7803b529fa5bf2f39db9ca379b4117a954' => 
    array (
      0 => 'C:/wamp/www/encuestando/glight/templates\\registrar_usuario.tpl',
      1 => 1448304825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26245565360babad2a2-98118003',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<form action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
c_registrar_usuario.php?option=registrar" method="post">
			<center><h1>Registrar usuario</h1>
			<label>(*) Nombre: <input type="text" name="nombre" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->nombre;?>
" <?php }?> autocomplete="off" required/></label>
			<label>(*) C&eacute;dula:<input type="text" name="cedula" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->cedula;?>
" <?php }?> autocomplete="off" required/></label>
			<label>(*) Contrase&ntilde;a:</b> <input type="password" name="contrasena" required/></label>
			<label>(*) Sexo
				<select name="sexo">
					<option value="M">M</option> 
					<option value="F">F</option> 
				</select>
			</label>
			<label>Ocupaci&oacute;n:<input type="text" name="ocupacion" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->ocupacion;?>
" <?php }?> autocomplete="off"/></label>					                    
			<label>(*) Inter&eacute;s:</label>
				<table width="30%" border="0" cellpadding="0" cellspacing="5" >
					<tr>
						<td><input id="mercado" type="checkbox" name="interes[]" value="Mercado"><label for="mercado">Mercado</label>
						<input id="salud" type="checkbox" name="interes[]" value="Salud"><label for="salud">Salud</label>
						<input id="ropa" type="checkbox" name="interes[]" value="Ropa"><label for="ropa">Ropa </label></td>

						<td><input id="bebe" type="checkbox" name="interes[]" value="Bebe"><label for="bebe">Beb&eacute;</label>
						<input id="tecno" type="checkbox" name="interes[]" value="Tecnologia"><label for="tecno">Tecnolog&iacute;a</label>
						<input id="deportes" type="checkbox" name="interes[]" value="Deportes"><label for="deportes">Deportes</h6></label></td>
							                	
						<td><input id="hogar" type="checkbox" name="interes[]" value="Hogar"><label for="hogar">Hogar</label>
						<input id="muebles" type="checkbox" name="interes[]" value="Muebles"><label for="muebles">Muebles</label>
						<input id="vehiculos" type="checkbox" name="interes[]" value="Vehiculos"><label for="vehiculos">Veh&iacute;culos</label></td>
					</tr>
				</table>

			<a class="button" href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php">Atrás</a>
			<input class="button" type="submit" value="Registrar"/>
			<input class="button" type="reset"  value="Borrar">
			</center>

		</form>