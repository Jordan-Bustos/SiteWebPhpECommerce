<?php
include_once './include/commonFunctions.php';
include_once './include/classes/FormManager_class.php';
include_once './classes/Produit_class.php';

	outputEnTeteHTML5('E-Commerce de proximité - Livraison express', 'UTF-8', './style/style.css');
	presentation();
	menu();
?>
		<div  class="welcome">	
			<h2>Bienvenue sur le Drive Local de Paray-le-Monial</h2>
			<p>
				Le site de E-Commerce de Paray-le-Monial vous permettra d'effectuer vos achats rapidement et simplement depuis chez vous !<br/><br/>
				<b>Liste des produits disponibles :</b> <br/>
				<?php ProduitManager::afficherListeProduits(); ?>  
			</p>
		</div>
                

<?php
	piedDePage();
	outputFinFichierHTML5();
?>
