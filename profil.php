<?php
require_once("Users-pdo.php");

// Vérification de la session
if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    exit();
}

// Création de l'objet user
$user = new Userspdo();
// Utilisateur actuel connecté
$currentUser = $user->getCurrentUser();

//print_r($currentUser); // Debug: afficher les informations de l'utilisateur

// Vérification de l'utilisateur connecté
if ($currentUser) {
    // Extraire les informations utilisateur
    $login = $currentUser['login'];
    $email = $currentUser['email'];
    $firstname = $currentUser['firstname'];
    $lastname = $currentUser['lastname'];
} else {
    echo "Erreur : impossible de récupérer les informations de l'utilisateur.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérification du mot de passe et confirmation
    if (!empty($password)) {
        if ($password === $confirm_password) {
            // Mise à jour avec mot de passe
            if ($user->update($login, $password, $email, $firstname, $lastname)) {
                echo "Mise à jour réussie.";
            } else {
                echo "Échec de la mise à jour.";
            }
        } else {
            echo "<p>Les mots de passe ne correspondent pas.</p>";
        }
    } else {
        
        // Mise à jour sans mot de passe
        if ($user->update($login, $email, $firstname, $lastname)) {
            
        } else {
            echo "Échec de la mise à jour.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil utilisateur</title>
    <link rel="stylesheet" href="style_moncpte_css.css">
</head>

<body>
    <?php include_once("navbar.php") ?>

    <div class="global-container-c"> 
        <div class="form-group">
            <h2>Mon compte</h2>
            <p> Bienvenue <?= htmlspecialchars($firstname) . ' ' . htmlspecialchars($lastname); ?> !</p>
        </div>

        <!-- Formulaire de mise à jour du profil -->
        <form action="profil.php" method="POST" >
            <div class="form-group">
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" value="<?= htmlspecialchars($login); ?>" required><br>
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" id="password" name="password"><br>

                <label for="confirm_password">Confirmer le mot de passe :</label>
                <input type="password" id="confirm_password" name="confirm_password"><br>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email); ?>" required><br>

                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" name="firstname" value="<?= htmlspecialchars($firstname); ?>" required><br>

                <label for="lastname">Nom :</label>
                <input type="text" id="lastname" name="lastname" value="<?= htmlspecialchars($lastname); ?>" required><br>

                <!-- <label for="password">Nouveau mot de passe :</label>
                <input type="password" id="password" name="password"><br>

                <label for="confirm_password">Confirmer le mot de passe :</label>
                <input type="password" id="confirm_password" name="confirm_password"><br> -->

                <button type="submit" class="button">Mettre à jour</button>  
            </div>
        </form>
        
        <button class="button-c"><a href="disconnect.php">Déconnexion</a></button> 
        <p><a href="delete.php?id=<?= $_SESSION['userID']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?');">Supprimer mon compte</a></p> 
    </div>   
</body> 

</html>
