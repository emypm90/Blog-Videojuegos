<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'lateral1.php'; ?>	

<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Crear entradas</h1>
	<p>
		Añade nuevas entradas al blog para que los usuarios 
		puedan leerlas y disfrutar de nuestro contenido.
	</p>
	<br>
	<form action="guardar-entrada.php" method="POST">
		<label for="titulo">Titulo:</label>
		<input type="text" name="titulo">
		<?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'titulo') : ''; ?>

		<label for="descripcion">Descripción:</label>
		<textarea name="descripcion"></textarea>
		<?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'descripcion') : ''; ?>

		<label for="categoria">Categoría</label>
		<select name="categoria">
			<?php
				$categorias = conseguirCategorias($db);
				if(!empty($categorias)):
				while($categoria = mysqli_fetch_assoc($categorias)):
			?>
			<option value="<?= $categoria['id']?>">
				<?= $categoria['nombre']?>
			</option>
			<?php
				endwhile;
				endif;
			?>
			
		</select>
		<?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'categoria') : ''; ?>

		<input type="submit" value="Guardar">
	</form>
	<?php borrarErrores(); ?>
</div> <!-- fin principal -->

<?php require_once 'includes/pie.php'; ?>