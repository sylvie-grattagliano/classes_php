<?php
require_once("Users-pdo.php");
require_once("navbar.php"); 

$user = new Userspdo();

$currentUser = $user->getCurrentUser();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>COMPTE UTILISATEUR</h1>

    <form action="profil.php" method="POST">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($currentUser['login']); ?>" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" placeholder="mot de passe">

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($currentUser['email']); ?>" required>

        <input type="submit" value="Mettre à jour">
    </form>

    <!-- Bouton de déconnexion -->
    <a href="disconnect.php">Se déconnecter</a>

</body>
</html>