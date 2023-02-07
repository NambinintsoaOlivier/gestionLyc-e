<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js.js"></script>
    <script>
    </script>
    <title>Parents</title>
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
                        <a class="nav-link" href="../absence/absence.php">Absences et Retards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../bulletin/bulletin.php">Bulletins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="parents.php">Parents</a>
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
        <h2 class="text-center">LISTE DES PARENTS </h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Père et Mère ou Tuteur</th>
                    <th>Contact</th>
                    <th>Adresse</th>
                    <th>Parametre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require('../securité/db_conn.php');
                $sql = "SELECT * FROM parent";
                $resultat = $connection->query($sql);
                while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                <tr class="liste">
                    <td>
                        <?php echo  $row['nomprenom_pere']; ?><br>
                        <?php echo  $row['nomprenom_mere'];  ?><br>
                        <?php echo $row['nomprenom_tuteur']; ?>
                    </td>
                    <td>
                        <?php echo $row['contact_parent']; ?>
                    </td>
                    <td>
                        <?php echo $row['adresse_parent']; ?>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger"
                            href="action.php?deleteparent=<?php echo $row['code_parent'] ?>">Supprimer</a>
                        <a class="btn btn-outline-info" href="fils.php?fils=<?php echo $row['contact_parent'] ?>">Fils
                            et Filles</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</body>

</html>