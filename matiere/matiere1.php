<?php
require('../securité/db_conn.php');
$classe_matiere = $_GET['classe_matiere'];
$sql = "SELECT * FROM matiere WHERE classe_mat='$classe_matiere'";
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
    if ($classe_matiere === "tout") {
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
}
?>