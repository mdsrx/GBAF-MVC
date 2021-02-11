<!-- Page d'inscription -->

<?php $title = 'GBAF - Inscription'; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>
<!-- Inscription -->
<section class="bloc-content">
	<h2>Inscription</h2>
	<div class="error">
		<?php
		/*if (isset($_GET['pass']) && $_GET['pass'] == '0') {
			echo "<p>Les deux mots de passe ne correspondent pas.</p>";
		}
		if (isset($_GET['pseudo']) && $_GET['pseudo'] == '0') {
			echo "<p>Le pseudo est déjà pris. Veuillez en choisir un autre.</p>";
		}
		*/
		?>
	</div>
	<form method="post" action="index.php?action=registeruser">
		<p>
			<label for="lastname">Nom</label>
			<input type="text" name="lastname" id="lastname" maxlength="255" required />
		</p>
		<p>
			<label for="firstname">Prénom</label>
			<input type="text" name="firstname" id="firstname" maxlength="255" required />
		</p>
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" maxlength="255" required />
		</p>
		<p>
			<label for="pass">Mot de passe</label>
			<input type="password" name="pass" id="pass" maxlength="255" required />
		</p>
		<p>
			<label for="passconfirm">Confirmer le mot de passe</label>
			<input type="password" name="passconfirm" id="passconfirm" maxlength="255" required />
		</p>
		<p>
			<label for="question">Question secrète</label>
			<input type="text" name="question" id="question" maxlength="255" required />
		</p>
		<p>
			<label for="answer">Réponse secrète</label>
			<input type="text" name="answer" id="answer" maxlength="255" required />
		</p>
		<input type="submit" class="button" name="inscription" value="S'inscrire >" />
	</form>	
</section>
<?php 
$content = ob_get_clean();
require('template.php'); 
?>