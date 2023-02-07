<?php
include_once("../securité/db_conn.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
    <script src="../js.js"></script>
</head>

<body>
    <h3>GESTION DES BULLETINS</h3>
    <a href="../Acceuil.php">Accueil</a>
    <a href="../enseignant/enseignant.php">Enseignant</a>
    <a href="../etudiant/etudiants.php">Eleve</a>
    <a href="../absence/absence.php">Absences et Retards</a>
    <a href="../bulletin/bulletin.php">Bulletins</a>
    <a href="../parent/parents.php">Parents</a>
    <a href="../classe/classes.php">Classes</a>
    <a href="../matiere/matiere.php">Matiere</a>
    <a href="../securité/logout.php">DECONNECTION</a>
    <h2> LISTE DES NOTES</h2>
    <select id="trimestre" onchange="trimestre();">
        <option value="tout trimestre">toutes trimestre*</option>
        <option value="1er trimestre">1er trimestre</option>
        <option value="2eme trimestre">2em trimestre</option>
        <option value="3eme trimestre">3em trimestre</option>
    </select>
    <select name="nom" id="nom">
        <option value="tout">toutes classes*</option>
        <option value="6 eme">6 eme</option>
        <option value="5 eme">5 eme</option>
        <option value="4 eme">4 eme</option>
        <option value="3 eme">3 eme</option>
        <option value="Second">Second</option>
        <option value="Premiere L">Premiere L</option>
        <option value="Premiere S">Premiere S</option>
        <option value="Terminal L">Terminal L</option>
        <option value="Terminal S">Terminal S</option>
    </select>
    <input onkeyup="rechercheNote();" name=" nom" id="note" type="text" placeholder="rechercher">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>classe</th>
                <th>Trimestre</th>
                <th>Matiere</th>
                <th>NJ</th>
                <th>C</th>
                <th>MT</th>
                <th>coef</th>
                <th>parametre</th>
            </tr>
        </thead>
        <tbody id="search_note">
            <?php
            $sql = "SELECT * FROM (etudiant INNER JOIN  notes  ON etudiant.id_elev=notes.id_elev) ";
            $resultat = $connection->query($sql);
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id_elev'];
                $nom = $row['nom_elev'];
                $prenom = $row['prenom_elev'];
                $classe = $row['nom_classe'];
                $trimestre = $row['trimestre'];
                $nj = $row['note_journaliere'];
                $nc = $row['note_composition'];
                $coef = $row['coeff_matiere'];
                $mta = ($nj + $nc * $coef) / (1 + $coef);
                $mt = round($mta, 2);
                $mtcoef = $mt * $coef; ?>
            <tr>
                <td>
                    <?php echo $id; ?>
                </td>
                <td>
                    <?php echo $nom; ?>
                </td>
                <td>
                    <?php echo $prenom;  ?>
                </td>
                <td>
                    <?php echo $classe;   ?>
                </td>
                <td>
                    <?php echo $trimestre;  ?>
                </td>
                <td>
                    <?php echo $row['matiere'];  ?>
                </td>
                <td>
                    <?php echo $nj;    ?>
                </td>
                <td>
                    <?php echo $nc;   ?>
                </td>
                <td>
                    <?php echo $mt;    ?>
                </td>
                <td>
                    <?php echo $row['coeff_matiere'];   ?>
                </td>
                <td> <a href="action.php?sup=<?php echo $row['id_note'] ?>">supprimer</a>
                    <a href="evaluation.php?modifnote=<?php echo $row['id_note'] ?>">Modifier</a></td>
            </tr>
            <?php  } ?>
        </tbody>
    </table>
</body>