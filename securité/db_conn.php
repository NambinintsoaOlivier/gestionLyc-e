<?php
$hote = "localhost";
$usr = "root";
$mdp = "";
$base = "gestion_etudiant_lp_mahatombo";

try {
	$connection = new PDO("mysql:host=$hote;dbname=$base", $usr, $mdp);
} catch (PDOException $e) {
	die("impossible de se connecter à la base de données $base :" . $e->getMessage());
}
$id_prof = "";
$nomProf ="";
$prenomProf="";
$cinProf = "";
$dateProf=""; 
$contactProf ="";
$numAutoProf="";
$sexe = "";
$duplicataProf = "";
$adresseProf = "";
$imProf = "";
$diplomeAcademiqueProf ="";
$diplomePedagogiqueProf ="" ;
$fonctionProf ="" ;
$specialiteProf ="" ;
$matiereProf ="";
$categorieProf = "";
$classeProf = "";
$encienneteProf = "";
$id_elev="";
$nomEtudiant="";
$prenomEtudiant ="" ;
$dateNaissanceEtudiant = "";
$lieuNaissEtudiant = "";
$sexe_elev = "";
$adresseEtudiant ="" ;
$maladieEtudiant = "";
$classeEtudiant ="" ;
$contactParentEtudiant = "";
$nomPereEtudiant = "";
$proffessionPere = "";
$nomMereEtudiant ="";
$proffessionMere = "";
$nomTuteurEtudiant ="";
$proffessionTuteur = "";
$adresseParentEtudiant ="";
$anneeScolaire ="";
$modifier = "0";
$note_journaliere="0";
$note_composition="0";
$contact_parent="";
$message1="";
$message2="";