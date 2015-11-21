<?php /* Smarty version Smarty-3.0.9, created on 2015-11-21 22:54:17
         compiled from "C:/wamp/www/encuestando/glight/templates\responder_encuesta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26534564bcaa03c5305-21054740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3df65ffab74a2df543ef5260e3cc12d5c6a1f918' => 
    array (
      0 => 'C:/wamp/www/encuestando/glight/templates\\responder_encuesta.tpl',
      1 => 1448142832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26534564bcaa03c5305-21054740',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_smarty_tpl->getVariable('encuesta',null,true,false)->value)){?>
<form action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
c_responder_encuesta.php?option=responder" method="post">

	<center>
		<h2><?php echo $_smarty_tpl->getVariable('encuesta')->value->get('nombre');?>
</h2><br/>

		<table width="100%">
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<tr>
					<td>			
						<h4><?php echo $_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('numero');?>
. <?php echo $_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('contenido');?>
:<h4>
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->components['opcion']['p_o']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
								<table width="100%">
									<td>
										<input id="<?php echo $_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->components['opcion']['p_o'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]->get('codigo');?>
" type="radio" 
										name="respuesta<?php echo $_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('numero');?>
[]" value="<?php echo $_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->components['opcion']['p_o'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]->get('codigo');?>
">
										<label for="<?php echo $_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->components['opcion']['p_o'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]->get('codigo');?>
"><?php echo $_smarty_tpl->getVariable('encuesta')->value->components['pregunta']['e_p'][$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->components['opcion']['p_o'][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]->get('contenido');?>
</label>
									</td>
								</table>
							<?php endfor; endif; ?>
					</td>
				</tr>
			<?php endfor; endif; ?>
		</table>
		<input type="hidden" name="encuesta" value="<?php echo $_smarty_tpl->getVariable('encuesta')->value->get('codigo');?>
"/>
		<input type="submit" value="Responder"/>
	</center>
</form>

<?php }?>