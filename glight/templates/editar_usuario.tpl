		<form action="{$gvar.l_global}editar_usuario.php?option=editar" method="post">
			<center><h1>Editar usuario</h1>
			<label>(*) Nombre: <input type="text" name="nombre" {if isset($object)} value="{$object->nombre}" {elseif isset($persona)} value="{$persona->get('nombre')}" {/if} autocomplete="off" required/></label>
			<label>(*) C&eacute;dula:<input type="text" name="cedula" {if isset($object)} value="{$object->cedula}"  {elseif isset($persona)} value="{$persona->get('cedula')}"  {/if} readonly/></label>
			<label>(*) Contrase&ntilde;a:</b> <input type="password" name="contrasena" required/></label>
			<label>(*) Sexo
				<select name="sexo">
					<option value="M" {if isset($persona)} {if $persona->get('sexo') == 'M'} selected {/if} {/if}>M</option> 
					<option value="F" {if isset($persona)} {if $persona->get('sexo') == 'F'} selected {/if} {/if}>F</option> 
				</select>
			</label>
			<label>Ocupaci&oacute;n:<input type="text" name="ocupacion" {if isset($object)} value="{$object->ocupacion}" {elseif isset($persona)} value="{$persona->get('ocupacion')}" {/if} autocomplete="off"/></label>					                    
			<label>(*) Inter&eacute;s:</label>
				<table width="30%" border="0" cellpadding="0" cellspacing="5" >
					<tr>
						<td><input id="mercado" type="checkbox" name="interes[]" value="Mercado" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Mercado'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Mercado'} checked {/if} {/section} {/if}><label for="mercado">Mercado</label>
						<input id="salud" type="checkbox" name="interes[]" value="Salud" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Salud'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Salud'} checked {/if} {/section} {/if}><label for="salud">Salud</label>
						<input id="ropa" type="checkbox" name="interes[]" value="Ropa" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Ropa'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Ropa'} checked {/if} {/section} {/if}><label for="ropa">Ropa </label></td>

						<td><input id="bebe" type="checkbox" name="interes[]" value="Bebe" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Bebe'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Bebe'} checked {/if} {/section} {/if}><label for="bebe">Beb&eacute;</label>
						<input id="tecno" type="checkbox" name="interes[]" value="Tecnologia" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Tecnologia'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Tecnologia'} checked {/if} {/section} {/if}><label for="tecno">Tecnolog&iacute;a</label>
						<input id="deportes" type="checkbox" name="interes[]" value="Deportes" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Deportes'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Deportes'} checked {/if} {/section} {/if}><label for="deportes">Deportes</h6></label></td>
							                	
						<td><input id="hogar" type="checkbox" name="interes[]" value="Hogar" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Hogar'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Hogar'} checked {/if} {/section} {/if}><label for="hogar">Hogar</label>
						<input id="muebles" type="checkbox" name="interes[]" value="Muebles" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Muebles'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Muebles'} checked {/if} {/section} {/if}><label for="muebles">Muebles</label>
						<input id="vehiculos" type="checkbox" name="interes[]" value="Vehiculos" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Vehiculos'} checked {/if} {/section} {elseif isset($interes)}  {section loop=$interes name=j} {if $interes[j]->get('tipo') == 'Vehiculos'} checked {/if} {/section} {/if}><label for="vehiculos">Veh&iacute;culos</label></td>
					</tr>
				</table>

			<a class="button" href="{$gvar.l_global}login.php">Atrás</a>
			<input class="button" type="submit" value="Editar"/>
			<input class="button" type="reset"  value="Restablecer">
			</center>

		</form>