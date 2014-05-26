<?php

	include_once './include/commonFunctions.php';
	include_once './classes/Produit_class.php';
	include_once './classes/MembreManager_class.php'; 

	outputEnTeteHTML5('E-Commerce de proximit&eacute; - Ajout de produit', 'UTF-8', './style/style.css');
	presentation();
	menu();
?>
	<div class="welcome">	
		<!--<?php include('./menuPrincipal.php'); ?>-->
		<div class="cadre_droit">
			<?php
				// On regarde si des données ont été envoyées
				if (!isset($_POST['saisie_produit_submit']))
				{
					$produit = Produit::getEmptyProduit();
					$produit->generateForm("post", "ajouterProduit.php", NULL);
				}
				else
				{
					$erreurs = array();
					
					$produit = Produit::getProduitFromForm($erreurs,
						htmlentities($_POST['nom'], ENT_QUOTES, 'UTF-8'),
						htmlentities($_POST['prix'], ENT_QUOTES, 'UTF-8'),
						htmlentities($_POST['categorie'], ENT_QUOTES, 'UTF-8'),
                        htmlentities($_POST['provenance'], ENT_QUOTES, 'UTF-8'));
						
					// En cas d'erreurs : on affiche les messages et on affiche de nouveau le formulaire

					if (!empty($erreurs))
					{
						$produit->generateForm("post", "ajouterProduit.php", $erreurs);
					}
					else
					{
						MembreManager::insertIntoDBProduit($produit);
						
						echo '<p align="center">
							<b>Votre produit a &eacute;t&eacute; enregistr&eacute;.<br>
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