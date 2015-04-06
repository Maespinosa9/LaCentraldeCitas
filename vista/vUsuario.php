<?php
include("controlador/cUsuario.php")
?>

<div align="left"	>

<h3>Ingresar Usuarios</h3>
<div class="form-group">
	<form id="formUsu" name = "formUsu" method="POST" action="" class="form-horizontal">
		<label for= "Nombre">Nombre &nbsp;&nbsp;&nbsp;</label><br>
		<input type="text" name="Nombre" id="Nombre" class="form-control" required="required"><br>
		<label for= "pass">Contrase&ntilde;a &nbsp;&nbsp;&nbsp;</label><br>
		<input type="password" name="pass" id="pass" class="form-control" required="required"><br>
		<label>Pregunta Para Recordar Contrase&ntilde;a</label><br>
		<input type="text" name="preg" id = "preg" class = "form-control" required="required"><br>
		<label>Respuesta</label><br>
		<input type="password" name="res" id = "res" class = "form-control" required="required"><br>
		<label>E-Mail</label><br>
		<input type="email" name="mail" id = "mail" class = "form-control" required="required"><br>
		<label>Tipo de Usuario</label><br>
		<select class="form-control" id="TipoUsu" name="TipoUsu" required="required">
		    <option value="0" selected="selected"> </option>
		    <?php 
		        for($i = 0; $i<count($TipoUsu); $i++){
		    ?>
		    <option value="<?php echo $TipoUsu[$i]['IdTipoUsuario']; ?>"> <?php echo $TipoUsu[$i]['Nombre'];?> </option>
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
	<br/><br/><h3>Usuarios Activos</h3>
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
            $dat=$ins->selUsu2($filtro, $pag->rvalini(), $pag->rvalfin());
        ?>
    </td>
</tr></table></div><br>
	<form  name="form2" method="get" action="home.php?pac=104" onSubmit="return confirm('¿Desea eliminar?')">
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>E-mail</th>
			<th>Tipo Usuario</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			for($i = 0; $i<count($dat); $i++){
		?>
		<tr>
			<td><?php echo$dat[$i]['Nombre']?></td>
			<td><?php echo $dat[$i]['E_mail']?></td>
			<td><?php echo $dat[$i]['TipoUsuario']?></td>
			<td align = "center"><a href = "home.php?pr=<?php echo $dat[$i]['IdUsuario'] ?>&pac=<?php echo $pac; ?>&up=101"><input type="button" name="del" value="Editar"/></a>
			<button value="<?php echo $dat[$i]['idusuario']?>" name="del">Eliminar</button></a></td>
		</tr>
		<?php
			}
		?>
		<tr></tr>
	</tbody>
</table>
</div>