		<div class="square">
			<center><form id="signup-form" action="{$gvar.l_global}suscribir_empresa.php?option=suscribir" method="post">
				<table width="100%" border="0" cellpadding="0" cellspacing="5">
					<tr><td>					
						<center><b><h1>Agregar una empresa</h1></b><br />
						<b>(*) Nombre:</b> <input type="text" name="nombre" {if isset($object)} value="{$object->nombre}" {/if} autocomplete="off" required/><br />
						<b>(*) NIT:</b> <input type="text" name="nit" {if isset($object)} value="{$object->nit}" {/if} autocomplete="off" required/><br />
						<b>(*) Direcci&oacuten:</b> <input type="text" name="direccion" {if isset($object)} value="{$object->direccion}" {/if} autocomplete="off" required/><br />
						<b>(*) Tel&eacutefono:</b> <input type="text" name="telefono" {if isset($object)} value="{$object->telefono}" {/if} autocomplete="off" required/><br />
						<input type="hidden" name="persona" value="{$persona}">
						<br />						
						<!--<b>Ingrese el representante:</b> <input type="text" name="representante" {if isset($object)} value="{$object->representante}" {/if}/><br />-->
						<a class="button" href="{$gvar.l_global}login.php">Atrás</a>												
						<input type="submit" value="Suscribir"/>
						<input type="reset"  value="Borrar"></center>
					</td></tr></table>
			</form></center>
		</div>
		
