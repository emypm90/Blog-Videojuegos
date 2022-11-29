<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'lateral1.php'; ?>	

<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Crear categorías</h1>

	<form action="guardar-categoria.php" method="POST">
		<p>
			Añade nuevas categorías al blog para que los usuarios 
			puedan usarlas al crear sus entradas.
		</p>
		<br>
		<label>Nombre de la categoría</label>
		<input type="text" name="nombre">
		<input type="submit" value="Guardar">
	</form>

</div> <!-- fin principal -->

<?php require_once 'includes/pie.php'; ?>