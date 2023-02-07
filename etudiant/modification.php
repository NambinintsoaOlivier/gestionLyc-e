<?php
require_once("../securité/db_conn.php");
if (isset($_GET['ajourEtudiant'])) {
    $id_elev = $_GET['id'];
    $nomEtudiant = $_GET['nomEtudiant'];
    $prenomEtudiant = $_GET['prenomEtudiant'];
    $dateNaissanceEtudiant = $_GET['dateNaissanceEtudiant'];
    $lieuNaissEtudiant = $_GET['lieuNaissEtudiant'];
    $sexeEtudiant = $_GET['optionsRadios3'];
    $adresseEtudiant = $_GET['adresseEtudiant'];
    $maladieEtudiant = $_GET['maladieEtudiant'];
    $nomPereEtudiant = $_GET['nomPereEtudiant'];
    $proffessionPere = $_GET['proffessionPere'];
    $nomMereEtudiant = $_GET['nomMereEtudiant'];
    $proffessionMere = $_GET['proffessionMere'];
    $nomTuteurEtudiant = $_GET['nomTuteurEtudiant'];
    $proffessionTuteur = $_GET['proffessionTuteur'];
    $adresseParentEtudiant = $_GET['adresseParentEtudiant'];
    $contactParentEtudiant = $_GET['contactParentEtudiant'];
    $anneeScolaire = $_GET['anneeScolaire'];
    $classeEtudiant = $_GET['classeEtudiant'];

    
    $sql = "UPDATE `etudiant` SET `nom_elev` = '$nomEtudiant', `prenom_elev` = '$prenomEtudiant', `date_naiss_elev` = '$dateNaissanceEtudiant',
     `lieu_naiss_elev` = '$lieuNaissEtudiant',`sexe_elev` = '$sexeEtudiant',`adresse_elev` = '$adresseEtudiant'
     ,`maladie_elev` = '$maladieEtudiant',`nom_classe` = '$classeEtudiant',`contact_parent` = '$contactParentEtudiant' 
     ,`nomprenom_pere` = '$nomPereEtudiant',`proffession_pere` = '$proffessionPere',`nomprenom_mere` = '$nomMereEtudiant'
     ,`proffession_mere` = '$proffessionMere',`nomprenom_tuteur` = '$nomTuteurEtudiant',`proffession_tuteur` = '$proffessionTuteur'
     ,`adresse_parent` = '$adresseParentEtudiant',`annee` = '$anneeScolaire'
     WHERE `etudiant`.`id_elev` = '$id_elev' ";
    $connection->query($sql);
    require('etudiants.php');
    }
        ?>