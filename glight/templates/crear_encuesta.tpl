		<script type="text/javascript" src="assets/js/jsDatePick.min.1.3.js"></script>
		<script src="assets/js/addPregunta.js"></script>
		<script type="text/javascript">
			{if isset($object)}
			var opc = {$object->pregunta|@count} ;
			{else}
			var opc = 1;
			{/if}
			window.onload = function(){
				new JsDatePick({
					useMode:2,
					target:"fecha",
					isStripped:true,
					cellColorScheme:"beige",
					dateFormat:"%Y-%m-%d"
				});
			};
		</script>
		<div class="square">
			<center><form id="signup-form" action="{$gvar.l_global}crear_encuesta.php?option=crear" method="post">
				<table width="100%" border="0" cellpadding="0" cellspacing="5">
					<tr><td>					
						<center><b><h1>Crear encuesta</h1></b><br />
						<b>(*) Nombre:</b> <input type="text" name="nombre" {if isset($object)} value="{$object->nombre}" {/if} autocomplete="off" required/><br />
						<b>(*) Retribuci&oacuten:</b> <input type="text" name="retribucion" {if isset($object)} value="{$object->retribucion}" {/if} autocomplete="off" required/><br />
						<b>(*) Seleccione la fecha de finalizaci&oacuten:</b> <input type="text" name="fechaFinalizacion" id="fecha" {if isset($object)} value="{$object->fechaFinalizacion}" {/if} autocomplete="off" required/><br />
						<b>(*) Seleccione la empresa: </b> <select name="empresa">
							{section loop=$empresas name=i}
							<option value="{$empresas[i]->get('nit')}">{$empresas[i]->get('nombre')}</option> 
							{/section}
						</select> <br/><br/>
						<label>(*) Seccione las categor&iacute;as:</label>
						<table width="30%" border="0" cellpadding="0" cellspacing="5" >
							<tr>
								<td><input id="mercado" type="checkbox" name="interes[]" value="Mercado" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Mercado'} checked {/if} {/section} {/if}><label for="mercado">Mercado</label>
								<input id="salud" type="checkbox" name="interes[]" value="Salud" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Salud'} checked {/if} {/section} {/if}><label for="salud">Salud</label>
								<input id="ropa" type="checkbox" name="interes[]" value="Ropa" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Ropa'} checked {/if} {/section} {/if}><label for="ropa">Ropa </label></td>

								<td><input id="bebe" type="checkbox" name="interes[]" value="Bebe" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Bebe'} checked {/if} {/section} {/if}><label for="bebe">Beb&eacute;</label>
								<input id="tecno" type="checkbox" name="interes[]" value="Tecnologia" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Tecnologia'} checked {/if} {/section} {/if}><label for="tecno">Tecnolog&iacute;a</label>
								<input id="deportes" type="checkbox" name="interes[]" value="Deportes" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Deportes'} checked {/if} {/section} {/if}><label for="deportes">Deportes</h6></label></td>
									                	
								<td><input id="hogar" type="checkbox" name="interes[]" value="Hogar" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Hogar'} checked {/if} {/section} {/if}><label for="hogar">Hogar</label>
								<input id="muebles" type="checkbox" name="interes[]" value="Muebles" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Muebles'} checked {/if} {/section} {/if}><label for="muebles">Muebles</label>
								<input id="vehiculos" type="checkbox" name="interes[]" value="Vehiculos" {if isset($object)} {section loop=$object->interes name=i} {if $object->interes[i] == 'Vehiculos'} checked {/if} {/section} {/if}><label for="vehiculos">Veh&iacute;culos</label></td>
							</tr>
						</table>




						<br/><br/>
						
						<b>A continuaci&oacuten inserte las preguntas de la encuesta (El n&uacutemero m&aacuteximo de preguntas es 20)</b><br/> <br/> 
						<div id="main">
							<input type="button" id="btAdd" value="Añadir" class="bt" />
							<input type="button" id="btRemove" value="Eliminar" class="bt" />
							<input type="button" id="btRemoveAll" value="Eliminar Todo" class="bt" /><br />
							<br />
							{if isset($object)}
								{section loop=$object->pregunta name=i}
									<br />
									<table border="0" cellpadding="0" cellspacing="5" id="tb{$smarty.section.i.index + 1 }">
									  <tr>
									    <th>Pregunta {$smarty.section.i.index + 1}</th>
									    <th>Opciones</th>
									  </tr>
									  <tr>
									    <td rowspan="4" id="pregunta"><textarea class="input" ROWS="5"  name="pregunta[]" required/>{$object->pregunta[i]}</TEXTAREA></td>
									    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 1" value="{$object->opcion[($smarty.section.i.index*4)]}" required/></td>
									  </tr>
									  <tr>
									    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 2" value="{$object->opcion[($smarty.section.i.index*4)+1]}" required/></td>
									  </tr>
									  <tr>
									    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 3" value="{$object->opcion[($smarty.section.i.index*4)+2]}" required/></td>
									  </tr>
									  <tr>
									    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 4" value="{$object->opcion[($smarty.section.i.index*4)+3]}" required/></td>
									  </tr>
									</table>
								{/section}
							{else}
								<table border="0" cellpadding="0" cellspacing="5" id="tb1">
								  <tr>
								    <th>Pregunta 1</th>
								    <th>Opciones</th>
								  </tr>
								  <tr>
								    <td rowspan="4" id="pregunta"><textarea class="input" ROWS="5"  name="pregunta[]" required/></TEXTAREA></td>
								    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 1" required/></td>
								  </tr>
								  <tr>
								    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 2" required/></td>
								  </tr>
								  <tr>
								    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 3" required/></td>
								  </tr>
								  <tr>
								    <td><input type="text" class="input" id="opcion" name="opcion[]" placeholder="Opcion 4" required/></td>
								  </tr>
								</table>
							{/if}
						</div>
						<br />
						<a class="button" href="{$gvar.l_global}login.php">Atrás</a>												
						<input type="submit" value="Crear"/>
						<input type="reset"  value="Borrar"></center>						
					</td></tr></table>
			</form></center>
		</div>