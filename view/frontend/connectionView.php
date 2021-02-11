<!-- Page d'index / connexion -->

<?php $title = 'GBAF - Accueil'; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>
<!-- Connexion -->
<section class="bloc-content">
	<h2>Connexion</h2>
	<div class="error">
		<?php
		/*
		if (isset($_GET['connexion']) && $_GET['connexion'] == '0') {
			echo '<p>Le pseudo ou le mot de passe est incorrect.</p>';
		}
		*/
		?>
	</div>
	<form method="post" action="#">
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" maxlength="255" autocomplete="username" required />
		</p>
		<p>
			<label for="pass">Mot de passe</label>
			<input type="password" id="pass" name="pass" maxlength="255" autocomplete="current-password" required />
		</p>
		<input type="submit" name="connexion" value="Se connecter >" class="button" />
	</form>
	<p>
		<a href="#"><em>Mot de passe oublié ?</em></a>
	</p>
</section>
<!-- Inscription -->
<section class="bloc-content">
	<h2>Première visite ?</h2>
	<p>Pour profiter de nos services, créez dès à présent un compte sur l'extranet de GBAF.</p>
	
	<p>
		<a class="button" href="#">S'inscrire ></a>
	</p>
</section>
<?php $content = ob_get_clean(); ?>