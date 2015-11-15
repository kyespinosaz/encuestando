<?php /* Smarty version Smarty-3.0.9, created on 2015-11-15 15:30:28
         compiled from "C:/wamp/www/encuestando/glight/templates\inicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3830564897049f0ee0-18895269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2624f2b94e3655377acffd5d16c092272b77ebed' => 
    array (
      0 => 'C:/wamp/www/encuestando/glight/templates\\inicio.tpl',
      1 => 1447597564,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3830564897049f0ee0-18895269',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_SESSION['persona'])){?>
<form action="">
	<body id="top">
		<div id="main">
			<section id="one">				
				<table class= "table table-bordered" title="Contenido" border="0">
					<td>						
						<center>
							<header class="major">
								<h2>Bienvenido <?php echo $_SESSION['persona']['nombre'];?>
</h2>
							</header>

							<?php if ($_SESSION['persona']['sexo']=="M"){?>
								<img src="images/Male.png" width="100" height="100" class="image avatar" alt="" /></a></br>
						
							<?php }elseif($_SESSION['persona']['sexo']=="F"){?>
								<img src="images/Female.png" width="100" height="100" class="image avatar" alt="" /></a></br>

							<?php }else{ ?>
								<img src="images/admin.png" width="100" height="100" class="image avatar" alt="" /></a></br>
							<?php }?>
							<h4>Cedula: <?php echo $_SESSION['persona']['cedula'];?>
<h4>
							<h4>Rol: <?php echo $_SESSION['persona']['rol'];?>
<h4>
						</center>
					</td>
					<td>
						<header class="major">
							<h2>Encuestando<br /></h2>
						</header>


						<center><p style="text-align: justify;">Encuestando le ofrece su servicio a grandes y medianas empresas que estén interesadas en 
						conocer el mercado Colombiano a través de nuestro sistema de encuestas, estas serán diseñadas en conjunto con nuestros expertos 
						en el área de psicometría*, con el fin de garantizar veracidad en los resultados obtenidos; para esto, el representante de cada 
						empresa deberá suscribirla a uno de nuestros planes, los cuales ofrecen variedad en costo, características y duración.</p>

		                <p  style="text-align: justify;">* La psicometría es una disciplina de la psicología cuya finalidad intrínseca es la de aportar 
						soluciones al problema de la medida en cualquier proceso de investigación. Esta incluye teorías sobre las mediciones en el área 
						psicológica, encargándose de describirlas, categorizarlas, evaluar su utilidad y precisión, así como la búsqueda de nuevos métodos,
						teorías y modelos matemáticos que permitan mejores instrumentos de medida.</p></center>
					</td>
				</table></br></br>
			</section>
	    </div>
	</body>
</form>

<?php }else{ ?>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/main.css" />
	<form action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php?option=login" method="post">
		<center>
			<h1>Login</h1>
			<label>(*) Usuario: <input type="text" name="nombre" autocomplete="off" required/></label>
			<label>(*) Contrase&ntilde;a: <input type="password" name="contrasena" autocomplete="off" required/></label>

			<button action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php?option=login" method="post"> Log in </button></br>
			<a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
c_registrar_usuario.php" />Registrar usuario</a><br />
			<a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
registrar_representante.php"/>Registrar representante</a><br /><br />
		</center>
	</form>
<?php }?>
