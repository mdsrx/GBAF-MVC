<!-- Page du partenaire -->

<?php $title = 'GBAF - ' . $partner['acteur']; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>

<section class="bloc-content partenaire">
	<div class="logo_fullwidth">
		<img src="public/images/partners/<?= $partner['logo'] ?>" alt="Logo <?= $partner['acteur'] ?>"/>
	</div>
	<h1><?= $partner['acteur'] ?></h1>
	<p><?= $partner['description'] ?></p>

	<div class="likes">
	</div>
</section>

<section class="bloc-content comment">
	<h2>Commentaires</h2>
	<ul>
		<?php
		while ($comment = $comments->fetch()) {
			if ($comment['id_user'] == $_SESSION['id_user']) {
				$commented = true;
				$comment_user = $comment['post'];
			}
		?>
		<li class="post">
			<h3><?= $comment['prenom'] . " " . $comment['nom'] . " " ?><em><?= $comment['dateCom'] ?></em></h3>
			<p><?= $comment['post']?></p>
		</li>
		<?php
		}
		$comments->closeCursor();
		?>
	</ul>


</section>
<?php 
$content = ob_get_clean();
require('template.php'); 
?>