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
    input {
        display: initial;
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
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .col-lg-10 {
        margin-top: 6px;
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
        height: 510px;
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

    .btn-outline-primary {
        color: #10375C;
        border-color: #10375C;
        /* background-over: #10375C; */
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
                        <a class="nav-link" href="../parent/parents.php">Parents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../classe/classes.php">Classes et Matieres</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-warning" href="securité/logout.php">DECONNECTION</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <h2> Absences et Retards</h2>
        <div class="row">
            <div class="col-lg-10">
                <select class="btn slt me-2" id="classe" onchange="classeAbsence();">
                    <option value="tout">tout</option>
                    <option value="6 eme">6 eme</option>
                    <option value="5 eme">5 eme</option>
                    <option value="4 eme">4 eme</option>
                    <option value="3 eme">3 eme</option>
                    <option value="Second">Second</option>
                    <option value="Premiere L">Premiere L</option>
                    <option value="Premiere S ">Premiere S</option>
                    <option value="Terminal L">Terminal L</option>
                    <option value="Terminal S">Terminal S</option>
                </select>
            </div>
            <div class="col-lg-2">
                <input class="form-control" onkeyup="rechercheEtudiantAbsent();" name=" nom" id="nom" type="text"
                    placeholder="rechercher">
            </div>
        </div>
        <div class="table-header">
            <table class="table">
                <thead>
                    <tr>
                        <th width="20%" class="text-center">Nom</th>
                        <th width="20%">Prénom</th>
                        <th width="20%">Sexe</th>
                        <th width="20%">Classe</th>
                        <th width="20%" class="text-center">ABCENCES</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="table-body">
            <table class="table">
                <tbody id="search_elev_absent">
                    <?php
                    require('../securité/db_conn.php');
                    $sql = "SELECT * FROM etudiant order by nom_elev  ";
                    $resultat = $connection->query($sql);
                    while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr class="liste">
                        <td width="20%">
                            <a href="info.php?inform=<?php echo $row['id_elev'] ?>"><?php echo $row['nom_elev'];  ?></a>
                        </td>
                        <td width="20%">
                            <?php echo $row['prenom_elev'];  ?>
                        </td>
                        <td width="20%">
                            <?php echo $row['sexe_elev']; ?>
                        </td>
                        <td width="20%">
                            <?php echo $row['nom_classe']; ?>
                        </td>
                        <td width="20%" class="text-center">
                            <a class="btn btn-outline-primary"
                                href="nouv_absence.php?absence=<?php echo $row['id_elev'] ?>">Ajouter</a>
                        </td>
                    </tr>
                    <?php  }  ?>
                </tbody>
            </table>
        </div>
</body>

</html>