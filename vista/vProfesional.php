<?php
include("controlador/cProfesional.php")
?>

<div align="left">

<h3>Ingresar Profesionales</h3>

<div class="form-group">
	<table class="table">
	<form id="formProf" name = "formProf" method="POST" action="" class="form-inline">
		<tr>
		<td>
			<label for= "PriApe">Primer Apellido &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="PriApe" class="form-control" id="PriApe" required = "required"/>
		</td>
		<td>
			<label for= "SegApe">Segundo Apellido &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="SegApe" class="form-control" id="SegApe" />
		</td>
		<!-- </tr>
		<tr> -->
			<td>
			<label for= "PriNom">Primer Nombre &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="PriNom" class="form-control" id="PriNom" required = "required"/>
		</td>
		<td>
			<label for= "SegNom">Segundo Nombre &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="SegNom" class="form-control" id="SegNom"/>
		</td>
		</tr>
		<tr>
		<td>
			<label>Tipo de Identificaci&oacute;n</label><br>
			<select class="form-control" id="TipoDoc" name="TipoDoc" required="required">
		    <option value="0" selected="selected"> </option>
		    <?php 
		        for($i = 0; $i<count($Tipoide); $i++){
		    ?>
		    <option value="<?php echo $Tipoide[$i]['IdTipoIdentificacion']; ?>"> <?php echo $Tipoide[$i]['Nombre'];?> </option>
		    <?php
		        }
		    ?>
			</select>
		</td>
		<td>
			<label for= "Ide">Identificaci&oacute;n &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="Ide" class="form-control" id="Ide" required = "required"/>
		</td>
	<!-- 	</tr>
		<tr> -->
		<td>
			<label for= "Reg">Registro Profesional &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="Reg" class="form-control" id="Reg" required = "required"/>
		</td>
		<td>
			<label for= "mail">E-Mail &nbsp;&nbsp;&nbsp;</label><br>
			<input type="email" name="mail" class="form-control" id="mail"/>
		</td>
		</tr>
		<tr>
		<td>
			<label for= "Dire">Direcci&oacute;n &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="Dire" class="form-control" id="Dire"/>
		</td>
		<td>
			<label for= "Tel">Tel&eacute;fono &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="Tel" class="form-control" id="Tel"/>
		</td>
		<td>
			<label for= "Cel">Celular &nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="Cel" class="form-control" id="Cel"/>
		</td>
		<td>
			<label for= "Conm">Conmutador&nbsp;&nbsp;&nbsp;</label><br>
			<input type="text" name="Conm" class="form-control" id="Conm"/>
		</td>
		</tr>
		<tr>
		<td colspan="3">
			<label for= "Obs">Observaciones&nbsp;&nbsp;&nbsp;</label><br>
			<textarea class="form-control" rows="3" cols="20" style="resize:none" name="Obs" id="Obs"></textarea>
		</td>
		<td>
			<label>Usuario</label><br>
			<select class="form-control" id="IdUsu" name="IdUsu" required="required">
		    <option value="0" selected="selected"> </option>
		    <?php 
		        for($i = 0; $i<count($Usu); $i++){
		    ?>
		    <option value="<?php echo $Usu[$i]['IdUsuario']; ?>"> <?php echo $Usu[$i]['Nombre'];?> </option>
		    <?php
		        }
		    ?>
			</select>
		</td>
		</tr>
	</table>
		<br><input type="submit" value="Guardar" class="btn btn-default">
		<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>     
		<a href="home.php"><input type="button" value="Cancelar" class="btn btn-default"></a>
	</form>
</div>

<div class="table-responsive">
	<br/><br/><h3>Profesionales Activos</h3>
	<div align="right"><table width="650"><tr>
    <td>
        <form id="formfil" name="formfil" method="GET" action="home.php">
            <input name="pac" type="hidden" value="<?php echo $pac; ?>" />
            Nombre
            <input type="text" name="filtro" value="<?php echo $filtro;?>" onChange="this.form.submit();">
            <input id="boton2" type="submit" name="busca" value="Buscar" />
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pag->spag($conp,$nreg,$pac,$bo); 
            $dat=$ins->SelProf($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div><br>

<form  name="form2" method="get" action="home.php?pac=104" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th colspan="2">Nombre</th>
			<th>Identificaci&oacute;n</th>
			<th>Registro Prof.</th>
			<th>Celular</th>
			<th>Tel&eacute;fono</th>
			<th>Direcci&oacute;n</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			for($i = 0; $i<count($dat); $i++){
		?>
		<tr>
			<td colspan = "2"><?php echo $dat[$i]['PrimerNombre']." ".$dat[$i]['PrimerApellido']?></td>
			<td><?php echo $dat[$i]['Identificacion']?></td>
			<td><?php echo $dat[$i]['RegistroProfesional']?></td>
			<td><?php echo $dat[$i]['Celular']?></td>
			<td><?php echo $dat[$i]['Telefono']?></td>
			<td><?php echo $dat[$i]['Direccion']?></td>
			<td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['IdUsuario'] ?>&pac=<?php echo $pac; ?>&up=101"><input type="button" name="del" value="Editar"/></a>
			<button value="<?php echo $dat[$i]['idusuario']?>" name="del">Eliminar</button></a></td>
		</tr>
		<?php
			}
		?>
		<tr></tr>
	</tbody>
</table>
</form>
</div>
</div>