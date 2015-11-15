<?php /* Smarty version Smarty-3.0.9, created on 2015-11-15 15:41:38
         compiled from "C:/wamp/www/encuestando/glight/templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21649564899a265f7d7-33259012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2cf198205f6a9b6da51529d99db13c49bd53463' => 
    array (
      0 => 'C:/wamp/www/encuestando/glight/templates\\header.tpl',
      1 => 1447598496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21649564899a265f7d7-33259012',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta charset="utf-8" />    
        <link rel="stylesheet" href="assets/css/main.css" />

        <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>


        <nav role="navigation" class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php"><b class="navbar-brand" >ENCUESTANDO</b></a>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if (isset($_SESSION['persona'])&&$_GET['option']!='logout'){?> 
                        <?php if ($_SESSION['persona']['rol']=="representante"){?>
                            <li><a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
suscribir_empresa.php">Suscribir empresa</a></li>
                            <li><a href=#>Crear encuesta</a></li>
                            <li><a href=#>Realizar pago</a></li>
                            <li><a href=#>Eliminar producto</a></li>
                            <li><a href=#>Agregar pregunta</a></li>
                            <li><a href=#>Buscar producto</a></li>
                            <li><a href=#>Crear producto</a></li>
                            <li><a href=#>Editar producto</a></li>
                        <?php }?>

                        <?php if ($_SESSION['persona']['rol']=="usuario"){?>
                            <li><a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
c_buscar_encuesta.php">Buscar encuesta</a></li>
                            <li><a href=#>Realizar canje</a></li>
                            <li><a href=#>Responder encuesta</a></li>
                        <?php }?>

                        <?php if ($_SESSION['persona']['rol']=="administrador"){?>
                            <a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
c_crear_plan.php">Crear plan</a>
                        <?php }?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php?option=logout"><?php echo $_smarty_tpl->getVariable('gvar')->value['n_logout'];?>
</a>
                    </ul>
                <?php }?>
            </div>
        </nav>
    </head>
