<?php
include_once './include/commonFunctions.php';
include_once './include/classes/FormManager_class.php';
include_once './classes/Membre_class.php';

outputEnTeteHTML5('E-Commerce de proximit&eacute; - Authentification', 'UTF-8', './style/style.css');
presentation();
menu();


$co = DataBaseManager::getInstance();
?>
<div class="menu_haut_droite">
    <div class="home">
        <a href="./index.php"><img src="./image/retour.png" alt="ImageHome" width="100px" height="100px"/></a>
    </div>
</div>
<div  class="welcome">	
    <h2>Authentification</h2>
    <p>
        <?php
        // variables du formulaire
        $action = isset($_SESSION['action']) ? $_SESSION['action'] : '';
        $id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
		$privilege = isset($_SESSION['privilege']) ? $_SESSION['privilege'] : '';
        $count = 0;


        // Si aucune action, le formulaire est afficher

            echo 'Veuillez entrer votre Login et Mot de Passe:<br />';
            echo '<form action="./VerifId.php" method="post">';
            echo '<input type="hidden" name="action" value="1">';
            echo 'Login: <input type="text" name="id"><br />';
            echo 'Passe: <input type="password" name="mdp"><br />';
            echo '<input type="submit" value="Connexion">';
            echo '</form>';

        ?>
    </p>
    <p >
        <a href="ajouterMembre.php" > Cr&eacute;er un nouveau compte <a/> 
    <p/>
</div>

<?php
piedDePage();
outputFinFichierHTML5();
?>