<?php
include("controlador/cSuscripcion.php")
?>

<div align="left">

<h3>Crear Suscripci&oacute;n</h3>
<div class="form-group">
	<form id="formSus" name = "formSus" method="POST" action="" class="form-horizontal">
		<label>Vendedor</label><br>
		<select class="form-control" id="IdVen" name="IdVen" required="required">
		    <option value="0" selected="selected"> </option>
		    <?php 
		        for($i = 0; $i<count($Vendedor); $i++){
		    ?>
		    <option value="<?php echo $Vendedor[$i]['IdUsuario']; ?>"> <?php echo $Vendedor[$i]['Nombre'];?> </option>
		    <?php
		        }
		    ?>
		</select><br/>
		<label>Usuario de Creaci&oacute;n</label><br>
		<select class="form-control" id="UsCre" name="UsCre" required="required">
		    <option value="0" selected="selected"> </option>
		    <?php 
		        for($i = 0; $i<count($Vendedor); $i++){
		    ?>
		    <option value="<?php echo $Vendedor[$i]['IdUsuario']; ?>"> <?php echo $Vendedor[$i]['Nombre'];?> </option>
		    <?php
		        }
		    ?>
		</select><br/>
		<label>Profesional</label><br>
		<select class="form-control" id="Prof" name="Prof" required="required">
		    <option value="0" selected="selected"> </option>
		    <?php 
		        for($i = 0; $i<count($Prof); $i++){
		    ?>
		    <option value="<?php echo $Prof[$i]['IdProfesional']; ?>"> <?php echo $Prof[$i]['PrimerNombre']." ".$Prof[$i]['SegundoNombre']." ".$Prof[$i]['PrimerApellido']." ".$Prof[$i]['SegundoApellido'] ;?> </option>
		    <?php
		        }
		    ?>
		</select><br/>
		<br><input type="submit" value="Guardar" class="btn btn-default">
		<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
		<a href="home.php"><input type="button" value="Cancelar" class="btn btn-default"></a>
	</form> 
</div>

<div class="table-responsive">
	<br/><br/><h3>Suscripciones Activas</h3>
	<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            Profesional
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->SelSus($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div><br>

</div>
