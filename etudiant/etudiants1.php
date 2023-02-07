<?php
require("../securité/db_conn.php");
if (isset($_GET['search'])) {
    if ($_GET['search'] != "") {
        $search = $_GET['search'];
        $sql = "SELECT * FROM etudiant";
        $resultat = $connection->query($sql);
        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $nom = $row['nom_elev'];
            $prenom = $row['prenom_elev'];
            if (((strtolower($search)) == strtolower(substr($nom, 0, (strlen($search))))) || ((strtolower($search)) == strtolower(substr($prenom, 0, (strlen($search)))))
            ) { ?>
<tr class="liste">
    <td width="13%">
        <a href="info.php?inform=<?php echo $row['id_elev'] ?>"> <?php echo $row['nom_elev'];  ?></a>
    </td>
    <td width="15%">
        <?php echo $row['prenom_elev']; ?>
    </td>
    <td width="10%">
        <?php echo $row['adresse_elev']; ?>
    </td>
    <td width="10%">
        <?php echo $row['sexe_elev'];  ?>
    </td>
    <td width="10%">
        <?php echo $row['nom_classe'];  ?>
    </td>
    <td width="20%" class="text-center">
        <a class="btn btn-danger" href="action.php?delete=<?php echo $row['id_elev'] ?>">Supprimer</a>
        <a class="btn btn-success" href="nouv_etudiant.php?editeEtudiant=<?php echo $row['id_elev'] ?>">Modifier</a>
        <a class="btn btn-dark" href="../evaluation/evaluation.php?evaluer=<?php echo $row['id_elev'] ?>">Evaluer</a>
    </td>
</tr>
<?php
                    }
                }
            } else { ?>
<tbody id="search_elev">
    <?php
                    $sql = "SELECT * FROM etudiant";
                    $resultat = $connection->query($sql);
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr class="liste">
        <td width="13%">
            <a href="info.php?inform=<?php echo $row['id_elev'] ?>"> <?php echo $row['nom_elev'];  ?></a>
        </td>
        <td width="15%">
            <?php echo $row['prenom_elev']; ?>
        </td>
        <td width="10%">
            <?php echo $row['adresse_elev']; ?>
        </td>
        <td width="10%">
            <?php echo $row['sexe_elev'];  ?>
        </td>
        <td width="10%">
            <?php echo $row['nom_classe'];  ?>
        </td>
        <td width="20%" class="text-center">
            <a class="btn btn-danger" href="action.php?delete=<?php echo $row['id_elev'] ?>">Supprimer</a>
            <a class="btn btn-success" href="nouv_etudiant.php?editeEtudiant=<?php echo $row['id_elev'] ?>">Modifier</a>
            <a class="btn btn-dark"
                href="../evaluation/evaluation.php?evaluer=<?php echo $row['id_elev'] ?>">Evaluer</a>
        </td>
    </tr>
    <?php } ?>
</tbody>
<?php
            }
        }
        if (isset($_GET['classe'])) {
            $classe = $_GET['classe'];
            if ($classe != "") {
                $sql = "SELECT * FROM etudiant WHERE etudiant.nom_classe='$classe'";
                $resultat = $connection->query($sql);
                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
<tr class="liste">
    <td width="13%">
        <a href="info.php?inform=<?php echo $row['id_elev'] ?>"> <?php echo $row['nom_elev'];  ?></a>
    </td>
    <td width="15%">
        <?php echo $row['prenom_elev']; ?>
    </td>
    <td width="10%">
        <?php echo $row['adresse_elev']; ?>
    </td>
    <td width="10%">
        <?php echo $row['sexe_elev'];  ?>
    </td>
    <td width="10%">
        <?php echo $row['nom_classe'];  ?>
    </td>
    <td width="20%" class="text-center">
        <a class="btn btn-danger" href="action.php?delete=<?php echo $row['id_elev'] ?>">Supprimer</a>
        <a class="btn btn-success" href="nouv_etudiant.php?editeEtudiant=<?php echo $row['id_elev'] ?>">Modifier</a>
        <a class="btn btn-dark" href="../evaluation/evaluation.php?evaluer=<?php echo $row['id_elev'] ?>">Evaluer</a>
    </td>
</tr>
<?php
                }
            }
            if ($classe === "tout") {
                $sql = "SELECT * FROM etudiant";
                $resultat = $connection->query($sql);
                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
<tr class="liste">
    <td width="13%">
        <a href="info.php?inform=<?php echo $row['id_elev'] ?>"> <?php echo $row['nom_elev'];  ?></a>
    </td>
    <td width="15%">
        <?php echo $row['prenom_elev']; ?>
    </td>
    <td width="10%">
        <?php echo $row['adresse_elev']; ?>
    </td>
    <td width="10%">
        <?php echo $row['sexe_elev'];  ?>
    </td>
    <td width="10%">
        <?php echo $row['nom_classe'];  ?>
    </td>
    <td width="20%" class="text-center">
        <a class="btn btn-danger" href="action.php?delete=<?php echo $row['id_elev'] ?>">Supprimer</a>
        <a class="btn btn-success" href="nouv_etudiant.php?editeEtudiant=<?php echo $row['id_elev'] ?>">Modifier</a>
        <a class="btn btn-dark" href="../evaluation/evaluation.php?evaluer=<?php echo $row['id_elev'] ?>">Evaluer</a>
    </td>
</tr>
<?php
        }
    }
}
?>
</tbody>