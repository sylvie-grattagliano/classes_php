<?php
require_once("Users-pdo.php");

$user = new Userspdo();

// Appel de la méthode de déconnexion
$user->disconnect();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_formulaire.css">
    <title>Déconnexion</title>
</head>

<body>
    <div class="global-container-c">
        <div class="form-group">
            <h1>Déconnexion</h1>
        </div>
        <div class="form-group">
            <h2>Vous êtes maintenant déconnecté.</h2>
        </div>
        <div class="form-group">
            <a href="login.php"><button class="submit">Se reconnecter ?</button></a>
        </div>
</body>

</div>

</html>