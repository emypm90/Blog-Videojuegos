<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
	$entrada_actual = coseguirEntrada($db, $_GET['id']);
	if(!isset($entrada_actual['id'])){
		header("location: index.php");
	}		
?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'lateral1.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
	<h1>Editar entradas</h1>
	<p>
		Edita tu entrada <?=$entrada_actual['titulo']?>
	</p>
	<br>
	<form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
		<label for="titulo">Titulo:</label>
		<input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>">
		<?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'],'titulo') : ''; ?>

		<label for="descripcion">Descripción:</label>
		<textarea name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
		<?php echo isset($_SESSION['errores']) ? mostrarErrores($_SESSION['errores'], 'descripcion') : ''; ?>

		<label for="categoria">Categoría</label>
		<select name="categoria">
			<?php
				$categorias = conseguirCategorias($db);
				if(!empty($categorias)):
				while($categoria = mysqli_fetch_assoc($categorias)):
			?>
			<option value="<?= $categoria['id']?>"
				<?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected = "selected"' : ''?>
				>
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