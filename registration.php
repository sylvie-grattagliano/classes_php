
<?php
require_once("Users-pdo.php");

// Instancier la classe Userspdo
$User = new Userspdo();

// Tester la connexion à la base de données
if ($User->getConnection()) {  // Si la connexion est réussie
    // echo "Connexion à la base de données réussie.<br>";

    // Vérifier si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        // Appel de la méthode d'inscription
        $User->register($login, $password, $email, $firstname, $lastname);
        header("Location: login.php");
    }
} else {
    echo "Échec de la connexion à la base de données.<br>";
    
    
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_formulaire.css">
    <title>Inscription</title>
</head>
<body>
<div class="global-container-c">
    <h1>Inscription</h1>
    <form action="registration.php" method="POST">
    <div class="form-group">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="firstname">Prénom :</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <button type="submit">S'inscrire</button>
    </form>
</div>
</body>
</html>
