<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
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

    h4 {
        /* margin-top: 2rem; */
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 2rem;
        color: #fff;
        /* text-shadow: 4px 6px 10px #10375C; */
        text-align: left;
        margin-left: 14rem;
    }

    .navbar-dark .navbar-nav .nav-link.active,
    .navbar-dark .navbar-nav .show>.nav-link {
        color: #006435;
        font-weight: bold;
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
        text-align: center;
        font-weight: normal;

    }

    .container {
        margin-top: 60px;
    }

    tbody {
        background-color: #cdcdcd;
        padding: 0.4rem 0.3rem;
        text-align: left;
        color: #10375C;
        text-align: center;

    }
    </style>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a class="nav-link active" href="Acceuil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="enseignant/enseignant.php">Enseignant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="etudiant/etudiants.php">Eleve</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="absence/absence.php">Absences et Retards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bulletin/bulletin.php">Bulletins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="parent/parents.php">Parents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="classe/classes.php">Classes et Matieres</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a class="btn btn-outline-warning" href="securité/logout.php">DECONNECTION</a>
                </form>
            </div>
        </div>
    </nav>
    <main class="container">
        <?php include_once("php.php"); ?>
        <br>
        <br>
        <table class="table bg-dark">
            <thead>
                <tr>
                    <h4>Effectif total des Etudiants :</h4>
                    <th>Tous les étudiants</th>
                    <th>6 em</th>
                    <th>5 em</th>
                    <th>4 em</th>
                    <th>3 em</th>
                    <th>Second</th>
                    <th>Premiere L</th>
                    <th>Premiere S</th>
                    <th>Terminal L</th>
                    <th>Terminal S</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php if (isset($nbrTotal)) {
                            echo $nbrTotal . ' élèves';
                        } ?></td>
                    <td><?php if (isset($six)) {
                            echo $six;
                        } ?></td>
                    <td><?php if (isset($cinq)) {
                            echo $cinq;
                        } ?></td>
                    <td><?php if (isset($quatre)) {
                            echo $quatre;
                        } ?></td>
                    <td><?php if (isset($trois)) {
                            echo $trois;
                        } ?></td>
                    <td><?php if (isset($second)) {
                            echo $second;
                        } ?></td>
                    <td><?php if (isset($PremiereL)) {
                            echo $PremiereL;
                        } ?></td>
                    <td><?php if (isset($PremiereS)) {
                            echo $PremiereS;
                        } ?></td>
                    <td><?php if (isset($TerminalL)) {
                            echo $TerminalL;
                        } ?></td>
                    <td><?php if (isset($TerminalS)) {
                            echo $TerminalS;
                        } ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table bg-dark">
            <thead>
                <h4>Effectif total des Proffesseurs :</h4>
                <tr>
                    <th>Total enseignants</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php if (isset($prof)) {
                            echo $prof . ' Proffesseurs';
                        } ?>
                    </td>
                </tr>
            </tbody>
        </table>

    </main>
</body>

</html>