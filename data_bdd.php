<?php






include_once("libs/maLibUtils.php");
include_once("libs/maLibSQL.pdo.php");
// penser à modifier le fichier config.php
 
if (isset($_GET["debutNom"])) {
	$cherche = $_GET["debutNom"]; 
	//echo "On recherche : " . $cherche; 
	
	// TODO: chercher les étudiants dans une base de données
	$SQL = "SELECT * FROM etudiants WHERE ";

	if ($colonne = valider("colonne")) {
		$SQL .= " $colonne LIKE '$cherche%'";
	} else {
		$SQL .= " prenom LIKE '$cherche%'";
		$SQL .= " OR nom LIKE '$cherche%'";
  	}

	$users = parcoursRs(SQLSelect($SQL)); 
	//tprint($tabResultats);
	foreach($users as $nextStudent) {
		echo "<li>$nextStudent[prenom] $nextStudent[nom] </li>"; 
	}

	die("");
}





?>
