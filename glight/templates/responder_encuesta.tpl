{if isset($encuesta)}
<form action="{$gvar.l_global}c_responder_encuesta.php?option=responder" method="post">

	<center>
		<h2>{$encuesta->get('nombre')}</h2><br/>

		<table width="100%">
			{section loop=$encuesta->components['pregunta']['e_p'] name=i}
				<tr>
					<td>			
						<h4>{$encuesta->components['pregunta']['e_p'][i]->get('numero')}. {$encuesta->components['pregunta']['e_p'][i]->get('contenido')}:<h4>
							{section loop=$encuesta->components['pregunta']['e_p'][i]->components['opcion']['p_o'] name=j}
								<table width="100%">
									<td>
										<input id="{$encuesta->components['pregunta']['e_p'][i]->components['opcion']['p_o'][j]->get('codigo')}" type="radio" 
										name="respuesta{$encuesta->components['pregunta']['e_p'][i]->get('numero')}[]" value="{$encuesta->components['pregunta']['e_p'][i]->components['opcion']['p_o'][j]->get('codigo')}" required>
										<label for="{$encuesta->components['pregunta']['e_p'][i]->components['opcion']['p_o'][j]->get('codigo')}">{$encuesta->components['pregunta']['e_p'][i]->components['opcion']['p_o'][j]->get('contenido')}</label>
									</td>
								</table>
							{/section}
					</td>
				</tr>
			{/section}
		</table>
		<input type="hidden" name="encuesta" value="{$encuesta->get('codigo')}"/>
		<input type="submit" value="Responder"/>
	</center>
</form>

{/if}