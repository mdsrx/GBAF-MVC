<!-- Page profil -->

<?php $title = 'GBAF - Paramètres du compte'; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>
<div class="bloc-content">
	<!-- Informations de l'utilisateur -->
	<h2>Paramètres du compte</h2>
	<div class="confirmation">
		<?php
		/*
		if (isset($_GET['update']) && $_GET['update'] == '0') {
			echo '<p>Informations mises à jour.</p>';
		}
		*/
		?>
	</div>
	<form method="post" action="#">
		<p>
			<input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
		</p>
		<p>
			<label for="lastname">Nom</label>
			<input type="text" name="lastname" id="lastname" maxlength="255" value="<?php echo $user['nom'] ?>" required />
		</p>
		<p>
			<label for="firstname">Prénom</label>
			<input type="text" name="firstname" id="firstname" maxlength="255" value="<?php echo $user['prenom'] ?>" required />
		</p>
		<p>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" maxlength="255" value="<?php echo $user['username'] ?>" required />
		</p>
		<p>
			<label for="pass">Mot de passe</label>
			<input type="password" name="pass" id="pass" maxlength="255" value="<?php echo $user['password'] ?>" required />
		</p>
		<p>
			<label for="question">Question secrète</label>
			<input type="text" name="question" id="question" maxlength="255" value="<?php echo $user['question'] ?>" required />
		</p>
		<p>
			<label for="answer">Réponse secrète</label>
			<input type="text" name="answer" id="answer" maxlength="255" value="<?php echo $user['reponse'] ?>" required />
		</p>
		<input type="submit" class="button" name="inscription" value="Mettre à jour les informations >" />
	</form>
</div>
<?php 
$content = ob_get_clean();
require('template.php'); 
?>