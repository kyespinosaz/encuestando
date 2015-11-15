<form id="search-form" action="{$gvar.l_global}c_buscar_encuesta.php?option=buscar" method="post">

		<input type="text" name="consulta" {if isset($object)} value="{$object->consulta}" {/if} autocomplete="off" required/>
		<input type="submit" value="Buscar"/>
		{if isset($object->consulta)}
			{if ($encuestas|@sizeof==0)}
				<label>No se encontraron resultados...</label>
			{/if}
		{else}
			<label>Encuestas que te podrían interesar...</label>
		{/if}
		
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