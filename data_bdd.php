<?php

include_once("libs/maLibUtils.php");
include_once("libs/maLibSQL.pdo.php");
// penser à modifier le fichier config.php

$data = array("promo"=>2019, "students"=>array(), "target"=>"");
 
if ($cherche = valider("debutNom")) {
	//echo "On recherche : " . $cherche; 

	$data["target"] = $cherche;
	
	// TODO: chercher les étudiants dans une base de données
	$SQL = "SELECT * FROM etudiants WHERE ";

	if ($colonne = valider("colonne")) {
		$SQL .= " $colonne LIKE '$cherche%'";
	} else {
		$SQL .= " prenom LIKE '$cherche%'";
		$SQL .= " OR nom LIKE '$cherche%'";
  	}

	$users = parcoursRs(SQLSelect($SQL));
	$data["students"] = $users; 

/*
	foreach($users as $nextStudent) {
		echo "<li>$nextStudent[prenom] $nextStudent[nom] </li>"; 
		// V1 : envoi d'une structure XHTML : merdique 
		// * structure des données peu pratique à manipuler : difficile de distinguer nom et prénom 	
		// * Contrainte sur le client qui DOIT etre un navigateur 
		// => ON préfère un format de données STRUCTURE : 
		// => CSV, XML, JSON 
	}
*/

}

echo json_encode($data);

?>
