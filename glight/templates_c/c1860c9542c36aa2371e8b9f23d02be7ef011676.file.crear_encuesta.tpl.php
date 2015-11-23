<?php /* Smarty version Smarty-3.0.9, created on 2015-11-23 20:01:41
         compiled from "C:/wamp/www/encuestando/glight/templates\crear_encuesta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3794565362959a9743-60506773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1860c9542c36aa2371e8b9f23d02be7ef011676' => 
    array (
      0 => 'C:/wamp/www/encuestando/glight/templates\\crear_encuesta.tpl',
      1 => 1448304666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3794565362959a9743-60506773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<script type="text/javascript" src="assets/js/jsDatePick.min.1.3.js"></script>
		<script src="assets/js/addPregunta.js"></script>
		<script type="text/javascript">
			<?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?>
			var opc = <?php echo count($_smarty_tpl->getVariable('object')->value->pregunta);?>
 ;
			<?php }else{ ?>
			var opc = 1;
			<?php }?>
			window.onload = function(){
				new JsDatePick({
					useMode:2,
					target:"fecha",
					isStripped:true,
					cellColorScheme:"beige",
					dateFormat:"%Y-%m-%d"
				});
			};
		</script>
		<div class="square">
			<center><form id="signup-form" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
crear_encuesta.php?option=crear" method="post">
				<table width="100%" border="0" cellpadding="0" cellspacing="5">
					<tr><td>					
						<center><b><h1>Crear encuesta</h1></b><br />
						<b>(*) Nombre:</b> <input type="text" name="nombre" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->nombre;?>
" <?php }?> autocomplete="off" required/><br />
						<b>(*) Retribuci&oacuten:</b> <input type="text" name="retribucion" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->retribucion;?>
" <?php }?> autocomplete="off" required/><br />
						<b>(*) Seleccione la fecha de finalizaci&oacuten:</b> <input type="text" name="fechaFinalizacion" id="fecha" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->fechaFinalizacion;?>
" <?php }?> autocomplete="off" required/><br />
						<b>(*) Seleccione la empresa: </b> <select name="empresa">
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('empresas')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
							<option value="<?php echo $_smarty_tpl->getVariable('empresas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('nit');?>
"><?php echo $_smarty_tpl->getVariable('empresas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('nombre');?>
</option> 
							<?php endfor; endif; ?>
						</select><br/><br/>
						
						<b>A continuaci&oacuten inserte las preguntas de la encuesta (El n&uacutemero m&aacuteximo de preguntas es 20)</b><br/> <br/> 
						<div id="main">
							<input type="button" id="btAdd" value="Añadir" class="bt" />
							<input type="button" id="btRemove" value="Eliminar" class="bt" />
							<input type="button" id="btRemoveAll" value="Eliminar Todo" class="bt" /><br />
							<br />
							<?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?>
								<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('object')->value->pregunta) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
									<br />
									<table border="0" cellpadding="0" cellspacing="5" id="tb<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index']+1;?>
">
									  <tr>
									    <th>Pregunta <?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index']+1;?>
</th>
									    <th>Opciones</th>
									  </tr>
									  <tr>
									    <td rowspan="4" id="pregunta"><textarea class="input" ROWS="5"  name="pregunta[]" required/><?php echo $_smarty_tpl->getVariable('object')->value->pregunta[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</TEXTAREA></td>
									    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 1" value="<?php echo $_smarty_tpl->getVariable('object')->value->opcion[($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']*4)];?>
" required/></td>
									  </tr>
									  <tr>
									    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 2" value="<?php echo $_smarty_tpl->getVariable('object')->value->opcion[($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']*4)+1];?>
" required/></td>
									  </tr>
									  <tr>
									    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 3" value="<?php echo $_smarty_tpl->getVariable('object')->value->opcion[($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']*4)+2];?>
" required/></td>
									  </tr>
									  <tr>
									    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 4" value="<?php echo $_smarty_tpl->getVariable('object')->value->opcion[($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']*4)+3];?>
" required/></td>
									  </tr>
									</table>
								<?php endfor; endif; ?>
							<?php }else{ ?>
								<table border="0" cellpadding="0" cellspacing="5" id="tb1">
								  <tr>
								    <th>Pregunta 1</th>
								    <th>Opciones</th>
								  </tr>
								  <tr>
								    <td rowspan="4" id="pregunta"><textarea class="input" ROWS="5"  name="pregunta[]" required/></TEXTAREA></td>
								    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 1" required/></td>
								  </tr>
								  <tr>
								    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 2" required/></td>
								  </tr>
								  <tr>
								    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 3" required/></td>
								  </tr>
								  <tr>
								    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 4" required/></td>
								  </tr>
								</table>
							<?php }?>
						</div>
						<br />
						<a class="button" href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php">Atrás</a>												
						<input type="submit" value="Crear"/>
						<input type="reset"  value="Borrar"></center>						
					</td></tr></table>
			</form></center>
		</div>