<?php

require_once('Patisserie.php');

class Religieuse extends Patisserie
{
    // Les attributs sont private ou protected, mais jamais publiques
    private $saveurPremierBoule;
    private $saveurDeuxiemeBoule;
    private $supplementChantilly;

    public function __construct($poids, $note, $prix, $saveurPremierBoule, $saveurDeuxiemeBoule, $supplementChantilly)
    {
        // On initialise les nouveaux attributs avec les setters...
        $this->modifierPremiereBoule($saveurPremierBoule);
        $this->modifierDeuxiemeBoule($saveurDeuxiemeBoule);
        $this->setChantilly($supplementChantilly);

        // ... et les anciens avec le constructeur parent
        parent::__construct($poids, $note, $prix);
    }

    public function afficherReligieuse()
    {
        echo "<br/><strong>Fonction afficher religieuse</strong> <br/>";
        // On appelle la présentation parent, qui affiche les attributs parents...
        parent::presentation();

        // ... Puis on affiche les nouveaux attributs
        echo "La saveur première boule  est $this->saveurPremierBoule<br/>";
        echo "La saveur deuxième boule est  $this->saveurDeuxiemeBoule<br/>";
        echo ($this->supplementChantilly ? "Avec supplement chantilly"  : "Sans supplément chantilly <br/>");
    }

    public function modifierPremiereBoule($nouvellePremiereBoule)
    {
        echo "<br/><strong>Modifier la premiere boule</strong><br/>";
        $listeParfum = ['vanille', 'chocolat', 'fraise', 'café'];
        
        if (in_array($nouvellePremiereBoule, $listeParfum)) {
            echo "La nouvelle saveur du glacage est $nouvellePremiereBoule, l'ancienne était $this->saveurPremierBoule .<br/>";
            $this->saveurPremierBoule = $nouvellePremiereBoule;
        } else if ($nouvellePremiereBoule === $this->saveurPremierBoule) {
            echo "Veuillez choisir un parfum différent du parfum actuel $this->saveurPremierBoule<br/>";
        } else {
            echo "Cette saveur $nouvellePremiereBoule n'est pas disponible<br/>";
        }
    }

    public function modifierDeuxiemeBoule($nouvelleDeuxiemeBoule)
    {
        echo "<br/><strong>Modifier la deuxième boule</strong>";
        $listeParfum = ['vanille', 'chocolat', 'fraise', 'café'];
        
        if (in_array($nouvelleDeuxiemeBoule, $listeParfum) ) {
            echo "<br/>La nouvelle saveur de la deuxième boule est $nouvelleDeuxiemeBoule,
                l'ancienne était  $this->saveurDeuxiemeBoule <br/>";
            $this->saveurDeuxiemeBoule = $nouvelleDeuxiemeBoule;
        } else if ($nouvelleDeuxiemeBoule === $this->saveurDeuxiemeBoule) {
            echo "Veuillez choisir un parfum différent du parfum actuel $this->saveurDeuxiemeBoule<br/>";
        } else {
            echo "<br/>La saveur $nouvelleDeuxiemeBoule n'est pas disponible<br/>";
        }
    }

    public function setChantilly($supplementChantilly)
    {
        echo "<br/><strong>Modifier la chantilly</strong> <br/>";

        // boolval permet de forcer le type à bool
        $this->supplementChantilly = boolval($supplementChantilly);

        echo "la chantilly a été modifié à : " . ($supplementChantilly ? " avec chantilly " : " sans chantilly") . " <br/>";
    }
}