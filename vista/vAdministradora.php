<?php
include("controlador/cAdministradora.php")
?>

<div align="left">

<h3>Administradoras</h3><br>
<div class="form-group">
	<form id="formTipoAd" name = "formTipoAd" method="POST" action="" class="form-inline">
		<label>Tipo de Administradora</label>
		<input type="text" name="TiAd" id = "TiAd" required = "required"/>
		<input type="submit" value="Guardar" class="btn btn-default">
	</form>
</div>

<div>
<form  name="form2" method="get" action="home.php?pac=105" onSubmit="return confirm('¿Desea eliminar?')">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>C&oacute;digo</th>
				<th>Tipo Administradora</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				for($i = 0; $i<count($TipoAds); $i++){
			?>
			<tr>
				<td><?php echo$TipoAds[$i]['IdTipoAdministradora']?></td>
				<td><?php echo $TipoAds[$i]['Nombre']?></td>
				<td align = "center"><a href = "home.php?pr=<?php echo $TipoAds[$i]['IdTipoAdministradora'] ?>&pac=<?php echo $pac; ?>&up=101"><input type="button" name="del" value="Editar"/></a>
				<button value="<?php echo $TipoAds[$i]['IdTipoAdministradora']?>" name="del">Eliminar</button></a></td>
			</tr>
			<?php
				}
			?>
			<tr></tr>
		</tbody>
	</table>
</form>
</div>
<br><br><br>
<div class="form-group">
	<form id="formAdm" name = "formAdm" method="POST" action="" class="form-inline">
		<label>Administradora</label>
		<input type="text" name="admin" id = "admin" required = "required"/>
		<select class="form-control" id="IdTipoAd" name="IdTipoAd" required="required">
		    <option value="0" selected="selected"> </option>
		    <?php 
		        for($i = 0; $i<count($TipoAds); $i++){
		    ?>
		    <option value="<?php echo $TipoAds[$i]['IdTipoAdministradora']; ?>"> <?php echo $TipoAds[$i]['Nombre'];?> </option>
		    <?php
		        }
		    ?>
		</select>
		<input type="submit" value="Guardar" class="btn btn-default">
	</form>
</div>

<div class="table-responsive">
	<br/><br/><h3>Administradoras Activas</h3>
	<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            Administradora
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->SelAdm($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div><br>

