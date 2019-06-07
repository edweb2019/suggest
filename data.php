<?php
if (isset($_GET["debutNom"])) 
{
	$cherche = $_GET["debutNom"]; 
	
	// On va ouvrir un fichier et afficher les lignes 
	// où le prénom ou le nom contient ce texte

	$tabLignes = file("tw2.txt");
	foreach ($tabLignes as $ligne)
	{
		// EXO1 : effectuer une recherche sur nom ou prénom 
		if (preg_match("/^(.*):(" . $cherche . ".*)$/i",$ligne,$tabResultats))
		{

// Si l'utilisateur saisit debutNom=Th
// L'expression régulière vaut : 
//		/^.*:(Th.*)$/i
// On cherche toutes les lignes dont la deuxième partie commence par Th, peu importe la casse

// On renvoie en respectant le format attendu

			// EXO2 afficher nom ET prénom 
			echo "<li> $tabResultats[1] $tabResultats[2] </li>"; 
		}
	}

	die("");
}

?>
