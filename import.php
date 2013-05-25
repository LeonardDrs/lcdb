<?php


class Import
{

	protected $table = null;
	protected $connexion = null;
	const DB_NAME = "lescolissql";
	const DB_PORT = "3306";
	const DB_HOST = "10.0.220.185";
	const DB_USER = "lescolissql";
	const DB_PASSWORD = "lcdbpec";
	
	public function __construct()
	{
		if(!empty($_GET["table"])){
			$this->table = htmlspecialchars($_GET["table"]);
		}else{
			exit;
		}
		
		$PARAM_hote= self::DB_HOST;
		$PARAM_port= self::DB_PORT;
		$PARAM_nom_bd= self::DB_NAME;
		$PARAM_utilisateur= self::DB_USER;
		$PARAM_mot_passe= self::DB_PASSWORD;
		
		try
		{
			$this->connexion = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, 
			$PARAM_utilisateur,$PARAM_mot_passe);
		} catch(Exception $e){
        	echo 'Une erreur est survenue !';
        	die();
        }
	}

	public function action(){
		$resultats = $this->connexion->query(sprintf("SELECT * FROM %s", $this->table)); 
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$lignes = $resultats->fetch();
		$json = json_encode($lignes);
		return $json;
	}

}

$import = new Import();
$import->action();
