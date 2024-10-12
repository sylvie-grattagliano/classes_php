<?php
require_once("Users-pdo.php");
// Instancier la classe Userspdo
// $user = new Userspdo();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new Userspdo();
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Appel de la méthode de connexion
    if ($user->connect($email, $password)) {
        echo "Connexion réussie.";

        header("Location: profil.php");
    } else {
        echo "Erreur : email ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_formulaire.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
    <div class="global-container-c">

        <h2>Connexion</h2>
        <section>
            <form action="login.php" method="post">


                <div class="form-group">
                    <label for="email" class="custom-label">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="custom-label">Mot de Passe:</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>
                
                <a href="profil.php"><button type="submit" class="submit-btn">Se connecter</button></a>


            </form>
            <a href="registration.php"><button class="submit">Je n'ai pas de compte!</button></a>
        </section>



    </div>

    <?php if (!empty($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>