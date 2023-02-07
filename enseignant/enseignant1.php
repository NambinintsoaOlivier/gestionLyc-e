<?php

$search = $_GET['search'];

if ($search != "") {
    include("../securité/db_conn.php");
    $sql = "SELECT * FROM enseignant2";
    $resultat = $connection->query($sql);
    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id_prof'];
        $nom = $row['nom_prof'];
        $prenom = $row['prenom_prof'];
        $sexe = $row['sexe_prof'];
        $mat_ens = $row['matiere_prof'];
        $contact = $row['contact_prof'];
        if (((strtolower($search)) == strtolower(substr($nom, 0, (strlen($search))))) || ((strtolower($search)) == strtolower(substr($prenom, 0, (strlen($search)))))
        ) { ?>
<tr class="liste">
    <td width="20%">
        <a href="infop.php?infop=<?php echo $row['id_prof'] ?>"><?php echo $row['nom_prof']; ?></a>
    </td>
    <td width="20%">
        <?php echo $row['prenom_prof']; ?>
    </td>
    <td width="20%">
        <?php echo $row['sexe_prof']; ?>
    </td>

    <td width="20%">
        <?php echo $row['matiere_prof']; ?>
    </td>
    <td width="20%" class="text-center">
        <a class="btn btn-danger" href="action.php?deletepers=<?php echo $row['id_prof'] ?>">Supprimer</a>
        <a class="btn btn-success" href="nouv_enseignant.php?editeprof=<?php echo $row['id_prof'] ?>">Modifier</a>
    </td>
</tr>
<?php
            }
        }
    } else {
        ?>
<tbody id="search">
    <?php
            include_once('../securité/db_conn.php');
            $sql = "SELECT * FROM enseignant2";
            $resultat = $connection->query($sql);
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr class="liste">
        <td width="20%">
            <a href="infop.php?infop=<?php echo $row['id_prof'] ?>"><?php echo $row['nom_prof']; ?></a>
        </td>
        <td width="20%">
            <?php echo $row['prenom_prof']; ?>
        </td>
        <td width="20%">
            <?php echo $row['sexe_prof']; ?>
        </td>

        <td width="20%">
            <?php echo $row['matiere_prof']; ?>
        </td>
        <td width="20%" class="text-center">
            <a class="btn btn-danger" href="action.php?deletepers=<?php echo $row['id_prof'] ?>">Supprimer</a>
            <a class="btn btn-success" href="nouv_enseignant.php?editeprof=<?php echo $row['id_prof'] ?>">Modifier</a>
        </td>
    </tr>
    <?php
            } ?>
</tbody>
<?php }

?>