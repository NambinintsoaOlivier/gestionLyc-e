<?php
require_once("../securité/db_conn.php");
if (isset($_GET['editeEtudiant'])) {
    $id = $_GET['editeEtudiant'];
    $sql = "SELECT * FROM etudiant WHERE id_elev = '$id'";

    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $id_elev = $row['id_elev'];
    $nomEtudiant = $row['nom_elev'];
    $prenomEtudiant = $row['prenom_elev'];
    $dateNaissanceEtudiant = $row['date_naiss_elev'];
    $lieuNaissEtudiant = $row['lieu_naiss_elev'];
    $sexe_elev = $row['sexe_elev'];
    $adresseEtudiant = $row['adresse_elev'];
    $maladieEtudiant = $row['maladie_elev'];
    $classeEtudiant = $row['nom_classe'];
    $contact_parent = $row['contact_parent'];
    $nomPereEtudiant = $row['nomprenom_pere'];
    $proffessionPere = $row['proffession_pere'];
    $nomMereEtudiant = $row['nomprenom_mere'];
    $proffessionMere = $row['proffession_mere'];
    $nomTuteurEtudiant = $row['nomprenom_tuteur'];
    $proffessionTuteur = $row['proffession_tuteur'];
    $adresseParentEtudiant = $row['adresse_parent'];
    $anneeScolaire = $row['annee'];
    $modifier = "1";
}
?>

<!doctype html>
<html lang="fr" id="confirmer">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js.js"></script>
    <title>Etudiants</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    body {
        background-color: #000123;
        min-height: 75rem;
        padding-top: 4.5rem;
        color: #fff;
        font-weight: normal;
        position: relative;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .navbar-expand-md {
        background-color: #000000eb;
    }

    h3 {
        color: #ffc107;
    }

    h2 {
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 2.9rem;
        color: #fff;
        text-shadow: 4px 6px 10px #10375C;
        text-align: center;
        margin-left: 4rem;
    }

    .form-check-input:checked {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    h4 {
        /* margin-top: 2rem; */
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 2rem;
        color: #10375C;
        /* text-shadow: 4px 6px 10px #10375C; */
        text-align: left;
        margin-left: 14rem;
    }

    input.form-control {
        color: #e0a906;
        width: 100%;
        background-color: transparent;
    }

    select.form-select {
        color: #e0a906;
        width: 100%;
        background-color: #000123;
    }

    h1 {
        color: #00cf40d6;
    }

    table {
        /* border-style: groove; */
        /* border-color: inherit; */
        border-style: solid;
        border-width: 0;
        border-style: solid;
    }

    thead {
        padding: 0.4rem 0.3rem;
        text-align: left;
        color: #10375c;
        background-color: #ffc107cc;
    }

    tbody {
        background-color: #cdcdcd;
        padding: 0.4rem 0.3rem;
        text-align: left;
        color: #121214;
        border-color: #121214;
    }

    .liste:hover {
        background-color: #ffc1078a;
        font-weight: bold;
    }

    .navbar-dark .navbar-nav .nav-link.active,
    .navbar-dark .navbar-nav .show>.nav-link {
        color: #006435;
        font-weight: bold;
    }

    /* .form-control {
        color: #10375C;
        width: 18%;
    } */

    .btn-outline-primary {
        color: #10375C;
        border-color: #10375C;
        /* background-over: #10375C; */
    }

    span {
        color: red;
    }

    .btn {
        /* display: none; */
        display: initial;
    }

    a {
        color: #121214;
    }
    </style>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <h3>GESTION DES ETUDIANTS</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link " href="../Acceuil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../enseignant/enseignant.php">Enseignant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="etudiants.php">Eleve</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../absence/absence.php">Absences et Retards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../bulletin/bulletin.php">Bulletins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../parent/parents.php">Parents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../classe/classes.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../matiere/matiere.php">Matiere</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-warning" href="securité/logout.php">DECONNECTION</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <h1>Inscription d' une nouvelle etudiant</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <form action="action.php" method="post">
                    Nom :
                    <input type="text" class="form-control" id="nomEtudiant" name="nomEtudiant"
                        placeholder="Inserer le nom d'eleve*" value="<?php echo $nomEtudiant; ?>" />
                    <span id="error" style="display:none">Veuillez completer votre nom svp</span><br> Prenom :
                    <input type="text" class="form-control" id="prenomEtudiant" placeholder="Inserer le prenom d'eleve*"
                        name="prenomEtudiant" value="<?php echo $prenomEtudiant; ?>" />
                    <span id="error1" style="display:none">Veuillez completer votre prenom svp</span><br> Né(e) le :
                    <input type="date" class="form-control" id="dateNaissanceEtudiant" name="dateNaissanceEtudiant"
                        value="<?php echo $dateNaissanceEtudiant; ?>" /><br> à :
                    <input type="text" class="form-control" placeholder="Inserer le lieu*" id="lieuNaissEtudiant"
                        name="lieuNaissEtudiant" value="<?php echo $lieuNaissEtudiant; ?>" /><br> Sexe :
                    <label class="checkbox-inline">
                        <input type="radio" class="form-check-input" name="sexeEtudiant" id="optionsRadios3"
                            value="Masculin" <?php if ($modifier === "0") { ?> checked
                            <?php }
                                                                                                                                                                        if ($sexe_elev === "Masculin") { ?>
                            checked <?php } ?>>
                        Masculin
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" class="form-check-input" name="sexeEtudiant" id="optionsRadios3"
                            value="Feminin" <?php if ($sexe_elev === "Feminin") { ?> checked <?php } ?>> Feminin
                    </label><br> Adresse :
                    <input type="text" id="adresseEtudiant" class="form-control"
                        placeholder="Inserer l'adresse d'eleve*" name="adresseEtudiant"
                        value="<?php echo $adresseEtudiant; ?>" />
                    <span id="error6" style="display:none">Veuillez completer votre adresse svp</span><br> Maladie :
                    <input type="text" class="form-control" placeholder="Inserer la maladie s'il y ont a*"
                        id="maladieEtudiant" name="maladieEtudiant" value="<?php echo $maladieEtudiant; ?>" /><br>
            </div>
            <div class="col-lg-4">
                Nom et prenom du père :
                <input type="text" class="form-control" placeholder="Inserer le nom et prenom du père*"
                    id="nomPereEtudiant" name="nomPereEtudiant" value="<?php echo $nomPereEtudiant; ?>" /><br>
                Proffession :
                <input type="text" class="form-control" placeholder="Inserer le proffession du père*"
                    id="proffessionPere" name="proffessionPere" value="<?php echo $proffessionPere; ?>" /><br> Nom et
                prenom du mère :
                <input type="text" class="form-control" placeholder="Inserer le nom et prenom du mère*"
                    id="nomMereEtudiant" name="nomMereEtudiant" value="<?php echo $nomMereEtudiant; ?>" /><br>
                Proffession :

                <input type="text" class="form-control" placeholder="Inserer la proffession du mère*"
                    id="proffessionMere" name="proffessionMere" value="<?php echo $proffessionMere; ?>"><br> Nom et
                prenom du tuteur :
                <input type="text" class="form-control" placeholder="Inserer le nom et prenom du tuteur*"
                    id="nomTuteurEtudiant" name="nomTuteurEtudiant" value="<?php echo $nomTuteurEtudiant; ?>" /><br>
                Proffession :
                <input type="text" class="form-control" placeholder="Inserer la proffession du tuteur*"
                    id="proffessionTuteur" name="proffessionTuteur" value="<?php echo $proffessionTuteur; ?>" /><br>
            </div>
            <div class="col-lg-4">
                Adresse des parents :
                <input type="text" class="form-control" placeholder="Inserer l'adresse des parents*"
                    id="adresseParentEtudiant" name="adresseParentEtudiant"
                    value="<?php echo $adresseParentEtudiant; ?>" /><br> Contact des parents :
                <input type="text" maxlength="10" class="form-control" placeholder="Inserer le contact des parents*"
                    id="contactParentEtudiant" name="contactParentEtudiant" value="<?php echo $contact_parent; ?>" />
                <span id="error15" style="display:none">Veuillez completer votre prenom svp</span><br>
                <?php
                $sql = "SELECT * from anneescolaire";
                $resultat = $connection->query($sql);
                ?>
                Année Scolaire :
                <select id="anneeScolaire" name="anneeScolaire" class="form-select"
                    value="<?php echo $anneeScolaire; ?>">>
                    <?php
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['code_annee']; ?>"><?php echo $row['code_annee']; ?></option>
                    <?php
                    }
                    ?>
                </select><br>
                <?php
                $sql = "SELECT * from classe";
                $resultat = $connection->query($sql);
                ?>
                Classe :

                <?php
                if ($modifier === "1") { ?>
                <select id="classeEtudiant" name="classeEtudiant" class="form-select"
                    value="<?php echo $classeEtudiant; ?>">
                    <?php
                            $sql = "SELECT * from classe WHERE classe.nom_classe='$classeEtudiant'";
                            $resultat = $connection->query($sql);
                            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['nom_classe']; ?>">
                        <?php echo $row['nom_classe']; ?></option>
                </select><br>
                <?php }
                } else { ?>
                <select id="classeEtudiant" name="classeEtudiant" class="form-select"
                    value="<?php echo $classeEtudiant; ?>">
                    <?php
                        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['nom_classe']; ?>">
                        <?php echo $row['nom_classe']; ?></option>
                    <?php }
                }
                ?>
                </select><br>


                </form>
                <?php
                if ($modifier == "1") { ?>
                <input type="hidden" id="id" name="id" value="<?php echo $id_elev; ?>" /><br>
                <a href="etudiants.php" class="btn btn-secondary">Annuler</a>
                <input type="submit" onclick="messageajour()" class="btn btn-primary" id="ajourEtudiant"
                    name="ajourEtudiant" value=" Enregistrer les modifications" />
                <?php
                } else { ?>
                <a href="etudiants.php" class="btn btn-secondary">Annuler</a>
                </form>
                <input type="submit" onclick="message();" class="btn btn-primary" id="ajoutEtudiant"
                    name="ajoutEtudiant" value=" Enregistrer" />

                <?php } ?>





</body>

</html>