<?php

	include_once './include/commonFunctions.php';
	include_once './classes/Membre_class.php';

	outputEnTeteHTML5('E-Commerce de proximit&eacute; - Affichage des membres', 'UTF-8', './style/style.css');
	presentation();
	menu();
?>
		<div class="welcome">	
		
			<p align="center"><b>Liste des membres : </b></p>
			<?php MembreManager::afficherListeMembres(); ?>
		</div>
	

<?php
	piedDePage();
	outputFinFichierHTML5();  
?>


