<?php require_once 'includes/cabecera.php'; ?>

<?php require_once 'lateral1.php'; ?>	
			
	<!-- CAJA PRINCIPAL -->
		<div id="principal">
			<h1>Todas las  entradas</h1>

			<?php 
				$entradas = conseguirEntradas($db, null);
				if(!empty($entradas)) :
					while($entrada = mysqli_fetch_assoc($entradas)):
			?>
						<article class="entrada">
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