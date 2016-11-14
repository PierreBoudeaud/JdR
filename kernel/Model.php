<?php
	/**
	*		@author LUTAU T
	*/
	abstract class Model{
		
		private $table;
		private $pk;
		private $attribTech;
		private $autoincrement;
		
		/**
		*		__construct - Constructeur de la classe Model
		*		$table et $pk font partis de l'objet Model.
		*
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function __construct($table, $pk, $autoincrement){
			$this->table = $table;
			$this->pk = $pk;
			$this->autoincrement = $autoincrement;
			$this->attribTech = array('table', 'pk','attribTech', 'autoincrement');
		}
		
		public function lineExist($id){
			$req = "SELECT COUNT(*) FROM {$this->table} WHERE {$this->pk} = '{$id}'";
			$DB = $this->connexion();
			$rep = $DB->prepare($req);
			$rep->execute();
			$row = $rep->fetch();
			return($row['0'] > 0);
			
		}
		
		/**
		*		connexion - Connexion à la base de données
		*		Charge les informations de connexion depuis un fichier configuration (.ini)
		*
		*		@return PDO La connexion à la base de donnée
		*		@author BOUDEAUD P
		*		@date 04/10/2016
		*/
		protected function connexion(){
			$ini_parse = parse_ini_file(CONF."bdd.ini", true);//Fichier de configuration
			$dsn = $ini_parse['database']['type'].":dbname=".$ini_parse['database']['dbName'].";host=".$ini_parse['database']['host'].";port=".$ini_parse['database']['port'];
			try{
				$DB = new PDO($dsn, $ini_parse['database']['pseudo'], $ini_parse['database']['mdp']);
			}catch(PDOException $e){
				echo "Connexion échouée : ".$e->getMessage();
				$DB = null;
			}
			return $DB;
		}
		
		
		/**
		*		create - Créer un enregistrement dans la base de données
		*		Créer un enregistrement à partir de l'objet courant
		*
		*		@see Model::connexion()		Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function create(){
				$prop = "";
				$value = "";
			
				if($this->autoincrement){
					$this->attribTech[] = $this->pk;
				}
				foreach($this as $key=>$val){
					if(!in_array($key, $this->attribTech)){
						$prop = "{$prop} {$key},";
						$value = "{$value} '{$val}',";
					}
				}
				$prop = substr($prop, 0, -1);
				$value = substr($value, 0, -1);
				$req = "INSERT INTO {$this->table}({$prop}) VALUES({$value})";
				echo "<br>".$req."<br>";
				$bdd = $this->connexion();
				$bool = $bdd->exec($req);
				$bdd = null;
				return $bool;
		}
		
		
		
		/**
		*		update - Modifier un enregistrement dans la base de données
		*		Modifie un enregistrement à partir de l'identifiant de l'objet courant
		*
		*		@param String $id identifiant de l'enregistrement à modifier
		*		@see Model::connexion()		Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function update(){
			$bool = $this->lineExist($this->{$this->pk});
			if($bool){
				$tabAttrib = $this->attribTech;
				$req = "UPDATE {$this->table} SET ";
			
				if(!in_array($this->pk, $tabAttrib)){
					$tabAttrib[] = $this->pk;
				}
			
				foreach($this as $key=>$val){
					if(!in_array($key, $tabAttrib)){
						$req = "{$req} {$key} = '{$val},'";
					}
				}
				$req = substr($req, 0, -1);
				$req = $req . " WHERE {$this->pk} = {$this->{$this->pk}}";
				echo "<br>".$req."<br>";
				$bdd = $this->connexion();
				$bdd->exec($req);
				$bdd = null;
			}
			return $bool;
		}
		
		
		/**
		*		delete - Suppression un enregistrement de la base de données
		*		Supprime un enregistrement dans la base de données en fonction de l'id
		*
		*		@param String $id identifiant de l'enregistrement à supprimer
		*		@see Model::connexion()		 Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function delete($id){
			$bool = $this->lineExist($id);
			if($bool){
				$req = "DELETE FROM {$this->table} WHERE {$this->pk} = '{$id}'";
				echo $req;
				$bdd = $this->connexion();
				$bdd->exec($req);
				$bdd = null;
			}
			return $bool;
		}
		
		
		/**
		*		read - Lire un enregistrement
		*		Lit un enregistrement en fonction de l'id
		*
		*		@param String $id identifiant de l'enregistrement à lire
		*		@see Model::connexion()		Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function read($id){
			$bool = $this->lineExist($id);
			if($bool){
				$req = "SELECT * FROM {$this->table} WHERE {$this->pk} = '{$id}'";
				$bdd = $this->connexion();
				$rep = $bdd->query($req);
				$result = $rep->fetch(PDO::FETCH_ASSOC);
				$rep->closeCursor();
				$bdd = null;
				foreach($result as $key=>$val){
					$this->$key = $val;
				
				}
			}
			return $bool;
		}
		
		
		/**
		*		find - trouver un enregistrement
		*		Trouve un enregistrement en fonction d'une condition
		*
		*		@param String $condition condition pour trier les enregistrements à trouver
		*		@see Model::connexion()		Connexion à la base
		*		@author LUTAU T
		*		@date 27/09/2016
		*/
		public function find($condition){
			$req = "SELECT * FROM {$this->table} WHERE {$condition}";
			$bdd = $this->connexion();
			$rep = $bdd->query($req);
			while($result = $rep->fetch(PDO::FETCH_ASSOC)){
					$tmp[] = $result;
			}
			$rep->closeCursor();
			$bdd = null;
			if(empty($tmp)){
				$tmp[][] = null;
			}
		return($tmp);
		}
	}
	
?>