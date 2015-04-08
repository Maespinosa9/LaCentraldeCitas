<?php
include("controlador/cTipoIdentificacion.php")
?>

<div align="left"><br>
<h3>Ingresar Tipos de Identificaci&oacute;n</h3>
<div class="form-group">
	<br><br><form id="formTipoIden" name = "formTipoIden" method="POST" action="" class="form-horizontal">
		<label for= "Nombre">Descripci&oacute;n &nbsp;&nbsp;&nbsp;</label><br>
		<input type="text" name="Nombre" id="Nombre" class="form-control" required="required"><br>
		<br><input type="submit" value="Guardar" class="btn btn-default">
		<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
		<a href="home.php"><input type="button" value="Cancelar" class="btn btn-default"></a>
	</form>
</div>


<div class="table-responsive">
	<br/><br/><h3>Tipos de Ientificaci&oacute;n Activos</h3>
	<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            Descripci&oacute;n
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->SelTipoUsu($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div><br>

<form  name="form2" method="get" action="home.php?pac=102" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>C&oacute;digo</th>
			<th>Tipo de Identificaci&oacute;n</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			for($i = 0; $i<count($dat); $i++){
		?>
		<tr>
			<td><?php echo$dat[$i]['IdTipoIdentificacion']?></td>
			<td><?php echo$dat[$i]['Nombre']?></td>
			<td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['IdTipoIdentificacion'] ?>&pac=<?php echo $pac; ?>&up=102"><input type="button" name="del" value="Editar"/></a>
			<button value="<?php echo $dat[$i]['IdTipoIdentificacion']?>" name="del">Eliminar</button></a></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
</form>
</div>
</div>