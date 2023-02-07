<?php
include_once("../securité/db_conn.php");
if (isset($_GET['note'])){
    $note = $_GET['note'];
    if($note!=""){
    
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
        $mtcoef = $mt * $coef; 
        if (((strtolower($note)) == strtolower(substr($nom, 0, (strlen($note))))) ||
         ((strtolower($note)) == strtolower(substr($prenom, 0, (strlen($note)))))
        ) { ?>
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
<?php  }
    }
} else { ?>
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
<?php  }
}
if (isset($_GET['trim'])){
    $trim= $_GET['trim'];
    $sql = "SELECT * FROM (etudiant INNER JOIN  notes  ON etudiant.id_elev=notes.id_elev) WHERE trimestre='$trim'";
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
<?php  } 
}
if ($trim=== "tout trimestre"){
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
<?php  }
}?>