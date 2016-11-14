<?php
	echo "
	<!DOCTYPE html>
	<html>
	<meta charset='UTF-8'>";
	
	include ('\kernel\Employe.php');
			
	$unEmploye = new Employe ("","","", "", "", "", "", "", "", "", "");
	print_r ($unEmploye);
	if($unEmploye->read("A02")){
		print_r ($unEmploye);
		echo "<br><br>";
		echo "Votre Matricule : {$unEmploye->getMatricule()}<br/>";
		echo "Votre identité : {$unEmploye->getNom()} {$unEmploye->getPrenom()}<br/>";
		echo "Vous habitez : {$unEmploye->getRue()} {$unEmploye->getVille()} {$unEmploye->getCodePostal()}<br/>";
		echo "Votre email : {$unEmploye->getEmail()}<br/>";
		echo "Vos coordonées telephoniques : Fixe : {$unEmploye->getTel()} Portable : {$unEmploye->getPortable()}<br/>";
		echo "Votre ancienneté : {$unEmploye->getDateEmbauche()}<br/>";
		echo "Votre quotité : {$unEmploye->getQuotite()}<br/>";
		echo "<br>";
	}
	
	echo "<br>Test Find<br>";
	$a = $unEmploye->find("emp_nom = 'Boudeaud'");
	print_r($a);
	echo "<br><br>";
	foreach($a as $value){
		echo "Changement personne<br>";
		foreach($value as $infos){
		echo "{$infos}<br>";
		}
		echo "<br><br>";
	}
	
	echo "<br/><br/>";
	/*if($unEmploye->create()){
		echo "<br>Enregistrement terminé";
	}
	else{
		echo "<br>Erreur pendant l'enregistrement";
	}*/
	
	echo "<br/><br/>";
	//$unEmploye->update();
	
	if($unEmploye->lineExist('A02')){
				echo "Index::Un ou plusieurs résultats";
			}
			else{
				echo "Index::Aucun résultats";
			}
	echo "</html>";
	if($unEmploye->delete("A03")){
				echo "Index::Un ou plusieurs résultats";
			}
			else{
				echo "Index::Aucun résultats";
			}
	//echo ini_get("display_errors");
?>