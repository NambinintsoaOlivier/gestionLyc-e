<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matiere</title>
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
    <a href="matiere.php">Matiere</a>
    <a href="../securité/logout.php">DECONNECTION</a>
    <h2 class="text-center">LISTES DES MATIERES</h2>
    <button> <a href="nouv_matiere"> Ajouter une matiere +</a></button>
    <select id="classe_matiere" onchange="classeMatiere();">
        <option value="tout">tout</option>
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
    <table>
        <thead>
            <tr>
                <th>Nom matiere</th>
                <th>Coefficiant</th>
                <th>Classe</th>
                <th>Parametre</th>
            </tr>
        </thead>
        <tbody id="matiere">
            <?php
            require('../securité/db_conn.php');
            $sql = "SELECT * FROM matiere";
            $resultat = $connection->query($sql);
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td>
                    <?php echo $row['nom_matiere']; ?>
                </td>
                <td>
                    <?php echo $row['coef_matiere']; ?>
                </td>
                <td>
                    <?php echo $row['classe_mat']; ?>
                </td>
                <td> <a href="action.php?del=<?php echo $row['code_matiere'] ?>">Supprimer</a>
                    <a href="nouv_mat.php?editematiere=<?php echo $row['code_matiere'] ?>">Modifier</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>