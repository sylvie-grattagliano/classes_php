<?php
require_once("connexion.php");

$userID = intval($_SESSION["userID"] ?? "");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>navbar</title>
</head>
<body>

    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <?php if($userID <= 0) { ?>
                <li><a href="registration.php">Inscription</a></li>
                <li><a href="login.php">Connexion</a></li>
            <?php } else { ?>
                <li><a href="profil.php">Mon compte</a></li>
                <li><a href="disconnect.php">Déconnexion</a></li>
            <?php } ?>
            <li><a href="affichage.php">Liste utilisateurs</a></li>
        </ul>
    </nav>

</body>
</html>
