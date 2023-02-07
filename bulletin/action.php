<?php 
include_once('../securité/db_conn.php');
    if (isset($_GET['bulletin'])) {
        $id = $_GET['bulletin'];

        $sql = "SELECT * FROM (etudiant inner join notes on etudiant.id_elev=notes.id_elev) WHERE etudiant.id_elev =
    '$id'";


    $resultat =$connection->query($sql);

    $row =$resultat->fetch(PDO::FETCH_ASSOC);

    $id = $row['id_elev'];
    $nom = $row['nom_elev'];
    $prenom = $row['prenom_elev'];
    $annee = $row['annee'];
    $classe = $row['nom_classe'];
    $trimestre = $row['trimestre'];
    }
    if (isset($_GET['six2'])) {
    $id = $_GET['six2'];

    $sql = "SELECT * FROM etudiant where id_elev = '$id'";

    $resultat = $connection->query($sql);

    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $id = $row['id_elev'];
    }