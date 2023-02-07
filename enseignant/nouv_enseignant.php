<?php
require_once("../securité/db_conn.php");
if (isset($_GET['editeprof'])) {
    $id = $_GET['editeprof'];
    $sql = "SELECT * FROM enseignant2 WHERE id_prof = '$id'";

    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $id_prof = $row['id_prof'];
    $nomProf = $row['nom_prof'];
    $prenomProf = $row['prenom_prof'];
    $cinProf = $row['cin_prof'];
    $dateProf = $row['date_delivrance'];
    $sexe = $row['sexe_prof'];
    $duplicataProf = $row['duplicata'];
    $adresseProf = $row['adresse'];
    $contactProf = $row['contact_prof'];
    $numAutoProf = $row['num_auto_enseign'];
    $imProf = $row['im'];
    $diplomeAcademiqueProf = $row['diplome_academique'];
    $diplomePedagogiqueProf = $row['diplome_pedagogique'];
    $fonctionProf = $row['fonction'];
    $specialiteProf = $row['specialite'];
    $matiereProf = $row['matiere_prof'];
    $categorieProf = $row['categorie_proffessionnel'];
    $classeProf = $row['classe_tenue'];
    $encienneteProf = $row['enciennete'];
    $modifier = "1";
    $message1 = "Recrocher les matieres et ajouter d'autres si vous voulez!";
    $message2 = "Recrocher les classes et ajouter d'autres si vous voulez!";
    // echo $id_prof;
}
?>

<!doctype html>
<html lang="fr" id="ens">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js.js"></script>
    <title>Enseignant</title>
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

    p {
        color: #00d4ff;
    }


    .navbar-expand-md {
        background-color: #000000eb;
        padding-bottom: 0px;
    }

    h3 {
        color: #ffc107;

    }

    h1 {
        margin-top: -1rem;
        color: #00cf40d6;
    }

    strong {
        color: #ffc107;
        font-weight: initial;
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

    input.form-control {
        color: #e0a906;
        width: 100%;
    }

    tbody {
        background-color: transparent;
        padding: 0.4rem 0.3rem;
        text-align: left;
        color: #fff;
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

    .form-control {
        color: #10375C;
        width: 18%;
        background-color: transparent;
    }

    span {
        color: red;
    }

    .form-check-input:checked {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-outline-primary {
        color: #10375C;
        border-color: #10375C;
        /* background-over: #10375C; */
    }

    .btn {
        /* display: none; */
        display: initial;
    }

    a {
        color: #121214;
    }

    .mat {
        background-color: transparent;
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
                        <a class="nav-link active" href="enseignant.php">Enseignant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../etudiant/etudiants.php">Eleve</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../absence/absence.php">Absences et Retards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../bulletin/bulletin.php">Bulletins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="parent/parents.php">Parents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="classe/classes.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="matiere/matiere.php">Matiere</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-warning" href="securité/logout.php">DECONNECTION</a>
                </form>
            </div>
        </div>
    </nav><br>
    <div class="container-fluid">



        <div class="row">
            <div class="col-lg-8">
                <?php
                if ($modifier == true) { ?>
                <h1>Modifications Proffesseur</h1>
                <?php } else { ?>
                <h1>Nouvelle Proffesseur</h1>
                <?php } ?>
            </div>

            <div class="col-lg-4">
                <?php
                if ($modifier == "1") { ?>
                <a href="enseignant.php" class="btn btn-secondary me-2">Annuler</a>
                <input type="submit" onclick="ajourProf();" name="ajourProf" class="btn btn-outline-success"
                    value=" Enregistrer les modifications" />
                <?php
                } else { ?>
                <a href="enseignant.php" class="btn btn-secondary me-2">Annuler</a>
                <input type="submit" onclick="ajoutProf();" name="ajoutProf" class="btn btn-outline-success"
                    value=" Enregistrer" />
                <?php } ?>
            </div>


        </div>



        <hr>


        <div class="row">
            <div class="col-lg-3">
                <form action="action.php" method="post">
                    <?php include("action.php"); ?>
                    <label>Nom :</label>
                    <input type="text" class="form-control" id="nomProf" placeholder="Inserer le nom*" name="nomProf"
                        value="<?php echo $nomProf; ?>" />
                    <span id="error" style="display:none">Veuillez completer le nom svp</span><br>
                    <label>Prenom :</label>
                    <input type=" text" class="form-control" id="prenomProf" placeholder="Inserer le prenom*"
                        name="prenomProf" value="<?php echo $prenomProf; ?>" />
                    <span id="error1" style="display:none">Veuillez completer le prenom svp</span><br>
                    CIN :
                    <input type="text" class="form-control" maxlength="14" id="cinProf" placeholder="Inserer le CIN*"
                        name="cinProf" value="<?php echo $cinProf; ?>" />
                    <span id="error2" style="display:none">Veuillez completer le CIN svp</span><br>
                    Date de delivrance :
                    <input type="date" class="form-control" id="dateDelivranceProf" name="dateDelivranceProf"
                        value="<?php echo $dateProf; ?>" /><br>
                    <label class="form-check-label">
                        Sexe :
                        <input type="radio" class="form-check-input" name="sexe" value="Masculin"
                            <?php if ($modifier === "0") { ?> checked <?php } 
                            if ($sexe==="Masculin" ) { ?> checked <?php } ?>>
                        Masculin
                        <input type="radio" class="form-check-input" name="sexe" value="Feminin" <?php if ($sexe === "Feminin") {
                                                                                                        ?> checked
                            <?php } ?>>
                        Feminin
                    </label><br><br>
                    Duplicata :
                    <input type="text" class="form-control" id="duplicataProf" placeholder="Inserer le numero tel*"
                        name="duplicataProf" value="<?php echo $duplicataProf; ?>" /><br>
                    Adresse :
                    <input type="text" class="form-control" placeholder="Inserer l' adresse*" id="adresseProf"
                        name="adresseProf" value="<?php echo $adresseProf; ?>" /><br>
            </div>
            <div class="col-lg-5">
                Contact :
                <input type="tel" class="form-control" maxlength="10" id="contactProf"
                    placeholder="Inserer le numero tel*" name="contactProf" value="<?php echo $contactProf; ?>" />
                <span id="error8" style="display:none">Veuillez completer le numero tel svp</span><br>
                N° autorisation d'enseigner :
                <input type="text" class="form-control" id="numAutoProf" placeholder="Inserer le num d'autorisation*"
                    name="numAutoProf" value="<?php echo $numAutoProf; ?>" />
                <span id="error9" style="display:none">Veuillez completer la numero svp</span><br>
                IM :
                <input type="text" class="form-control" id="imProf" placeholder="Inserer l'IM*" name="imProf"
                    value="<?php echo $imProf; ?>" /><br>
                Diplôme académique et professionnel le plus élevé :
                <input type="text" class="form-control" id="diplomeAcademiqueProf" placeholder=" Inserer le diplôme*"
                    name="diplomeAcademiqueProf" value="<?php echo $diplomeAcademiqueProf; ?>" />
                Diplôme pédagogique et professionnel le plus élevé :
                <input type="text" class="form-control" id="diplomePedagogiqueProf" placeholder=" Inserer le diplôme*"
                    name="diplomePedagogiqueProf" value="<?php echo $diplomePedagogiqueProf; ?>"><br>
                Fonction :
                <input type="text" class="form-control" id="fonctionProf" placeholder=" Inserer la fonction*"
                    name="fonctionProf" value="<?php echo $fonctionProf; ?>" /><br>
                Spécialité :
                <input type="text" class="form-control" id="specialiteProf" placeholder=" Inserer la catégorie Pro*"
                    name="specialiteProf" value="<?php echo $specialiteProf; ?>" /><br>
            </div>
            <div class="col-lg-4">

                Catégorie professionnelle :
                <input type="text" class="form-control" id="categorieProf" placeholder=" Inserer la fonction*"
                    name="categorieProf" value="<?php echo $categorieProf; ?>" /><br>
                Matière enseignées : <strong><?php echo $matiereProf; ?></strong>
                <span id="error16" style="display:none">Veuillez
                    crocher au mois une cage
                    svp</span>
                <table class="table">
                    <tr class="mat">
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="MATH">MATH
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="PC">PC</td>
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="ANG">ANG</td>
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="FRS">FRS</td>
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="PHILO">PHILO<br>
                        </td>
                    </tr>
                    <tr class="mat">
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="SVT">SVT</td>
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="EPS">EPS</td>
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="HG">HG</td>
                        <td><input type="checkbox" class="form-check-input" name="matiere" value="MLG">MLG<br></td>
                        <td></td>
                    </tr>
                    <p><?php echo $message1; ?></p>
                </table>

                <br>

                Classe tenue : <strong><?php echo $classeProf; ?></strong><span id="error17"
                    style="display:none">Veuillez
                    crocher
                    au mois une cage svp</span>
                <table class="table">
                    <tr class="mat">
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="6 eme">6 èm</td>
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="5 eme">5 èm</td>
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="4 eme">4 èm</td>
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="3 eme">3 èm</td>
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="seconde">Seconde
                        </td>
                    </tr>
                    <tr class="mat">
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="Premiere L">Premiere L
                        </td>
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="Premiere S">Premiere S
                        </td>
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="Terminal L">Terminal L
                        </td>
                        <td> <input type="checkbox" class="form-check-input" name="classe" value="Terminal S">Terminal S
                        </td>
                    </tr>
                    <p><?php echo $message2; ?></p>
                </table>
                Encienneté dans la fonction enseignante :
                <input type="text" class="form-control" id="encienneteProf" placeholder=" Inserer l' encienneté*"
                    name="encienneteProf" value="<?php echo $encienneteProf; ?>" />
                <input type="hidden" id="id" name="id" value="<?php echo $id_prof; ?>" /><br>
                </form>
</body>

</html>