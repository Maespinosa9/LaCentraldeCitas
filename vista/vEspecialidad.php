<?php
include("controlador/cEspecialidad.php");
?>

<div align="left">

<h3>Especialidades</h3><br>
<div class="form-group">
	<form id = "formEsp" name = "formEsp" action= "" method="Post" class="form-inline">
		<label>Especialidad</label>
		<input type="text" name="Espe" id = "Espe" required = "required"/>
		<input type="submit" value="Guardar" class="btn btn-default">
	</form>
</div>

<div class="table-responsive">
	<h3>Especialidades Activas</h3>
	<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            Especialidad
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->SelEsp($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div><br>

<form  name="form3" method="get" action="home.php?pac=107" onSubmit="return confirm('¿Desea eliminar?')">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>Especialidad</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				for($i = 0; $i<count($dat); $i++){
			?>
			<tr>
				<td><?php echo $dat[$i]['Nombre']?></td>
				<td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['IdEspecialidad'] ?>&pac=<?php echo $pac; ?>&up=101"><input type="button" name="del" value="Editar"/></a>
				<button value="<?php echo $dat[$i]['IdEspecialidad']?>" name="del">Eliminar</button></a></td>
			</tr>
			<?php
				}
			?>
			<tr></tr>
		</tbody>
	</table>
</form>

