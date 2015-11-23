<div class="square">
			<center><form id="signup-form" action="{$gvar.l_global}registrar_representante.php?option=RegistrarRepresentante" method="post">
				<table width="100%" border="0" cellpadding="0" cellspacing="5">
					<tr><td>					
						<center><b><h1>Registrar representante</h1></b><br />
						<b>Nombre(*):</b> <input type="text" name="nombre" {if isset($object)} value="{$object->nombre}" {/if} required autocomplete="off"/><br />
						<b>C&eacutedula(*):</b> <input type="text" name="cedula" {if isset($object)} value="{$object->cedula}" {/if} required autocomplete="off"/><br />
						<b>Contraseña(*):</b> <input type="password" name="contrasena"  required /><br />						
						<a class="button" href="{$gvar.l_global}login.php">Atrás</a>
			            <input class="button" type="submit" value="Registrar"/>
			            <input class="button" type="reset"  value="Borrar">
					</td></tr></table>
			</form></center>
</div>
