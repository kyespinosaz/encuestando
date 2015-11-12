{if isset($smarty.session.persona)}
<form action="">
	<body id="top">
		<div id="main">
			<section id="one">				
				<table class= "table table-bordered" title="Contenido" border="0">
					<td>						
						<center>
							<header class="major">
								<h2>Bienvenido {$smarty.session.persona.nombre}</h2>
							</header>

							{if $smarty.session.persona.sexo == "M"}
								<img src="images/Male.png" width="100" height="100" class="image avatar" alt="" /></a></br>
						
							{elseif $smarty.session.persona.sexo == "F"}
								<img src="images/Female.png" width="100" height="100" class="image avatar" alt="" /></a></br>

							{else $smarty.session.persona.sexo == null}
								<img src="images/admin.png" width="100" height="100" class="image avatar" alt="" /></a></br>
							{/if}
							<h4>Cedula: {$smarty.session.persona.cedula}<h4>
							<h4>Rol: {$smarty.session.persona.rol}<h4>
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

{else}
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/main.css" />
	<form action="{$gvar.l_global}login.php?option=login" method="post">
		<center>
			<h1>Login</h1>
			<label>(*) Usuario: <input type="text" name="nombre" autocomplete="off" required/></label>
			<label>(*) Contrase&ntilde;a: <input type="password" name="contrasena" autocomplete="off" required/></label>

			<button action="{$gvar.l_global}login.php?option=login" method="post"> Log in </button></br>
			<a href="{$gvar.l_global}c_registrar_usuario.php" />Registrar usuario</a><br />
			<a href="{$gvar.l_global}registrar_representante.php"/>Registrar representante</a><br /><br />
		</center>
	</form>
{/if}
