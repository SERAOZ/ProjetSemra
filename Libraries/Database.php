<?php
require_once 'config/config.php';

// La classe Database gère l'accès à la base de données via PDO.
class Database {
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $statement; // La requête préparée PDO.
    private $dbHandler; // Le gestionnaire de la base de données PDO.
    private $error; // Stocke les erreurs éventuelles.

    // Constructeur de la classe PDO, qui utilise les valeurs de config.php pour se connecter à la base de données.
    public function __construct() {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true, // Connexion persistante.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Générer des exceptions en cas d'erreur.
        );
        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage(); // En cas d'erreur, stocke le message d'erreur.
            echo $this->error; // Affiche l'erreur (à des fins de débogage, vous pouvez la gérer différemment en production).
        }
    }

    // Méthode générique pour préparer une requête SQL.
    public function query($sql) {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    // Méthode générique pour lier des paramètres à une requête préparée, en déterminant automatiquement le type de paramètre.
    public function bind($parameter, $value, $type = null) {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    // Exécute la requête préparée.
    public function execute() {
        return $this->statement->execute();
    }

    // Récupère le résultat de la requête sous forme de tableau d'objets.
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Récupère un seul résultat de la requête sous forme d'objet.
    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    // Compte le nombre de lignes affectées par la requête.
    public function rowCount() {
        return $this->statement->rowCount();
    }
}

