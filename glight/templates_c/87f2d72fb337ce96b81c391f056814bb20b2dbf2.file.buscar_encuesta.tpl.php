<?php /* Smarty version Smarty-3.0.9, created on 2015-11-23 16:24:31
         compiled from "C:/wamp/www/encuestando/glight/templates\buscar_encuesta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:279055648f40d1d4b51-37603747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87f2d72fb337ce96b81c391f056814bb20b2dbf2' => 
    array (
      0 => 'C:/wamp/www/encuestando/glight/templates\\buscar_encuesta.tpl',
      1 => 1448292202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '279055648f40d1d4b51-37603747',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="search-form" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
c_buscar_encuesta.php?option=buscar" method="post">

		<input type="text" name="consulta" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->consulta;?>
" <?php }?> autocomplete="off"/>
		<input type="submit" value="Buscar"/>
		<?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value->consulta)){?>
			<?php if ((sizeof($_smarty_tpl->getVariable('encuestas')->value)==0)){?>
				<label>No se encontraron resultados...</label>
			<?php }?>
		<?php }else{ ?>
			<label>Encuestas que te podrían interesar...</label>
		<?php }?>
		
	<center>
		<table width="100%">
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('encuestas')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<h4><?php echo $_smarty_tpl->getVariable('encuestas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('nombre');?>
</h4>												
							<label>Fecha de finalización: <?php echo $_smarty_tpl->getVariable('encuestas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('fechaFinalizacion');?>
</label>
							<label>Retribución: <?php echo $_smarty_tpl->getVariable('encuestas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('retribucion');?>
 </label>																	
							<a class="button" href="c_responder_encuesta.php?codigo=<?php echo $_smarty_tpl->getVariable('encuestas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('codigo');?>
">Responder</a>
							
						</td>
					</tr>
				<?php endfor; endif; ?>
		</table>
	</center>
</form>