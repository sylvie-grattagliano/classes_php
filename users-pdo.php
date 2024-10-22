<?php

require_once("connexion.php");



// Class Userspdo qui hérite de Connexion (class mère)

class Userspdo extends Connexion
{
    //attributs

    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
////////////////////////////////////////////////////////////////////////////////
    
//methodes

    // Constructeur
    public function __construct($login = null, $password = null, $email = null, $firstname = null, $lastname = null)
    {
        parent::__construct();
        $this->login = $login;
        $this->password=$password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }
////////////////////////////////////////////////////////////////////////////////    
    // pour vérifier si un email existe déjà

    public function emailExist($email)
{
    $stmt = $this->conn->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    return $count > 0;  // Retourne true si l'email existe déjà
}

////////////////////////////////////////////////////////////////////////////////////
    // Méthode pour inscription un utilisateur:
    public function register($login, $password, $confirm_password, $email, $firstname, $lastname)
{
        // Vérifier si l'email existe déjà
    if ($this->emailExist($email)) {
        echo "<p> Cet email est déjà utilisé. Veuillez en utiliser un autre.</p>";
        return false; // l'email existe déjà
    }
    //  Vérifier la longueur du mot de passe
    
    if (strlen($password) < 8) {
       echo "<p>Le mot de passe doit contenir au moins 8 caractères.</p>";
        return false; // Annuler l'inscription si la condition échoue
    }
    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        echo "<p>Les mots de passe ne correspondent pas.</p>";
        return false; // Annuler l'inscription si les mots de passe ne correspondent pas
    } 

        
    // Hachage du mot de passe pour la sécurité
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Préparer la requête d'insertion
    $stmt = $this->conn->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) 
                                  VALUES (:login, :password, :email, :firstname, :lastname)");

    // Liaison des paramètres
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "<p>Utilisateur enregistré avec succès.</p>";
        return true;
    } else {
        
        echo "Une erreur est survenue lors de l'enregistrement ";
        return false;
    }
}

/////////////////////////////////////////////////////////////////////////////////////            
     //methode  recuperer tous les users

    public function getAllUsers()
    {

        // Préparer la requête SELECT et faire tableau
        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs");
        $stmt->execute();
        // echo "Récupération des utilisateurs avec succès.";
        return $stmt->fetchAll();
        }
////////////////////////////////////////////////////////////////////////////////////
    //Methode recup user connecté verif session user connecté
    public function getCurrentUser(){
        $userID = $_SESSION["userID"] ?? 0;
    
        //prépare requete 
        $stmt = $this->conn->prepare("SELECT `id`, `login`, `password`, `email`, `firstname`, `lastname` FROM `utilisateurs` WHERE id = :userID");
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
 /////////////////////////////////////////////////////////////////////////////////////   
    // Méthode connexion avec login et le mdp:

    public function connect($email, $password)
    {
        // Préparer la requête pour récupérer l'utilisateur:

        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérif email et MDP:

        if ($user && password_verify($password, $user['password'])) {
            // Initialiser les attributs de la classe avec les valeurs récupérées
            $this->password = $user['password'];
            $this->email = $user['email'];

            $_SESSION["userID"] = $user['id'];

            return true; // Connexion réussie
        } else {
            echo "Erreur : email ou mot de passe incorrect.";
            return false;
        }
    }
//////////////////////////////////////////////////////////////////////////////////////////

public function update($login, $email, $firstname, $lastname, $password = null)
{
    // Hachage du mot de passe pour la sécurité si le mot de passe est fourni
    $hashedPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;
    // Préparation de la requête
    $stmt = $this->conn->prepare("UPDATE utilisateurs SET 
        login = :login, 
        email = :email, 
        firstname = :firstname, 
        lastname = :lastname" . 
        (!empty($hashedPassword) ? ", password = :password" : "") . 
        " WHERE id = :userID" // Utilisez une clé unique comme 'id' pour identifier l'utilisateur
    );

    // Lier les paramètres
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    
    if (!empty($hashedPassword)) {
        $stmt->bindParam(':password', $hashedPassword);
    }

    // Lier l'ID de l'utilisateur pour le WHERE DU DESSUS
    $userID = $_SESSION["userID"]; // Assurez-vous que l'utilisateur est connecté
    $stmt->bindParam(':userID', $userID);

    // Exécuter la requête
    if ($stmt->execute()) {
        echo "Les informations ont été mises à jour avec succès.";
        return true;
    } else {
        echo "Erreur lors de la mise à jour : " . implode(", ", $stmt->errorInfo());
        return false;
    }
}

/////////////////////////////////////////////////////////////////////////////////////////

    public function delete($userID)
    {
        // Préparer la requête pour supprimer l'utilisateur
        $stmt = $this->conn->prepare("DELETE FROM utilisateurs WHERE id = :id");
        $stmt->bindParam(':id', $userID);
    
        // Exécuter la requête et vérifier si elle a réussi
        if ($stmt->execute()) {
            echo "L'utilisateur avec l'id $userID a été supprimé avec succès.<br>";
    
            // Déconnecter l'utilisateur après suppression
            $this->disconnect();
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////
    public function disconnect()
    {
        // Réinitialiser les attributs de l'utilisateur
        $this->login = null;
        $this->email = null;
        $this->firstname = null;
        $this->lastname = null;
    
        // Démarrer la session si elle n'est pas déjà démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Supprimer toutes les variables de session
        //session_unset();
        // Détruire la session
        session_destroy();
    
        echo "Au revoir et à bientôt!";
    }
    
     
}


    ?>
    
    
    
    

    






