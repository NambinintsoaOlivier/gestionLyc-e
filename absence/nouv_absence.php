<?php
require('../securité/db_conn.php');
if (isset($_GET['absence'])) {
    $id = $_GET['absence'];
    $sql = "SELECT * FROM etudiant  where id_elev = '$id'";
    $resultat = $connection->query($sql);
    $row = $resultat->fetch(PDO::FETCH_ASSOC);

    $prenom = $row['prenom_elev'];
    $id = $row['id_elev'];
    $classe = $row['nom_classe'];

    ?>

<!doctype html>
<html lang="fr">

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
        margin: 0;
        padding: 0;
        background-color: #000123;
        min-height: 75rem;
        padding-top: 4.5rem;
        height: 100%;
        width: 100%;
        overflow-y: hidden;
        color: #fff;
    }

    .form-check-input:checked {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #000a14;
        opacity: 1;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    input.form-control {
        color: #e0a906;
        width: 100%;
        background-color: transparent;
    }

    .navbar-expand-md {
        background-color: #000000eb;
        padding-bottom: 0px;
    }

    .table-header {
        float: left;
        width: 100%;
    }

    .table-body {
        float: left;
        height: 430px;
        width: inherit;
        overflow-y: scroll;
    }

    h3 {
        color: #ffc107;

    }

    h2 {
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 1.5rem;
        color: #fff;
        text-shadow: 4px 6px 10px #10375C;
        text-align: center;
        margin-left: 4rem;
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

    select.form-select {
        color: #e0a906;
        width: 100%;
        background-color: #000123;
    }

    table {
        /* border-style: groove; */
        /* border-color: inherit; */
        border-style: solid;
        border-width: 0;
        border-style: solid;
    }

    tr {
        width: 100%;
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
        color: #000123;
    }

    .navbar-dark .navbar-nav .nav-link.active,
    .navbar-dark .navbar-nav .show>.nav-link {
        color: #006435;
        font-weight: bold;
    }

    .form-control {
        color: #10375C;
        width: 100%;
    }

    .btn-outline-primary {
        color: #10375C;
        border-color: #10375C;
        /* background-over: #10375C; */
    }

    .btn {
        /* display: none; */
        width: 100%;
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
                <h3>GESTION DES BULLETINS</h3>
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
                        <a class="nav-link " href="../etudiant/etudiants.php">Eleve</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="absence.php">Absences et Retards</a>
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
    </nav>
    <h2 class="text-center">Fiche d'absence</h2>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form action="action.php" method="post">
                    Prenom :
                    <input class="form-control" type="hidden" id="ideleve" name="ideleve" value="<?php echo $id ?>" />
                    <input class="form-control" type="text" name="prenom" value="<?php echo $prenom ?>" readonly />
                    classe :
                    <input class="form-control" type="text" id="classe" name="classe" value="<?php echo $classe ?>"
                        readonly />
                    <?php
                        $sql = "SELECT * from trimestre";
                        $resultat = $connection->query($sql);
                    ?>
                    Trimestre :
                    <select class="form-select" id="trimestre" name="trimestre">
                        <?php while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['nom_trimestre']; ?>"><?php echo $row['nom_trimestre']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <?php
                        $sql = "SELECT * from anneescolaire";
                        $resultat = $connection->query($sql);;
                    ?> Année Scolaire :
                    <select class="form-select" id="anneescol" name="anneescol">
                        <?php while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['code_annee']; ?>"><?php echo $row['code_annee']; ?></option>
                        <?php } ?>
                    </select>
                    Heure d'absence :
                    <input class="form-control" type="number" id="heure" name="heure" />
                    Nombre de jours d'absence :
                    <input class="form-control" type="text" id="date" name="date" /><br>
                </form>
                <input class="btn btn-primary" type="submit" onclick="abscence();" value="Enregistrer" />
                <?php } ?>
</body>

</html>