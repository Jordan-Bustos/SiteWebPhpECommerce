<?php
	function outputEnTeteHTML5($title,$charset,$css_sheet)
	{
		echo '<!doctype html>
		<html lang="fr">
		<head>
			<meta charset="'.$charset.'" content="width=device-width">
			<title>'.$title.'</title>
			<link rel="stylesheet" type="text/css" href="'.$css_sheet.'" media="screen" />
		</head>
		<body>';
		session_start();
	}
	
	function outputFinFichierHTML5()
	{
		echo'
			</body>
			</html>';
	}
        
        
	
	function presentation()
	{
		echo'
			<div class="containall"></div>
				<span class="titre_haut_gauche">
					<h1><br/>E-Commerce de proximit&eacute;<br/> - <br/>Livraison express</h1><br/>
				</span>
			';
		echo'<span class="menu_haut_droite">';
				$display = isset($_SESSION['id']) ? $_SESSION['id'] : false;
				if($display==true)
				{
                    echo '<div class="welcomeUser">
							<p>Bienvenue '.$_SESSION['id'].'</p>
						</div>';
					echo '<div class="panierUser">
							<p>Accéder à mon panier</p>
							<a href="./panier.php"><img src="./image/panier.jpg" alt="panier"/><a/>
						</div>';
                }
				else
				{
					session_unset("id");
				}
		echo'</span>';	
	}
	
	function menu()
	{
		echo'<div class="menu">';
				$display = isset($_SESSION['id']) ? $_SESSION['id'] : false;
				if($display!=true)
				{
					echo '<a href="./connexion.php">Se connecter</a><br/>
							<p>OU</p>
							<a href="./ajouterMembre.php">Cr&eacute;er un compte</a><br/><br/>';
				}
				else
				{
					echo '<a href="./deconnexion.php">D&eacute;connexion</a><br/>'; 
				}
                 echo '
			<hr/><br/>
			<a href="./affichageListeMembres.php" target="" class="">Lister les membres</a><br/>
			<a href="./index.php" target="" class="">Lister les produits</a><br/>';
			$display = (isset($_SESSION['privilege'])&&$_SESSION['privilege']=="vendeur") ? $_SESSION['privilege'] : false;
			if($display==true)
			{
				echo '<a href="./ajouterProduit.php">Ajouter un produit</a><br/>'; 
			}
		echo '</div>';
	}
	
	function piedDePage()
	{
		echo'
			<div class="pied_de_page">
				<div class="section group">
					<div class="col span_1_of_3">
						<h3>E-Commerce de proximit&eacute; - Version 1.0</h3>
						Copyright &copy; 2014 Jey &amp; Bubu Co - Tous droits r&eacute;serv&eacute;s - Mentions L&eacute;gales.
					</div>
					<div class="col span_2_of_3">
					<p>Menu</p>
						<hr/>';
						$display = isset($_SESSION['id']) ? $_SESSION['id'] : false;
						if($display!=true)
						{
							echo '
							<a href="./connexion.php">Connexion</a><br/>
							<a href="./ajouterMembre.php">Cr&eacute;er un compte</a><br/>';
						}
						else
						{
							echo '<a href="./deconnexion.php">D&eacute;connexion</a><br/>';
						}
						
						echo '<a href="./affichageListeMembres.php" target="" class="">Les membres</a><br/>
						<a href="./index.php" target="" class="">Les produits</a><br/>';
						$display = (isset($_SESSION['privilege'])&&$_SESSION['privilege']=="vendeur") ? $_SESSION['privilege'] : false;
						if($display==true)
						{
							echo '<a href="./ajouterProduit.php">Ajouter un produit</a><br/>'; 
						}
					echo'</div>
				</div>
			</div>
		';
	}
?>