
<?php
	
	if(!isset($_POST['busqueda'])){
		header("location: index.php");
	}		
?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'lateral1.php'; ?>	
			
	<!-- CAJA PRINCIPAL -->
		<div id="principal">
			

			<h1>Busqueda: <?=$_POST['busqueda']?></h1>

			<?php 
				$entradas = conseguirEntradas ($db, null, null, $_POST['busqueda']);
				
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