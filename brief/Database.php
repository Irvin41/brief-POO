<?php

/* CLasse Database
pour se connecter à la BDD
Simplification de l'utilisation de PDO
il permet de bien gérer les ressources ( Pattern sigleton )
*/
class Database
{
    // propriété privée : instance unique de la connexion à la BDD
    private static $instance =null;

    // Propriété privée pour PDO
    private $pdo;

    // constructeur privé ( il ne sera appelé qu'une seule fois )

    private function __construct()
    {
        //Informations de connexion à la BDD
        $host = "localhost";
        $dbname = "bibliotheque";
        $user = "root";
        $pass = "root";

        try{
            // création d'une instance PDO ( Php Data Object )
            $this->pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user,$pass);
            // configuration de PDO en cas d'exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch(PDOException $e){
            // en cas d'erreur
            die("erreur de connexion : " .$e->getMessage());
        }
    }

    public static function getInstance(){
        if(self::$instance === null ){
            self::$instance = new Database;
        }
        return self::$instance;
    }
    public function getConnexion(){
        /*Retourne l'objet PDO dans le but de pouvoir faire des requête*/
        return $this->pdo;
    }
}

//Exemple pour appeler cette classe
// $pdo =  database::getInstance()->getConnexion();