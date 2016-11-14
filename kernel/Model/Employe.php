<?php
	/**
	*		Classe de gestion d'employés
	*		@author LUTAU T
	*		@version 1.0
	*/
	
	include(APP.'Model.php');
	
	class Employe extends Model {
		//Attributs métier
		protected $emp_matricule;
		protected $emp_nom;
		protected $emp_prenom;
		protected $emp_rue;
		protected $emp_ville;
		protected $emp_codepostal;
		protected $emp_tel;
		protected $emp_portable;
		protected $emp_email;
		protected $emp_dateembauche;
		protected $emp_quotite;
		
		public function __construct($emp_matricule, $emp_nom, $emp_prenom, $emp_rue, $emp_ville, $emp_codepostal, $emp_tel, $emp_portable, $emp_email, $emp_dateembauche, $emp_quotite){
			parent::__construct("employe", "emp_matricule", false);
			$this->emp_matricule = $emp_matricule;
			$this->emp_nom = $emp_nom;
			$this->emp_prenom = $emp_prenom;
			$this->emp_rue = $emp_rue;
			$this->emp_ville = $emp_ville;
			$this->emp_codepostal = $emp_codepostal;
			$this->emp_tel = $emp_tel;
			$this->emp_portable = $emp_portable;
			$this->emp_email = $emp_email;
			$this->emp_dateembauche = $emp_dateembauche;
			$this->emp_quotite = $emp_quotite;
			
		}
		
		/**
		*		setmatricule - modifie le matricule de l'employé
		*
		*		@param string le nouveau matricule
		*		@date 04/10/2016
		*/
		public function setMatricule($emp_matricule){
			$this->emp_matricule = $emp_matricule;
		}
		
		/**
		*		getmatricule - renvoie le matricule de l'employé
		*
		*		@return string le matricule
		*		@date 04/10/2016
		*/
		public function getMatricule(){
			return $this->emp_matricule;
		}
		
		/**
		*		setnom - modifie le nom de l'employé
		*
		*		@param string le nouveau nom
		*		@date 04/10/2016
		*/
		public function setNom($emp_nom){
			$this->emp_nom = $emp_nom;
		}
		
		/**
		*		getnom - renvoie le nom de l'employé
		*
		*		@return string le nom
		*		@date 04/10/2016
		*/
		public function getNom(){
			return $this->emp_nom;
		}
		
		/**
		*		setprenom - modifie le prénom de l'employé
		*
		*		@param string le nouveau prénom
		*		@date 04/10/2016
		*/
		public function setPrenom($emp_prenom){
			$this->emp_prenom = $emp_prenom;
		}
		
		/**
		*		getprenom - renvoie le prénom de l'employé
		*
		*		@return string le prénom
		*		@date 04/10/2016
		*/
		public function getPrenom(){
			return $this->emp_prenom;
		}
		
		/**
		*		setrue - modifie le numéro de rue et la rue du domicile de l'employé
		*
		*		@param string le nouveau prénom
		*		@date 04/10/2016
		*/
		public function setRue($emp_rue){
			$this->emp_rue = $emp_rue;
		}
		
		/**
		*		getcodepostal - renvoie le numéro de rue et la rue du domicile de l'employé
		*
		*		@return string le nouveau numéro suivi de la nouvelle rue
		*		@date 04/10/2016
		*/
		public function getRue(){
			return $this->emp_rue;
		}
		
		/**
		*		setville - modifie la ville du domicile de l'employé
		*
		*		@param string la nouvelle ville
		*		@date 04/10/2016
		*/
		public function setVille($emp_ville){
			$this->emp_ville = $emp_ville;
		}
		
		/**
		*		getville - renvoie la ville du domicile de l'employé
		*
		*		@return string la ville
		*		@date 04/10/2016
		*/
		public function getVille(){
			return $this->emp_ville;
		}
		
		/**
		*		setcodepostal - modifie le code postal domicile de l'employé
		*
		*		@param string la nouveau code postal
		*		@date 04/10/2016
		*/
		public function setCodePostal($emp_codepostal){
			$this->emp_codepostal = $emp_codepostal;
		}
		
		/**
		*		getcodepostal - renvoie le code postal du domicile de l'employé
		*
		*		@return string le code postal
		*		@date 04/10/2016
		*/
		public function getCodePostal(){
			return $this->emp_codepostal;
		}
		
		/**
		*		settel - modifie le numéro de téléphone principal de l'employé
		*
		*		@param string la nouveau numéro principal
		*		@date 04/10/2016
		*/
		public function setTel ($emp_tel){
			$this->emp_tel = $emp_tel;
		}
		
		/**
		*		gettel - renvoie le numéro de téléphone principal de l'employé
		*
		*		@return string le numéro principal
		*		@date 04/10/2016
		*/
		public function getTel(){
			return $this->emp_tel;
		}
		
		/**
		*		setportable - modifie le numéro de téléphone portable de l'employé
		*
		*		@param string la nouveau numéro de portable
		*		@date 04/10/2016
		*/
		public function setportable($emp_portable){
			$this->emp_portable = $emp_portable;
		}
		
		/**
		*		getportable - renvoie le numéro de téléphone portable de l'employé
		*
		*		@return string le numéro de portable
		*		@date 04/10/2016
		*/
		public function getPortable(){
			return $this->emp_portable;
		}
		
		/**
		*		setemail - modifie l'email de l'employé
		*
		*		@param string le nouvel email
		*		@date 04/10/2016
		*/
		public function setEmail($emp_email){
			$this->emp_email = $emp_email;
		}
		
		/**
		*		getemail - renvoie l'email de l'employé
		*
		*		@return string l'email
		*		@date 04/10/2016
		*/
		public function getEmail(){
			return $this->emp_email;
		}
		
		/**
		*		setdateembauche - modifie la date d'embauche de l'employé
		*
		*		@param date la nouvelle date
		*		@date 04/10/2016
		*/
		public function setDateEmbauche($emp_dateembauche){
			$this->emp_dateembauche = $emp_dateembauche;
		}
		
		/**
		*		getdateembauche - renvoie la date d'embauche de l'employé
		*
		*		@return date la date d'embauche
		*		@date 04/10/2016
		*/
		public function getDateEmbauche(){
			return $this->emp_dateembauche;
		}
		
		/**
		*		setquotite - modifie la quotite de l'employé
		*
		*		@param float la nouvelle quotité
		*		@date 04/10/2016
		*/
		public function setQuotite($emp_quotite){
			$this->emp_quotite = $emp_quotite;
		}
		
		/**
		*		getquotite - renvoie la quotité d'un employé
		*
		*		@return float la quotite (décimal à précision 3,2)
		*		@date 04/10/2016
		*/
		public function getQuotite(){
			return $this->emp_quotite;
		}
	}
?>