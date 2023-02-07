<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Securité</title>
    <style>
    label.etu {
        color: #ffc107;
        font-size: 2.9rem;
        text-shadow: 4px 6px 10px #b78b09;
    }
    </style>
</head>

<body>
    <div class="contenair">
        <div>
            <h1>Gestion des <label class="etu">Etudiants</label>
            </h1>
            <p class="info">Spécialisé pour gérer les étudiants du classes Secondaire
                <br> et des classes Lycéennes
            </p>
        </div>
        <div>
            <form action="securité/login.php" method="post">
                <label class="identification" for="">Identification</label><br>
                <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } else { ?>
                <br><br>
                <?php
                } ?>
                <label for="floatingInput">Utilisateur :</label><br>
                <input type="text" name="uname" class="" id="floatingInput" placeholder="Utilisateur"> <br>
                <label for="floatingPassword">Mot de passe :</label><br>
                <input type="password" name="password" class="" id="floatingPassword" placeholder="votre mot de passe">
                <br><br>
                <button class="confirm" type="submit">Confirmer</button>
            </form>
        </div>
    </div>
</body>

</html>