<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bienvenue</title>
</head>
<body>
    
</body>
</html>
<?php
require_once("Users-pdo.php");

// Créer une instance de la classe Userspdo
$testUser = new Userspdo();

// Tester la connexion en utilisant getConnection()
if ($testUser->getConnection()) {  // Vérifie si la connexion est réussie
    echo "Connexion à la base de données réussie.<br>";
} else {
    echo "Échec de la connexion à la base de données.<br>";
}

// Enregistrer un utilisateur
$testUser->register("ALICIA", "123", "sosylvie1@gmait.com", "Alicia", "Alicia");

echo "Utilisateur enregistré avec succès.";

$allUsers = $testUser->getAllUsers();

/*$testUser = new Userspdo();
$testUser->getConnection();
$testUser->register("tst3", 123, "ssylvie1@ae.com", "sylvieT3", "test3");*/

?>

<div id="section1">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>login</th>
                <th>email</th>
                <th>firstname</th>
                <th>lastname</th>
            
            </tr>

        </thead>

        <tbody>

            <!--boucle -->
            <?php foreach ($allUsers as $row) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["login"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["firstname"]; ?></td>
                    <td><?php echo $row["lastname"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </div>
</table>


