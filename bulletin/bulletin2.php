<?php
include('action.php');
require_once('../securité/db_conn.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Bulletin</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel='stylesheet'>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js.js"></script>
    <style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
        font-family: calibri;
        font-weight: normal;
        font-size: 15px;
        color: black;
    }

    th {
        text-align: center;
    }

    table {
        border-style: solid;
        border-width: 0;
        border-style: solid;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: black;
        border-style: solid;
        border-width: 0;
    }

    thead {
        padding: 0.4rem 0.3rem;
        text-align: left;
        background-color: black;
    }

    tbody {
        background-color: #ffffff8c;
        padding: 0.4rem 0.3rem;
        text-align: left;
        border-color: black;


    }

    .btn-outline-primary {
        color: #10375C;
        border-color: #10375C;
    }

    .btn {
        display: initial;
    }

    body {
        font-weight: 2rem;
        background-color: #fff;
    }
    </style>
</head>

<body>
    <br>
    <div class="container-fluid">
        <div class="row">
            <!-- <form class="d-flex"> -->
            <div class=" col-lg-6" id="imprim" style="display:block">
                <a class="btn btn-outline-primary me-5" href="bulletin.php">Return</a>
                <select class=" btn btn-success slt me-2" id="trimestre_bulletin" onchange="bulletin_trimestre();">
                    <option value="1 ere trimestre ">1 er Trimestre</option>
                    <option value="2 eme trimestre">2 eme Trimestre</option>
                    <option value="3 eme trimestre">3 eme Trimestre</option>
                </select>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-warning" id="imprim1" style="display:block"
                    onclick="imprimer();">imprimer</button>
            </div>
            <!-- </form> -->
        </div>
    </div><br>
    <div id="cont">
        <div class="container">
            <div class="row">
                <br><br>
                <table>
                    <tr>
                        <td>LYCEE PRIVE MAHATOMBO <br>
                            TOAMASINA <br>
                            Code : 501 011 063 <br>
                            AO N° 320/2019-MENETP du 13/12/19
                        </td>
                        <td>
                            <?php echo $trimestre; ?>
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
                    <input type="hidden" id="id" value="<?php echo $id; ?>">
                    <?php echo $id; ?>
                </div><br><br><br><br>
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
                                $id = $_GET['bulletin'];
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
                                    $coefficient = $coefficient + $cf; ?>
                                <td class="text-center">
                                    <?php echo $nommat;  ?>
                                </td>
                                <?php
                                        $app = "";
                                        $nj = 0;
                                        $nc = 0;
                                        $mt = 0;
                                        $mtcoef = 0;
                                        $sql = "SELECT * FROM (etudiant INNER JOIN notes ON etudiant.id_elev=notes.id_elev) where etudiant.id_elev='$id' and notes.matiere='$nommat'";
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
                                        } ?>
                                <td class="text-center">
                                    <?php echo $nj; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $nc; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $mt; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $cf; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $mtcoef;    ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $app;   ?>
                                </td>
                                <td></td>
                            </tr>
                            <?php  }  ?>
                            <tr>
                                <td class="text-center">TOTAL</td>
                                <td colspan="3"></td>
                                <td class="text-center">
                                    <?php echo $coefficient;  ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $total; ?>
                                </td>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="5">MOYENNE GENERALE</td>
                                <td class="text-center">
                                    <?php echo $moyennegeneral;  ?>
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
                    </label><br>
                    <?php  }
                    }
                    $totalheure = 0;
                    $totaljour = 0;
                    $id = $_GET['bulletin'];
                    $sql = "SELECT * FROM absence WHERE id_elev='$id'";
                    $resultat = $connection->query($sql);
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                        $totalheure = $totalheure + $row['heure'];
                        $totaljour = $totaljour + $row['date_jour'];
                    } ?>
                    <label for="">Absence : <?php echo $totaljour; ?> jours et <?php echo $totalheure; ?>
                        heures</label>
                </div>

            </div>
        </div>
    </div>
</body>

</html>