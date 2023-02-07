<?php
require('../php.php');
?>
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
    <br><br>
    <form>
        Nom Matiere :
        <input type="text" /><br>
        coefficiant :
        <input type="text" /><br>

        <?php
        require('../securité/db_conn.php');
        $sql = "SELECT * from classe";
        $resultat = $connection->query($sql);
        ?>
        classe :
        <select>
            <?php
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $row['nom_classe']; ?>">
                <?php echo $row['nom_classe']; ?></option>
            <?php
            }
            ?>
        </select><br><br>
        <input type="submit" value="Enregistrer la matiere" />
    </form>
</body>

</html>