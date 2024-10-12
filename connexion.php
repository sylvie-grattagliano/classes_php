<?php
// Vérifier si la session n'est pas déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Connexion {
    protected $host = "localhost";
    protected $db_name = "classes";
    protected $username = "root";
    protected $password = "";
    protected $conn;

    public function __construct() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");

            // echo "Connecté à la DB<br>";
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage() . "<br>";
        }
    }

    // Méthode pour accéder à la connexion PDO avec boleenne 
   
    public function getConnection()
    {
        return $this->conn !== null;
    }

    /* La méthode retourne un booléen (true ou false).
    si $this->conn n'est pas null (connexion réussie), la méthode retourne true.
Si $this->conn est null (échec de la connexion), la méthode retourne false.*/

    
}
?>

