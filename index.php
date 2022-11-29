<?php require_once 'includes/cabecera.php'; ?>

<?php require_once 'lateral1.php'; ?>	
			
	<!-- CAJA PRINCIPAL -->
		<div id="principal">
			<h1>Ultimas entradas</h1>

			<?php 
				$entradas = conseguirEntradas($db, true);
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

			<div id="ver-todas">
				<a href="entradas.php">Ver todas las entradas</a>
			</div>
		</div> <!-- fin principal -->

		<?php require_once 'includes/pie.php'; ?>