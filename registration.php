<?php
require_once("Users-pdo.php");


// Instancier la classe Userspdo
$User = new Userspdo();

//  Appel connection à BD 
if ($User->getConnection()) {

    // Vérifier si le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];


        // Appel de la méthode d'inscription
        // $User->register($login, $password, $email, $firstname, $lastname);
        $result = $User->register($login, $password, $confirm_password, $email, $firstname, $lastname);
        if ($result !== true) {
            echo "<p style='color:red;'>$result</p>"; // Affiche le message d'erreur
        } else {
            header("Location: login.php");
            exit;  //après un header redirect
        }
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

<?php if (!empty($_SESSION['message'])): ?>
        <div class="error-message">
            <p><?php echo htmlspecialchars($_SESSION['message']); ?></p>
            <?php unset($_SESSION['message']); // Suppression du message après affichage ?>
        </div>
    <?php endif; ?>
    
    <div class="global-container">
        <h2>Inscription</h2>

        <form action="registration.php" method="POST">
        <div class="form-group">
                <label for="login" class="custom-label">Login:</label>
                <input type="text" id="login" name="login"  required>
            </div>
            <div class="form-group">
                <label for="password" class="custom-label">Mot de Passe:</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="custom-label">Confirmez votre Mot de Passe:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez votre mot de passe" required>
            </div>

            <div class="form-group">
                <label for="firstname" class="custom-label">Prénom:</label>
                <input type="text" id="firstname" name="firstname"  required>
            </div>
            <div class="form-group">
                <label for="lastname" class="custom-label">Nom:</label>
                <input type="text" id="lastname" name="lastname"  required>
            </div>
            <div class="form-group">
                <label for="email" class="custom-label">Email:</label>
                <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
            </div>
            <!-- <div class="form-group">
                <label for="password" class="custom-label">Mot de Passe:</label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="form-group">
                <label for="mdp_confirm" class="custom-label">Confirmez votre Mot de Passe:</label>
                <input type="password" id="mdp_confirm" name="mdp_confirm" placeholder="Confirmez votre mot de passe" required>
            </div> -->
            <button type="submit" class="submit-btn">S'enregistrer</button> 
           
        </form>
        <a href="login.php"><button class="submit">Déjà inscrit ?</button></a> 
    </div>

    
    

</body>

</html>