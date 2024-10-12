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

    //methodes

    // Constructeur
    public function __construct($login = null, $email = null, $firstname = null, $lastname = null)
    {
        parent::__construct();
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }
    // pour vérifier si un email existe déjà

    public function emailExist($email)
{
    $stmt = $this->conn->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    
    return $count > 0;  // Retourne true si l'email existe déjà
}

    // Méthode pour enregistrer un utilisateur:

    public function register($login, $password, $email, $firstname, $lastname)
    {
        // Vérifier si l'email existe déjà
        if ($this->emailExist($email)) {
            
            echo "<p >Cet email est déjà utilisé. Veuillez en utiliser un autre.</p>";
            return false; // l'email existe déjà
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
        echo "<p>Une erreur est survenue lors de l'enregistrement.</p>";
        return false;
    }
}

             
     //methode  recuperer tous les users

    public function getAllUsers()
    {

        // Préparer la requête SELECT et faire tableau
        $stmt = $this->conn->prepare("SELECT * FROM utilisateurs");
        $stmt->execute();
        // echo "Récupération des utilisateurs avec succès.";

        return $stmt->fetchAll();
        
    }
    public function getCurrentUser(){
        $userID = $_SESSION["userID"] ?? 0;
    
        //prépare requete 
        $stmt = $this->conn->prepare("SELECT `id`, `login`, `password`, `email`, `firstname`, `lastname` FROM `utilisateurs` WHERE id = :userID");
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
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


    public function update($login, $password, $email, $firstname, $lastname)
{
    // Hachage du mot de passe pour la sécurité
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $this->conn->prepare("UPDATE utilisateurs SET 
        login = :login, 
        password = :password, 
        email = :email, 
        firstname = :firstname, 
        lastname = :lastname 
        WHERE email = :current_email
    ");

    // Lier les paramètres à la requête
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    
    $stmt->bindParam(':current_email', $email); // Modifie cela si tu utilises une autre clé pour l'identification

    // Exécuter la requête
    if ($stmt->execute()) {
        // Mise à jour des attributs de l'objet
        $this->login = $login;
        $this->password = $hashedPassword; // Assure-toi que cela a du sens pour ton application
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        echo "Les informations ont été mises à jour avec succès.";
        return true;
    } else {
        echo "Erreur lors de la mise à jour.";
        return false;
    }
}


    public function delete($email)
    {
        // Préparer la requête pour supprimer l'utilisateur
        $stmt = $this->conn->prepare("DELETE FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(':email', $email);
    
        // Exécuter la requête et vérifier si elle a réussi
        if ($stmt->execute()) {
            echo "L'utilisateur avec l'email $email a été supprimé avec succès.<br>";
    
            // Déconnecter l'utilisateur après suppression
            $this->disconnect();
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }
    }


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
    
        echo "Utilisateur déconnecté avec succès.";
    }
    
     
}


    ?>
    
    
    
    

    






