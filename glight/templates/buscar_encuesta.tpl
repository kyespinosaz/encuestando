<form id="search-form" action="{$gvar.l_global}c_buscar_encuesta.php?option=buscar" method="post">

		<input type="text" name="nombre" {if isset($object)} value="{$object->nombre}" {/if} autocomplete="off" required/>
		<input type="submit" value="Buscar"/>
		
	<center>
		<table width="100%">
				{section loop=$encuestas name=i}
					<tr>
						<td>			
							<h4>{$encuestas[i]->get('nombre')}</h4>												
							<label>Fecha de finalización: {$encuestas[i]->get('fechaFinalizacion')}</label>
							<label>Retribución: {$encuestas[i]->get('retribucion')} </label>																	
							<a class="button" href="#">Responder</a>
							
						</td>
					</tr>
				{/section}
		</table>
	</center>
</form>