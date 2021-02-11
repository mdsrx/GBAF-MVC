<!-- Page des acteurs et partenaires -->

<?php $title = 'GBAF - Acteurs & Partenaires'; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>
<section class="bloc-content presentation">
	<h1>Qu'est-ce que GBAF ?</h1>
	<p>
		<strong>Le Groupement Banque-Assurance Français (GBAF)</strong> est une fédération représentant les 6 grands groupes français (BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale, La Banque Postale).
	</p>
	<p>
		Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l’activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
	</p>
	<h2>Quel est le but de cet extranet ?</h2>
	<p>
		Afin de renseigner au mieux les clients, le GBAF vous propose un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe GBAF ainsi que sur les produits et services bancaires et financiers.
	</p>
	<p>
		Vous avez la possibilité de rechercher les informations dont vous avez besoin et de laisser un avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires.
	</p>
	<img src="public/images/GBAF-illustration.jpg" alt="Illustration de GBAF"/>
</section>
<section class="bloc-content">
	<h2>Acteurs et Partenaires</h2>
	<?php
	while ($partner = $partners->fetch()) {
	?>
	<li>
		<div class="logo_partner">
			<img src="public/images/partners/<?= $partner['logo'] ?>" alt="Logo <?= $partner['acteur'] ?>"/>
		</div>
		<div class="text_partner">
			<h3><?= $partner['acteur'] ?></h3>
			<p>
				<?= substr(htmlspecialchars($partner['description']), 0, strpos(htmlspecialchars($partner['description']), ".", 1) + 1) . ' [...]' ?>
			</p>
			<div class="likes_display">
				<div class="vote">
					<p>
						<img src="public/images/like.png" alt="Icône J'aime"/>
						<?= ?>
					</p>
				</div>
				<div class="vote">
					<p>
						<img src="public/images/dislike.png" alt="Icône Je n'aime pas"/>
						<?= ?>
					</p>
				</div>				
				<div class="vote">
					<p>
						<img src="public/images/comment.png" alt="Icône Commentaires"/>
						<?= ?>
					</p>
				</div>
			</div>
			<a href="#?<?= $partner['id_acteur'] ?>" class="button">Afficher la suite ></a>
		</div>
	</li>
	<?php
	}
	$partners->closeCursor();
	?>
</section>
<?php 
$content = ob_get_clean();
require('template.php'); 
?>