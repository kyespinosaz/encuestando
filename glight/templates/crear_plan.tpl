	<form action="{$gvar.l_global}c_crear_plan.php?option=crear" method="post">
			<center><h1>Crear plan</h1>
			<label>(*) Nombre: <input type="text" name="nombre" {if isset($object)} value="{$object->nombre}" {/if} autocomplete="off" required/></label>
			<label>(*) Costo:<input type="text" name="costo" placeholder="124213" {if isset($object)} value="{$object->costo}" {/if} autocomplete="off" required/></label>
			<label>(*) Vigencia
				<select name="vigencia">
				<option value="1">1 mes</option> 
				<option value="6">6 meses</option>
				<option value="12">12 meses</option>
				required </select>
			</label>
			<a class="button" href="{$gvar.l_global}login.php">Atrás</a>
			<input class="btn btn-primary" type="submit" value="Crear"/>
			<input class="btn btn-primary" type="reset"  value="Borrar"></center>

	</form>
