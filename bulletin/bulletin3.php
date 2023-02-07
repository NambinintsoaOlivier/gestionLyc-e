<?php
include_once('../securité/db_conn.php');
$id = $_GET['id'];
$sql = "SELECT * FROM (etudiant inner join notes on etudiant.id_elev=notes.id_elev) WHERE etudiant.id_elev =
    '$id'";
$resultat = $connection->query($sql);
$row = $resultat->fetch(PDO::FETCH_ASSOC);
$id = $row['id_elev'];
$nom = $row['nom_elev'];
$prenom = $row['prenom_elev'];
$annee = $row['annee'];
$classe = $row['nom_classe'];
$trimestre = $row['trimestre'];
if (isset($_GET['six2'])) {
    $id = $_GET['six2'];
    $sql = "SELECT * FROM etudiant where id_elev = '$id'";
    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);
    $id = $row['id_elev'];
}
$trimestre = $_GET['trim'];


if ($trimestre === "2 eme trimestre") { ?>
<div class="container">
    <div class="row">
        <table>
            <tr>
                <td>LYCEE PRIVE MAHATOMBO <br> TOAMASINA <br>Code : 501 011 063 <br>AO N° 320/2019-MENETP du 13/12/19
                </td>
                <td>
                    <?php echo '2eme trimestre';   ?>
                </td>
                <td class="text-center">Année scolaire : <?php echo $annee; ?> <br>
                    Classe : <?php echo $classe; ?>
                </td>
            </tr>
        </table>
    </div>
</div><br>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <label for="">NOM :</label>
            <?php echo $nom; ?>
            <br>
            <label for="">Prénoms :</label>
            <?php echo $prenom; ?>
            <br>
            <label for="">N° : </label>
            <?php echo $id; ?>
        </div>
        <br><br><br><br>
        <?php  ?>
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <table class="table table-bordered table-secondary">
                <thead>
                    <tr class="tr">
                        <th>Matiere</th>
                        <th>NJ</th>
                        <th>C</th>
                        <th>MT</th>
                        <th>coeff</th>
                        <th>MT*coeff</th>
                        <th>Appréciation</th>
                        <th>Emargement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                                // $id = $_GET['id'];
                                $coefficient = 0;
                                $moyennegeneral = 0;
                                $total = 0;
                                $sql = "SELECT * FROM etudiant where id_elev='$id'";
                                $resultat = $connection->query($sql);
                                $row = $resultat->fetch(PDO::FETCH_ASSOC);
                                $clas = $row['nom_classe'];
                                $sql = "SELECT * FROM matiere WHERE classe_mat = '$clas'";
                                $resultat = $connection->query($sql);
                                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                    $nommat = $row['nom_matiere'];
                                    $cf = $row['coef_matiere'];
                                    $coefficient = $coefficient + $cf;  ?>
                        <td class="text-center">
                            <?php     echo $nommat;     ?>
                        </td>
                        <?php
                                        $app = "";
                                        $nj = 0;
                                        $nc = 0;
                                        $mt = 0;
                                        $mtcoef = 0;
                                        $sql = "SELECT * FROM (etudiant INNER JOIN notes ON etudiant.id_elev=notes.id_elev) where etudiant.id_elev='$id' and notes.matiere='$nommat' and notes.trimestre='2eme trimestre'";
                                        $resultat1 = $connection->query($sql);
                                        while ($row = $resultat1->fetch(PDO::FETCH_ASSOC)) {
                                            $nj = $row['note_journaliere'];
                                            $nc = $row['note_composition'];
                                            $coef = $row['coeff_matiere'];
                                            $mta = ($nj + $nc * $coef) / (1 + $coef);
                                            $mt = round($mta, 2);
                                            $mtcoef = $mt * $coef;
                                            $total = $total + $mtcoef;
                                            $moyenne = $total / $coefficient;
                                            $moyennegeneral = round($moyenne, 2);
                                            if ($mt >= '16') {  $app = "T.Bien";
                                            } elseif (($mt < '16') && ($mt >= '14')) { $app = "Bien";
                                            } elseif (($mt < '14') && ($mt >= '12')) { $app = "A.Bien";
                                            } elseif (($mt < '12') && ($mt >= '10')) { $app = "Passable";
                                            } elseif (($mt < '10') && ($mt >= '8')) {  $app = "inssuffisant";
                                            } else { $app = "Blâme";
                                            }
                                        }   ?>
                        <td class="text-center">
                            <?php  echo $nj;  ?>
                        </td>
                        <td class="text-center">
                            <?php echo $nc;  ?>
                        </td>
                        <td class="text-center">
                            <?php  echo $mt;  ?>
                        </td>
                        <td class="text-center">
                            <?php echo $cf;    ?>
                        </td>
                        <td class="text-center">
                            <?php echo $mtcoef; ?>
                        </td>
                        <td class="text-center">
                            <?php  echo $app; ?>
                        </td>
                        <td></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td class="text-center">TOTAL</td>
                        <td colspan="3"></td>
                        <td class="text-center">
                            <?php  echo $coefficient; ?>
                        </td>
                        <td class="text-center">
                            <?php  echo $total; ?>
                        </td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="5">MOYENNE GENERALE</td>
                        <td class="text-center">
                            <?php  echo $moyennegeneral; ?>
                        </td>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <?php
                $sql2 = "SELECT id_elev, trimestre, SUM( note_journaliere+note_composition*coeff_matiere)/(1+coeff_matiere )
                FROM `notes`
                where nom_classe='$classe'
                GROUP BY id_elev
                ORDER BY SUM( note_journaliere+note_composition*coeff_matiere)/(1+coeff_matiere ) desc";
                    $resultat2 = $connection->query($sql2);
                    $i = 0;
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        $i = $i + 1;
                        $d = $row['id_elev'];
                        $r = $i;
                        if ($d == $id) { ?>
            <label for=""> Rang: <?php
                                                            echo $r;
                                                            if ($r == 1) {
                                                                echo ' ere';
                                                            } else echo ' em'; ?>
                / <?php $sql = "SELECT count(id_elev) AS quatre FROM etudiant WHERE nom_classe='$classe'";
                                            $resultat = $connection->query($sql);
                                            while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
                                                $quatre = $liste->quatre;
                                                echo $quatre;
                                            } ?> élèves
            </label>
            <br>
            <?php
                        }
                    }
                    $totalheure = 0;
                    $totaljour = 0;
                    // $id = $_GET['id'];
                    $sql = "SELECT * FROM absence WHERE id_elev='$id'";
                    $resultat = $connection->query($sql);
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        $totalheure = $totalheure + $row['heure'];
                        $totaljour = $totaljour + $row['date_jour'];
                    }
                    ?>
            <label for="">Absence : <?php echo $totaljour; ?> jours et <?php echo $totalheure; ?> heures</label>
        </div>
        <div class="col-2">
            <button id="imprim1" style="display:block" onclick="imprimer();">imprimer</button>
        </div>
    </div>
</div>
<?php }
if ($trimestre === "3 eme trimestre") { ?>
<div class="container">
    <div class="row">
        <table>
            <tr>
                <td>LYCEE PRIVE MAHATOMBO <br>TOAMASINA <br>Code : 501 011 063 <br>AO N° 320/2019-MENETP du 13/12/19
                </td>
                <td>
                    <?php echo '3eme trimestre';   ?>
                </td>
                <td class="text-center">Année scolaire : <?php echo $annee; ?> <br>
                    Classe : <?php echo $classe; ?>
                </td>
            </tr>
        </table>
    </div>
</div><br>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <label for="">NOM :</label>
            <?php echo $nom; ?>
            <br>
            <label for="">Prénoms :</label>
            <?php echo $prenom; ?>
            <br>
            <label for="">N° : </label>
            <?php echo $id; ?>
        </div>
        <br><br><br><br>
        <?php  ?>
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <table class="table table-bordered table-secondary">
                <thead>
                    <tr class="tr">
                        <th class="text-center">Matiere</th>
                        <th class="text-center">NJ</th>
                        <th class="text-center">C</th>
                        <th class="text-center">MT</th>
                        <th class="text-center">coeff</th>
                        <th class="text-center">MT*coeff</th>
                        <th class="text-center">Appréciation</th>
                        <th class="text-center">Emargement</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                                // $id = $_GET['id'];

                                $coefficient = 0;
                                $moyennegeneral = 0;
                                $total = 0;

                                $sql = "SELECT * FROM etudiant where id_elev='$id'";
                                $resultat = $connection->query($sql);

                                $row = $resultat->fetch(PDO::FETCH_ASSOC);

                                $clas = $row['nom_classe'];

                                $sql = "SELECT * FROM matiere WHERE classe_mat = '$clas'";
                                $resultat = $connection->query($sql);
                                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                    $nommat = $row['nom_matiere'];
                                    $cf = $row['coef_matiere'];
                                    $coefficient = $coefficient + $cf;
                                    ?>
                        <td class="text-center">
                            <?php
                                            echo $nommat;
                                            ?>
                        </td>
                        <?php
                                        $app = "";
                                        $nj = 0;
                                        $nc = 0;
                                        $mt = 0;
                                        $mtcoef = 0;
                                        $sql = "SELECT * FROM (etudiant INNER JOIN notes ON etudiant.id_elev=notes.id_elev) where etudiant.id_elev='$id' and notes.matiere='$nommat' and notes.trimestre='3eme trimestre'";
                                        $resultat1 = $connection->query($sql);
                                        while ($row = $resultat1->fetch(PDO::FETCH_ASSOC)) {
                                            $nj = $row['note_journaliere'];
                                            $nc = $row['note_composition'];

                                            $coef = $row['coeff_matiere'];

                                            $mta = ($nj + $nc * $coef) / (1 + $coef);
                                            $mt = round($mta, 2);
                                            $mtcoef = $mt * $coef;

                                            $total = $total + $mtcoef;
                                            $moyenne = $total / $coefficient;
                                            $moyennegeneral = round($moyenne, 2);

                                            if ($mt >= '16') {
                                                $app = "T.Bien";
                                            } elseif (($mt < '16') && ($mt >= '14')) {
                                                $app = "Bien";
                                            } elseif (($mt < '14') && ($mt >= '12')) {
                                                $app = "A.Bien";
                                            } elseif (($mt < '12') && ($mt >= '10')) {
                                                $app = "Passable";
                                            } elseif (($mt < '10') && ($mt >= '8')) {
                                                $app = "inssuffisant";
                                            } else {
                                                $app = "Blâme";
                                            }
                                        }
                                        ?>
                        <td class="text-center">
                            <?php
                                            echo $nj;
                                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                                            echo $nc;
                                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                                            echo $mt;
                                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                                            echo $cf;
                                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                                            echo $mtcoef;
                                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                                            echo $app;
                                            ?>
                        </td>
                        <td></td>
                    </tr>
                    <?php
                        }
                        ?>
                    <tr>
                        <td class="text-center">TOTAL</td>
                        <td colspan="3"></td>
                        <td class="text-center">
                            <?php
                                echo $coefficient;
                                ?>
                        </td>
                        <td class="text-center">
                            <?php
                                echo $total;
                                ?>
                        </td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="5">MOYENNE GENERALE</td>
                        <td class="text-center">
                            <?php
                                echo $moyennegeneral;
                                ?>
                        </td>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <?php
                    $sql2 = "SELECT id_elev, trimestre, SUM( note_journaliere+note_composition*coeff_matiere)/(1+coeff_matiere )
            FROM `notes`
            where nom_classe='$classe'
            GROUP BY id_elev
            ORDER BY SUM( note_journaliere+note_composition*coeff_matiere)/(1+coeff_matiere ) desc";
                    $resultat2 = $connection->query($sql2);
                    $i = 0;
                    while ($row = $resultat2->fetch(PDO::FETCH_ASSOC)) {
                        $i = $i + 1;
                        $d = $row['id_elev'];
                        $r = $i;

                        if ($d == $id) { ?>
            <label for=""> Rang: <?php
                                                            echo $r;
                                                            if ($r == 1) {
                                                                echo ' ere';
                                                            } else echo ' em'; ?>
                / <?php $sql = "SELECT count(id_elev) AS quatre FROM etudiant WHERE nom_classe='$classe'";
                                            $resultat = $connection->query($sql);
                                            while ($liste = $resultat->fetch(PDO::FETCH_OBJ)) {
                                                $quatre = $liste->quatre;
                                                echo $quatre;
                                            } ?> élèves
            </label>
            <br>
            <?php
                        }
                    }
                    ?>

            <?php
                    $totalheure = 0;
                    $totaljour = 0;
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM absence WHERE id_elev='$id'";
                    $resultat = $connection->query($sql);
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        $totalheure = $totalheure + $row['heure'];
                        $totaljour = $totaljour + $row['date_jour'];
                    }
                    ?>
            <label for="">Absence : <?php echo $totaljour; ?> jours et <?php echo $totalheure; ?> heures</label>
        </div>
        <div class="col-2">
            <button id="imprim1" style="display:block" onclick="imprimer();">imprimer</button>
        </div>
    </div>
</div>
<?php } ?>