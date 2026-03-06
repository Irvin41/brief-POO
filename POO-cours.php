<?php

/* Classe Voiture
représente une voiture avec ses caractéristiques
( Marque Modèle années et état )*/
class Voiture
{

    /* Propriétés privées - encapsulation
    Ces propriétés ne sont accessible que
    depuis l'intérieur de la classe Voiture */

    private $marque;
    private $modele;
    private $annee;
    private $etat; // par défaut, une voiture peut être en panne

    /* Constructeur
    Méthode magique qui est appellée automatiquement
    quand on instancie une nouvelle voiture */

    /* $this désigne l'instance en cours
    il permet d'accéder aux propriétés et aux MÉTHODES de l'objet en cours */

    public function __construct($marque, $modele, $annee, $etat = "en panne")
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->etat = $etat;
    }


    /* Les GETTERS
    ils permettent de lire les propriétés même en dehors de la classe */

    // Getter pour la marque
    public function getMarque()
    {
        return $this->marque;
    }

    // Getter pour le modèle
    public function getModele()
    {
        return $this->modele;
    }

    // Getter pour l'année'
    public function getAnnee()
    {
        return $this->annee;
    }

    // Getter pour l'état
    public function getEtat()
    {
        return $this->etat;
    }

    /*Les SETTERS
    Méthodes publiques qui permettent de modifier
    une propriété privée.
    Il est possible d'y ajouter une validation. */

    public function setEtat($nouvelEtat)
    {
        $this->etat = $nouvelEtat;
    }

    // Méthode qui permettra d'afficher toute les caractéristiques de la voiture
    public function afficherDetails()
    {
        echo "Voiture : " . $this->marque . "
        " . $this->modele . " (" . $this->annee . ") - " . $this->etat;
    }
}
    /* Class mécanicien
    représente un mécanicien qui peut réparer une voiture*/

Class Mecanicien{
        // Propriété privée : nom
        private $nom;

        public function __construct($nom)
        {
            $this->nom = $nom;
        }
    public function getNom()
    {
        return"$this->nom";
    }

    /* Méthode avec le type Hinting
    type Hinting : permet de préciser le type attendu d'un paramètre
    si le type n'est pas bon, c'est une erreur
    C'est une fonction qui appelle le SETTER de voiture */


    public function reparerVoiture(Voiture $voiture)
    {
        echo"Le mécanicien " . $this->nom. " répare la voiture. <br>";
        $voiture->setEtat("réparée");
    }
}

// Exemples
// Création d'une voiture (en panne )

$maVoiture = new Voiture("Peugeot","208","2024");
// afficher la marque de ma voiture
echo ($maVoiture->getMarque());
echo "<br>";


// Réparer ma voiture
/* $maVoiture->setEtat("Réparée");
echo ($maVoiture->getEtat());
echo "<br><br>"; */


// Afficher les détails de ma voiture
$maVoiture->afficherDetails();
echo "<br><br>";


// Création d'une mécanicien
$monMecano = new Mecanicien("Olivier de Carglass");
    echo($monMecano->getNom());
    echo "<br><br>";


//Le mécanicien répare ma voiture
$monMecano->reparerVoiture($maVoiture);
$maVoiture->afficherDetails();

