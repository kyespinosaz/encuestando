<?php /* Smarty version Smarty-3.0.9, created on 2015-11-07 03:46:45
         compiled from "C:/wamp/www/glight/templates\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13482563d66156a4b17-97153297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e6292c6d046ab42ee0fea4dfd5c31928624cc59' => 
    array (
      0 => 'C:/wamp/www/glight/templates\\message.tpl',
      1 => 1446556200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13482563d66156a4b17-97153297',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="assets/css/dialog.css">
<script src="assets/js/dialog.js"></script>
</head>
<body>
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <table id="t01" width="100%" border="0" cellpadding="0" cellspacing="5">
		<tr>
		<td width="10%"><i class="fa fa-<?php echo $_smarty_tpl->getVariable('msg_icon')->value;?>
 fa-3x"></td><td width="90%"><div id="dialogboxbody"></div></td>
		</tr>		
	</table>
    <div id="dialogboxfoot"></div>
  </div>
</div>
<script type="text/javascript">Alert.render("<?php echo $_smarty_tpl->getVariable('msg_type')->value;?>
","<?php echo $_smarty_tpl->getVariable('msg_content')->value;?>
","<?php echo $_smarty_tpl->getVariable('msg_dir')->value;?>
")</script>
</body>
</html>