<?php require_once("Users-pdo.php"); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil - Exercice PHP avec PDO</title>
</head>

<body>
    <?php require_once("navbar.php"); ?>
    <div class="container">
        <h1>Bienvenue sur l'exercice PHP PDO POO</h1>
        </br>
        <div class="content">

            Dans cet exercice, nous avons mis en place plusieurs fonctionnalités
            pour gérer les utilisateurs à travers une base de données. Voici les différentes fonctionnalités :
        </div>
    </div>

    <div class="container">
        <div class="content">
            <h2>Fonctionnalités disponibles</h2>
            </br>
        </div>
        <ul>
            <li><strong>Inscription :</strong> Permet aux utilisateurs de créer un compte en fournissant un login, mot de passe, email, prénom et nom. Accédez à la page <a href="register.php">d'inscription</a>.</li>
            <li><strong>Connexion :</strong> Permet aux utilisateurs de se connecter à leur compte en fournissant leur email et mot de passe. Accédez à la page de <a href="login.php">connexion</a>.</li>
            <li><strong>Déconnexion :</strong> Permet aux utilisateurs de se déconnecter de leur session actuelle. Accédez à la <a href="logout.php">déconnexion</a>.</li>
            <li><strong>Gestion des utilisateurs :</strong> Une fonctionnalité accessible par l'administrateur pour lister tous les utilisateurs enregistrés dans la base de données. Accédez à la <a href="affichage.php">gestion des utilisateurs</a>.</li>
        </ul>
    </div>
    <div class="container-i">
        <div class= "content-iframe"></div>
   
    <!-- <div style="width: 800px; height: 600px;"> <iframe width="600" height="400" src="http://www.example.com"></iframe> </div>  -->
        <iframe width="560" height="315" src="https://www.youtube.com/embed/PKbVJFaXZQA?si=udTVPvJmNmDDqsI6" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

        </div>
    </div>
    <div class="container">
        <div class="content">
            <h2>Explication du code</h2>
            </br>
        </div>
        <p>
            Ce projet est construit en PHP avec PDO pour interagir avec une base de données MySQL. Les principales classes utilisées incluent :
        </p>
        <ul>
            <li><strong>Connexion :</strong> Gère la connexion à la base de données en utilisant PDO.</li>
            <li><strong>Userspdo :</strong> Contient les méthodes pour l'inscription, la connexion, la déconnexion, et la gestion des utilisateurs.</li>
        </ul>
        <p>
            Vous pouvez naviguer dans les différentes pages à l'aide de la barre de navigation ci-dessus pour explorer chaque fonctionnalité en détail.
        </p></br>
        <h2>En savoir plus <a href="poo_explications.php">cliquez ici</a></h2>
        <p>Exemple exercice patisseries : <a href="poo_explications.php">cliquez ici</a></p>
    </div>




</body>

</html>