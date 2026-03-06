<?php
require 'Database.php';

class Auteur
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = database::getInstance()->getConnexion();
    }

    // Lister tous les auteurs
    public function getAuteur() {
        $stmt = $this->pdo->query("SELECT * FROM auteur");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer l'auteur par son id
    public function getAuteurById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM auteur WHERE id_auteur = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ajouter un auteur
    public function ajouterAuteur($nom, $prenom, $date_naissance) {
        $stmt = $this->pdo->prepare('INSERT INTO auteur (nom, prenom, date_naissance) VALUES (:nom, :prenom, :date_naissance)');
        $stmt->execute([
            ':nom'=> $nom,
            ':prenom' => $prenom,
            ':date_naissance' => $date_naissance
        ]);
    }

    // Modifier un auteur
    public function modifierAuteur($id, $nom, $prenom, $date_naissance) {
        $stmt = $this->pdo->prepare("UPDATE auteur SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance WHERE id_auteur = :id");
        $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':date_naissance' => $date_naissance
        ]);
    }

    //  Supprimer un auteur
    public function supprimerAuteur($id) {
        $stmt = $this->pdo->prepare('DELETE FROM auteur WHERE id_auteur = ?');
        $stmt->execute([$id]);
    }
}