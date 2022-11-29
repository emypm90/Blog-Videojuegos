<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
	$categoria_actual = conseguirCategoria($db, $_GET['id']);
	if(!isset($categoria_actual['id'])){
		header("location: index.php");
	}		
?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'lateral1.php'; ?>	
			
	<!-- CAJA PRINCIPAL -->
		<div id="principal">
			

			<h1>Entradas de <?=$categoria_actual['nombre']?></h1>

			<?php 
				$entradas = conseguirEntradas($db, null, $_GET['id']);
				if(!empty($entradas)) :
					while($entrada = mysqli_fetch_assoc($entradas)):
			?>
						<article clas="entrada">
							<a href="entrada.php?id=<?= $entrada['id']?>">
							<h2><?= $entrada['titulo']?></h2>
							<span class="fecha"><?= $entrada['categoria'].' | '. $entrada['fecha']?></span>
							<p>
								<?=$entrada['descripcion']?>
							</p>	
						</article>

			<?php
					endwhile;
				endif;
			?>

		</div> <!-- fin principal -->

		<?php require_once 'includes/pie.php'; ?>