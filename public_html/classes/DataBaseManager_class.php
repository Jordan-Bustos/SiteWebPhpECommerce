<?php
	class DataBaseManager
	{

		static private $lienBDD = null;
		static private $instance = null;

		public static function getInstance()
		{
			if (self::$instance == null) self::$instance = new self;
			return self::$instance;
		}

		public function closeInstance()
		{
			self::$instance->__destruct();
		}

		private function __construct()
		{
			try
			{
				self::$lienBDD = mysqli_init();
				mysqli_real_connect(self::$lienBDD, "localhost", "root", "", "dbjepoinas")
				or die ("Impossible de se connecter &agrave; mysql (base de donn&eacute;es bdd) :
				".mysqli_error(self::$lienBDD));
			}
			catch (Exception $e) { die($e->getMessage()); }
		}

		public function __destruct()
		{
			if (self::$instance != null)
			{
				mysqli_close(self::$lienBDD);
				self::$instance = null;
				self::$lienBDD = null;
			}
		}

		public function execRequete($requete)
		{
			try
			{
				$result = mysqli_query(self::$lienBDD, $requete)
				or die ("Erreur lors de l'&eacute;x&eacute;cution de la requ&ecirc;te : ".mysqli_error(self::$lienBDD));
			}
			catch (Exception $e) 
				{ $result = false; }
			return $result;
		}

		public function libereResultatRequete($result)
		{
			if (strcmp(gettype($result), 'Object') == 0 && strcmp(get_class($result), 'mysqli_result') == 0)
				mysqli_free_result($result);
                }
                
                public function protegerString($string)
		{
                    return mysqli_real_escape_string(self::$lienBDD,$string);
		}
                
	}
?>
