<?php
	include_once './classes/DataBaseManager_class.php';
	session_start();
		$id=($_POST['id']);
		$mdp=($_POST['mdp']);
		$privilege="utilisateur";
		$co = DataBaseManager::getInstance();
		$count=0;
		$req = $co->execRequete("SELECT nom,privilege FROM membre WHERE nom='$id'AND mdp='$mdp'");
		while ($donnees = mysqli_fetch_assoc($req)) 
		{
			$id = $donnees["nom"];
			$privilege = $donnees["privilege"];
			$count = $count + 1;
		}
		$co->libereResultatRequete($req);
		if ($count > 0) 
		{
			$_SESSION['id'] = $id;
			
			echo "<script type='text/javascript'>document.location.replace('./index.php');</script>";
		}
		else
		{
			echo "<script type='text/javascript'>document.location.replace('./connexion.php');</script>";
		}
		$_SESSION['privilege'] = $privilege;
?>
