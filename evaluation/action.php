<?php
require_once("../securité/db_conn.php");
if (isset($_GET['evaluer'])) {
    $id = $_GET['evaluer'];
    $sql = "SELECT * FROM etudiant  where id_elev = '$id'";
    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $id_elev = $row['id_elev'];
    $nomEtudiant = $row['nom_elev'];
    $prenomEtudiant = $row['prenom_elev'];
    $classeEtudiant = $row['nom_classe'];
}
if (isset($_POST['ajoutnote'])) {
    $matiere = $_POST['matiere'];

    $classe = $_POST['classe'];

    $sql = "SELECT * FROM matiere where classe_mat='$classe' and nom_matiere ='$matiere' ";

    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $coef = $row['coef_matiere'];

    $id = $_POST['idelev'];
    $classe = $_POST['classe'];
    $trimestre = $_POST['trimestre'];
    $nj = $_POST['note_journaliere'];
    $nc = $_POST['nc'];

    $sql1 = "INSERT INTO notes SET id_elev='" . $id . "',nom_classe='" . $classe . "',trimestre='" . $trimestre .
        "',matiere='" . $matiere . "',note_journaliere='" . $nj . "',
            note_composition='" . $nc . "',coeff_matiere='" . $coef . "'";
    $resultat = $connection->query($sql1);
    require("note.php");
}

if (isset($_GET['sup'])) {
    $id = $_GET['sup'];
    $sql = "DELETE FROM notes WHERE id_note='$id'";
    $resultat = $connection->query($sql);

    include('note.php');
}
if (isset($_GET['modifnote'])) {
    $id = $_GET['modifnote'];

    $sql = "SELECT * FROM (trimestre inner join notes on trimestre.nom_trimestre = notes.trimestre)  where id_note = '$id'";

    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $id_elev = $row['id_elev'];
    
    $trimestre = $row['nom_trimestre'];

    $classe = $row['nom_classe'];

    $matiere = $row['matiere'];

    $note_journaliere = $row['note_journaliere'];

    $note_composition = $row['note_composition'];

    $coefmat = $row['coeff_matiere'];

    $modifier = true;

    $sql = "SELECT * FROM etudiant WHERE id_elev='$id_elev'";
    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);
    $nomEtudiant=$row['nom_elev'];
    $prenomEtudiant = $row['prenom_elev'];
    $classeEtudiant = $row['nom_classe'];
}
if (isset($_POST['editenote'])) {
    $matiere = $_POST['matiere'];
$id_note=$_POST['idnote'];
    $classe = $_POST['classe'];

    $sql = "SELECT * FROM matiere where classe_mat='$classe' and nom_matiere ='$matiere' ";

    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $coef = $row['coef_matiere'];

    $classe = $_POST['classe'];
    $trimestre = $_POST['trimestre'];
    $nj = $_POST['note_journaliere'];
    $nc = $_POST['nc'];

    $sql1 = "UPDATE notes SET note_journaliere='$nj',
            note_composition='$nc',coeff_matiere='$coef' WHERE id_note = '$id_note'";
    $resultat = $connection->query($sql1);
    include("note.php");
}
?>