<!-- Page du partenaire -->

<?php $title = 'GBAF - ' . $partner['acteur']; ?>

<!-- Contenu de la page -->
<?php ob_start(); ?>

<!--
	TO DO
-->

<?php 
$content = ob_get_clean();
require('template.php'); 
?>