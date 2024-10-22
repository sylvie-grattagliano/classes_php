<?php
require_once('Patisserie.php');

// Extends permet de créer une classe qui hérite de Patisserie
class Eclairs extends Patisserie
{
    private $saveurCreme;
    private $saveurGlacage;
    private $longueur;

    public function __construct($poids, $note, $prix, $saveurCreme, $saveurGlacage, $longueur)
    {
        // On initialise les nouveaux attributs avec les settersd (setCreme, ...)
        $this->saveurCreme = $saveurCreme;
        $this->saveurGlacage = $saveurGlacage;
        $this->longueur = $longueur;

        // Puis on initialise les attributs parents avec le constructeur parent
        parent::__construct($poids, $note, $prix);
    }

    public function afficherEclair()
    {
        // On affiche ici les attributs propres aux éclairs...
        echo "<br/><strong>Fonction afficher Eclairs</strong> <br/>";
        echo "la saveur creme est $this->saveurCreme <br/>";
        echo "la saveur glaçage est  $this->saveurGlacage <br/>";
        echo "la longueur est $this->longueur cm <br/>";

        // Puis on appelle l'affichage du parent, qui affiche les attributs du parent
        parent::presentation();
    }

    public function changerGlacage($nouveauGlaçage)
    {
        echo "<br/><strong>Fonction changer glaçage</strong> <br/>";
        $listeGlacage = ['vanille', 'chocolat', 'fraise', 'café' ];

        if (in_array($nouveauGlaçage, $listeGlacage)) {
            $this->saveurGlacage = $nouveauGlaçage;
            echo "La nouvelle saveur du glacage est $nouveauGlaçage<br/>";
        } else {
            echo "La saveur $nouveauGlaçage n'est pas disponible <br/>";
        }

    }

    public function changerCreme($nouvelleCreme)
    {
        echo "<br/><strong>Fonction changer creme</strong> <br/>";
        $listeCreme = ['vanille', 'chocolat', 'fraise', 'café' ];

        if(in_array($nouvelleCreme, $listeCreme)){
            $this->saveurCreme = $nouvelleCreme;
            echo "<br/>La nouvelle saveur du glacage est $nouvelleCreme";
        } else {
            echo "Cette saveur $nouvelleCreme n'est pas disponible";
        }
    }
}