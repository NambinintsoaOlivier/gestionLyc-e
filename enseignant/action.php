<?php
require_once("../securité/db_conn.php");
if (isset($_GET['ajoutProf'])) {
    if ($_GET['ajoutProf'] === "1") {
            $nomProf = $_GET['nomProf'];
            $prenomProf = $_GET['prenomProf'];
            $cinProf = $_GET['cinProf'];
            $dateProf = $_GET['dateDelivranceProf'];
            $sexe = $_GET['optionsRadiosinline'];
            $duplicataProf = $_GET['duplicataProf'];
            $adresseProf = $_GET['adresseProf'];
            $contactProf = $_GET['contactProf'];
            $numAutoProf = $_GET['numAutoProf'];
            $imProf = $_GET['imProf'];
            $diplomeAcademiqueProf = $_GET['diplomeAcademiqueProf'];
            $diplomePedagogiqueProf = $_GET['diplomePedagogiqueProf'];
            $fonctionProf = $_GET['fonctionProf'];
            $specialiteProf = $_GET['specialiteProf'];
            $categorieProf = $_GET['categorieProf'];
            $matiereProf= $_GET['matiere'];
            $classeProf = $_GET['classe'];
            $encienneteProf = $_GET['encienneteProf'];

            $sql="INSERT INTO `enseignant2` (`id_prof`, `nom_prof`, `prenom_prof`, `sexe_prof`, `cin_prof`,
            `adresse`, `contact_prof`, `matiere_prof`, `duplicata`, `num_auto_enseign`, `im`, `fonction`,
            `date_delivrance`, `diplome_academique`, `categorie_proffessionnel`, `diplome_pedagogique`,
            `specialite`, `enciennete`, `classe_tenue`) VALUES (NULL, '$nomProf', '$prenomProf', '$sexe', '$cinProf',
            '$adresseProf', '$contactProf', '$matiereProf', '$duplicataProf', '$numAutoProf', '$imProf', '$fonctionProf',
            '$dateProf','$diplomeAcademiqueProf', '$categorieProf','$diplomePedagogiqueProf', '$specialiteProf',
            '$encienneteProf', '$classeProf')";
            $connection->query($sql);
            // echo $sql;
            require('enseignant.php');
}
}
if (isset($_GET['deletepers'])) {
    $id = $_GET['deletepers'];
    $sql = "DELETE FROM enseignant2 WHERE id_prof='$id'";
    $connection->query($sql);
    // echo $sql;
    include('enseignant.php');
}

if (isset($_GET['ajourProf'])) {
    if ($_GET['ajourProf'] === "1") {
    $id_prof = $_GET['id'];
    $nomProf = $_GET['nomProf'];
    $prenomProf = $_GET['prenomProf'];
    $cinProf = $_GET['cinProf'];
    $dateProf = $_GET['dateDelivranceProf'];
    $sexe = $_GET['optionsRadiosinline'];
    $duplicataProf = $_GET['duplicataProf'];
    $adresseProf = $_GET['adresseProf'];
    $contactProf = $_GET['contactProf'];
    $numAutoProf = $_GET['numAutoProf'];
    $imProf = $_GET['imProf'];
    $diplomeAcademiqueProf = $_GET['diplomeAcademiqueProf'];
    $diplomePedagogiqueProf = $_GET['diplomePedagogiqueProf'];
    $fonctionProf = $_GET['fonctionProf'];
    $specialiteProf = $_GET['specialiteProf'];
    $matiereProf = $_GET['matiere'];
    $categorieProf = $_GET['categorieProf'];
    $classeProf = $_GET['classe'];
    $encienneteProf = $_GET['encienneteProf'];
    $sql = "UPDATE `enseignant2` SET `nom_prof` = '$nomProf', `prenom_prof` = '$prenomProf', `sexe_prof` = '$sexe',
     `cin_prof` = '$cinProf',`adresse` = '$adresseProf',`contact_prof` = '$contactProf',`matiere_prof` = '$matiereProf',
     `duplicata` = '$duplicataProf',`num_auto_enseign` = '$numAutoProf',`im` = '$imProf',`fonction` = '$fonctionProf',
     `date_delivrance` = '$dateProf',`diplome_academique` = '$diplomeAcademiqueProf',`categorie_proffessionnel` = '$categorieProf'
     ,`diplome_pedagogique` = '$diplomePedagogiqueProf',`specialite` = '$specialiteProf',`enciennete` = '$encienneteProf',
     `classe_tenue` = '$classeProf'
     WHERE `enseignant2`.`id_prof` = '$id_prof' ";
    $connection->query($sql);
    require("enseignant.php");
    echo $sql;
}
}
        ?>