<?php
require_once("../securité/db_conn.php");
include("action.php");
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
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/modals/"> -->
    <style>
    input {
        display: initial;
    }

    body {
        color: #fff;
        margin: 0;
        padding: 0;
        background-color: #000123;
        min-height: 75rem;
        padding-top: 4.5rem;
        height: 100%;
        width: 100%;
        overflow-y: hidden;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .col-lg-10 {
        margin-top: 6px;
    }

    .form-check-input:checked {
        background-color: #ffc107;
        border-color: #ffc107;
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

    .btn {
        /* display: none; */
        display: initial;
    }

    .navbar-expand-md {
        background-color: #000000eb;
        padding-bottom: 0px;
    }

    .table-header {
        float: left;
        width: 100%;
        margin-top: 6px;
    }

    .table-body {
        float: left;
        height: 480px;
        width: inherit;
        overflow-y: scroll;
        margin-top: -14px;
    }

    .btn {
        display: initial;
    }

    h3 {
        color: #ffc107;

    }

    h2 {
        text-transform: uppercase;
        font-size: 1.5rem;
        color: #fff;
        text-shadow: 4px 6px 10px #10375C;
        text-align: center;
        margin-left: 4rem;
    }

    table {
        border-style: solid;
        border-width: 0;
        border-style: solid;
    }

    thead {
        padding: 0.4rem 0.3rem;
        color: #10375c;
        background-color: #ffc107cc;
    }

    tbody {
        background-color: #cdcdcd;
        padding: 0.4rem 0.3rem;
        color: #121214;
        border-color: #121214;
    }

    tr {
        width: 100%;
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
        display: initial;
    }

    .slt {
        background-color: #fff;
    }

    .btn-primary {
        background-color: transparent;
    }

    .btn-success {
        border-color: #000000;
    }

    .btn-danger {
        color: #ffffff;
        border-color: #000000;
        background-color: #ff0119;
    }

    .btn-dark {
        color: #ffffff;
        border-color: #000000;
        background-color: #000123;
    }

    .row {
        margin-top: -10px;
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
                        <a class="nav-link" href="../classe/classes.php">Classes et Matiers</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-warning" href="securité/logout.php">DECONNECTION</a>
                </form>
            </div>
        </div>
    </nav>

    <body>
        <h2>Fiche d'evaluation</h2>
        <div class="container-fluid">
            <div class="col-lg-4">
                <form action="action.php" method="post">
                    Nom :
                    <input type="hidden" name="idelev" value="<?php echo $id_elev; ?>" />
                    <input type="hidden" name="idnote" value="<?php echo $id; ?>" />
                    <input type="text" class="form-control" name=" classe" value="<?php echo $nomEtudiant; ?>" /><br>
                    prenom(s) :
                    <input type="text" class="form-control" name="classe" value="<?php echo $prenomEtudiant; ?>" /><br>
                    classe :
                    <input type="text" class="form-control" name="classe" value="<?php echo $classeEtudiant; ?>" /><br>
                    Trimestre :
                    <select class="form-control" name="trimestre">
                        <?php
                        if (isset($_GET['modifnote'])) {
                            $id = $_GET['modifnote'];
                            $sql = "SELECT * FROM notes  where id_note = '$id'";
                            $resultat = $connection->query($sql);
                            $row = $resultat->fetch(PDO::FETCH_ASSOC);

                            $id = $row['id_elev'];
                            $trimestre = $row['trimestre'];

                            $sql = "SELECT * from trimestre where nom_trimestre = '$trimestre'";
                            $resultat = $connection->query($sql);
                            $row = $resultat->fetch(PDO::FETCH_ASSOC); ?>
                        <option value="<?php echo $row['nom_trimestre']; ?>"> <?php echo $row['nom_trimestre']; ?>
                        </option>
                        <?php
                            } else {
                                $sql = "SELECT * FROM trimestre";
                                $resultat = $connection->query($sql);
                                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>


                        <option value="<?php echo $row['nom_trimestre']; ?>"> <?php echo $row['nom_trimestre']; ?>
                        </option>


                        <?php }
                        } ?>
                    </select><br>

                    <?php
                    if (isset($_GET['evaluer'])) {
                        $id = $_GET['evaluer'];
                        $sql = "SELECT * FROM etudiant  where id_elev = '$id'";
                        $resultat = $connection->query($sql);
                        $row = $resultat->fetch(PDO::FETCH_ASSOC);

                        $id = $row['id_elev'];
                        $classe = $row['nom_classe'];

                        $sql = "SELECT * from matiere where classe_mat = '$classe'";
                        $resultat = $connection->query($sql);
                    }

                    if (isset($_GET['modifnote'])) {
                        $id = $_GET['modifnote'];
                        $sql = "SELECT * FROM notes  where id_note = '$id'";
                        $resultat = $connection->query($sql);
                        $row = $resultat->fetch(PDO::FETCH_ASSOC);
                        $id = $row['id_elev'];
                        $matiere = $row['matiere'];
                        $classe = $row['nom_classe'];
                        $sql = "SELECT * from matiere where classe_mat = '$classe' and nom_matiere='$matiere'";
                        $resultat = $connection->query($sql);
                    } ?>
                    Matiere :
                    <select class="form-control" name="matiere">
                        <?php
                        while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['nom_matiere'];  ?>">
                            <?php echo $row['nom_matiere']; ?></option>
                        <?php } ?>
                    </select><br>



                    Note journaliere/20 :
                    <input class="form-control" type="text" name="note_journaliere"
                        value="<?php echo $note_journaliere ?>" /><br>
                    Note composition/20 :
                    <input class="form-control" type="text" name="nc"
                        value="<?php echo $note_composition  ?>" /><br><br>
                    <?php if ($modifier == true) { ?>
                    <input type="submit" name="editenote" value="valider" />
                    <?php } else { ?>
                    <input type="submit" class="btn btn-primary" name="ajoutnote" value="Enregistrer" />
                    <?php } ?>
                </form>

    </body>

</html>