		<form action="{$gvar.l_global}c_registrar_usuario.php?option=registrar" method="post">
			<center><h1>Registrar usuario</h1>
			<label>(*) Nombre: <input type="text" name="nombre" {if isset($object)} value="{$object->nombre}" {/if} autocomplete="off" required/></label>
			<label>(*) C&eacute;dula:<input type="text" name="cedula" {if isset($object)} value="{$object->cedula}" {/if} autocomplete="off" required/></label>
			<label>(*) Contrase&ntilde;a:</b> <input type="password" name="contrasena" required/></label>
			<label>(*) Sexo
				<select name="sexo">
					<option value="M">M</option> 
					<option value="F">F</option> 
				</select>
			</label>
			<label>Ocupaci&oacute;n:<input type="text" name="ocupacion" {if isset($object)} value="{$object->ocupacion}" {/if} autocomplete="off"/></label>					                    
			<label>(*) Inter&eacute;s:</label>
				<table width="30%" border="0" cellpadding="0" cellspacing="5" >
					<tr>
						<td><input id="mercado" type="checkbox" name="interes[]" value="Mercado"><label for="mercado">Mercado</label>
						<input id="salud" type="checkbox" name="interes[]" value="Salud"><label for="salud">Salud</label>
						<input id="ropa" type="checkbox" name="interes[]" value="Ropa"><label for="ropa">Ropa </label></td>

						<td><input id="bebe" type="checkbox" name="interes[]" value="Bebe"><label for="bebe">Beb&eacute;</label>
						<input id="tecno" type="checkbox" name="interes[]" value="Tecnologia"><label for="tecno">Tecnolog&iacute;a</label>
						<input id="deportes" type="checkbox" name="interes[]" value="Deportes"><label for="deportes">Deportes</h6></label></td>
							                	
						<td><input id="hogar" type="checkbox" name="interes[]" value="Hogar"><label for="hogar">Hogar</label>
						<input id="muebles" type="checkbox" name="interes[]" value="Muebles"><label for="muebles">Muebles</label>
						<input id="vehiculos" type="checkbox" name="interes[]" value="Vehiculos"><label for="vehiculos">Veh&iacute;culos</label></td>
					</tr>
				</table>

			<a class="button" href="{$gvar.l_global}login.php">Atrás</a>
			<input class="btn btn-primary" type="submit" value="Registrar"/>
			<input class="btn btn-primary" type="reset"  value="Borrar">
			</center>

		</form>