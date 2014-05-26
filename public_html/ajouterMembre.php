<?php

	include_once './include/commonFunctions.php';
	include_once './classes/Membre_class.php';

	outputEnTeteHTML5('E-Commerce de proximit&eacute; - Cr&eacute;ation de compte', 'UTF-8', './style/style.css');
	presentation();
	menu();
?>
	<div class="menu_haut_droite">
			<div class="home">
				<a href="./index.php"><img src="./image/retour.png" alt="ImageHome" width="100px" height="100px"/></a>
			</div>
	</div>
	<div class="welcome">	
		<!--<?php include('./menuPrincipal.php'); ?>-->
		<div class="cadre_droit">
			<?php
				// On regarde si des données ont été envoyées
				if (!isset($_POST['saisie_membre_submit']))
				{
					$membre = Membre::getEmptyMembre();
					$membre->generateForm("post", "ajouterMembre.php", NULL);
				}
				else
				{
					$erreurs = array();
					
					$membre = Membre::getMembreFromForm($erreurs,
						htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8'),
						htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8'),
						htmlentities($_POST['prenom'], ENT_QUOTES, 'UTF-8'),
                                                htmlentities($_POST['mdp'], ENT_QUOTES, 'UTF-8'),
                                                htmlentities($_POST['adresse'], ENT_QUOTES, 'UTF-8'),
                                                htmlentities($_POST['numTel'], ENT_QUOTES, 'UTF-8'),
												htmlentities("utilisateur", ENT_QUOTES, 'UTF-8'));
						
					if (MembreManager::existeMembre($membre)) $erreurs["existe"] = "Ce membre est d&eacute;j&agrave; enregistr&eacute;.";
	
					// En cas d'erreurs : on affiche les messages et on affiche de nouveau le formulaire

					if (!empty($erreurs))
					{
						$membre->generateForm("post", "ajouterMembre.php", $erreurs);
					}
					else
					{
						MembreManager::insertIntoDB($membre);
						
						echo '<p align="center">
							<b>Votre compte a &eacute;t&eacute; enregistr&eacute;.<br>
							</br></b>
							</p>';
					}
				}
			?>
		</div>
	</div>
<?php
	piedDePage();
	outputFinFichierHTML5();
?>