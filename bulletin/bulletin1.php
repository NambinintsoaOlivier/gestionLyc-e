<?php
require('../securité/db_conn.php');

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    if ($search != "") {
        $sql = "SELECT * FROM etudiant";
        $resultat = $connection->query($sql);
        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $nom = $row['nom_elev'];
            $prenom = $row['prenom_elev'];
            if (((strtolower($search)) == strtolower(substr($nom, 0, (strlen($search))))) || ((strtolower($search)) == strtolower(substr($prenom, 0, (strlen($search)))))
            ) { ?>
<tr class="liste">
    <td width="25%">
        <a href="info.php?inform=<?php echo $row['id_elev'] ?>"> <?php echo $row['nom_elev']; ?> </a>
    </td>
    <td width="25%">
        <?php echo $row['prenom_elev'];  ?>
    </td>
    <td width="25%">
        <?php echo $row['nom_classe']; ?>
    </td>
    <td width="25%">
        <a href="bulletin2.php?bulletin=<?php echo $row['id_elev'] ?>">Consulter</a>
    </td>
</tr>
<?php }
                }
            } else { ?>
<tbody id="search_bulletin">
    <?php
                    $sql = "SELECT * FROM etudiant  ";
                    $resultat = $connection->query($sql);
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        ?>
    <tr class="liste">
        <td width="25%">
            <a href="info.php?inform=<?php echo $row['id_elev'] ?>"> <?php echo $row['nom_elev']; ?> </a>
        </td>
        <td width="25%">
            <?php echo $row['prenom_elev'];  ?>
        </td>
        <td width="25%">
            <?php echo $row['nom_classe']; ?>
        </td>
        <td width="25%">
            <a href="bulletin2.php?bulletin=<?php echo $row['id_elev'] ?>">Consulter</a>
        </td>
    </tr>
    <?php }  ?>
</tbody>
<?php
        }
    }
    if (isset($_GET['bulletin'])) {
        $bulletin = $_GET['bulletin'];

        $sql = "SELECT * FROM etudiant  WHERE etudiant.nom_classe='$bulletin'";
        $resultat = $connection->query($sql);
        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
            ?>
<tr class="liste">
    <td width="25%">
        <a href="info.php?inform=<?php echo $row['id_elev'] ?>"> <?php echo $row['nom_elev']; ?> </a>
    </td>
    <td width="25%">
        <?php echo $row['prenom_elev'];  ?>
    </td>
    <td width="25%">
        <?php echo $row['nom_classe']; ?>
    </td>
    <td width="25%">
        <a href="bulletin2.php?bulletin=<?php echo $row['id_elev'] ?>">Consulter</a>
    </td>
</tr>
<?php }
            if ($bulletin === "tout") {
                $sql = "SELECT * FROM etudiant";
                $resultat = $connection->query($sql);
                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                    ?>
<tr class="liste">
    <td width="25%">
        <a href="info.php?inform=<?php echo $row['id_elev'] ?>"> <?php echo $row['nom_elev']; ?> </a>
    </td>
    <td width="25%">
        <?php echo $row['prenom_elev'];  ?>
    </td>
    <td width="25%">
        <?php echo $row['nom_classe']; ?>
    </td>
    <td width="25%">
        <a href="bulletin2.php?bulletin=<?php echo $row['id_elev'] ?>">Consulter</a>
    </td>
</tr>
<?php }
    }
} ?>

</tbody>