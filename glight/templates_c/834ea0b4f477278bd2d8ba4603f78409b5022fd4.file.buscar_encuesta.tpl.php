<?php /* Smarty version Smarty-3.0.9, created on 2015-11-07 03:48:26
         compiled from "C:/wamp/www/glight/templates\buscar_encuesta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22223563d667a5d1b21-95829895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '834ea0b4f477278bd2d8ba4603f78409b5022fd4' => 
    array (
      0 => 'C:/wamp/www/glight/templates\\buscar_encuesta.tpl',
      1 => 1446862846,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22223563d667a5d1b21-95829895',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form id="search-form" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
c_buscar_encuesta.php?option=buscar" method="post">

		<input type="text" name="nombre" <?php if (isset($_smarty_tpl->getVariable('object',null,true,false)->value)){?> value="<?php echo $_smarty_tpl->getVariable('object')->value->nombre;?>
" <?php }?> autocomplete="off" required/>
		<input type="submit" value="Buscar"/>
		
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
							<a class="button" href="#">Responder</a>
							
						</td>
					</tr>
				<?php endfor; endif; ?>
		</table>
	</center>
</form>