<?php
	include_once './classes/DataBaseManager_class.php';
	include_once './classes/Membre_class.php';
	include_once './classes/Produit_class.php';
	include_once './include/commonFunctions.php';
	class MembreManager
	{

		private static function getInsertRequete(Membre $membre)
		{
			$co = DataBaseManager::getInstance();
                        
                        $request = "INSERT INTO Membre VALUES (
			'".$co->protegerString($membre->getId())."',
			'".$co->protegerString($membre->getNom())."',
			'".$co->protegerString($membre->getPrenom())."',
                        '".$co->protegerString($membre->getMdp())."',
			'".$co->protegerString($membre->getAdresse())."'";
                        
                        $request = $request.",'".$co->protegerString($membre->getNumTel())."',
						'".$co->protegerString($membre->getPrivilege())."')";
                        
			return $request;
		}
		
		private static function getInsertRequeteProduit(Produit $produit)
		{
			$co = DataBaseManager::getInstance();
                        
            $request = "INSERT INTO Produit VALUES (
			'".$co->protegerString($produit->getNom())."',
			'".$co->protegerString($produit->getPrix())."',
			'".$co->protegerString($produit->getCategorie())."',
            '".$co->protegerString($produit->getProvenance())."')";
                        
			return $request;
		}

		public static function insertIntoDB(Membre $membre)
		{
			$co = DataBaseManager::getInstance();
			$co->execRequete(self::getInsertRequete($membre));
		}
		
		public static function insertIntoDBProduit(Produit $produit)
		{
			$co = DataBaseManager::getInstance();
			$co->execRequete(self::getInsertRequeteProduit($produit));
		}

		public static function afficherListeMembres()
		{
			$co = DataBaseManager::getInstance();
			$req = $co->execRequete("SELECT m.* FROM Membre m ORDER BY m.nom");
			$err = "";
			while ($donnees = mysqli_fetch_assoc($req))
			{
				$membre = Membre::getMembreFromForm2($err, $donnees["id"],
				$donnees["mdp"],$donnees["nom"], $donnees["prenom"],
				$donnees["adresse"], $donnees["numTel"], $donnees["privilege"]);
				echo $err;
				if (empty($err)) $membre->afficher();
			}
			$co->libereResultatRequete($req);
		}
              
		public static function existeMembre($m)
		{
			$co = DataBaseManager::getInstance();
			$result = mysqli_fetch_row($co->execRequete("SELECT COUNT(id) FROM
			Membre WHERE nom = '".$co->protegerString($m->getNom())."' AND prenom =
			'".$co->protegerString($m->getPrenom())."'"));
			return ($result[0] != 0);
		}
	}
?>