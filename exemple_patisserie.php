<?php

class Patisserie
{
 protected $poids;
 protected $note;
 protected $prix;

 public function __construct($poids, $note, $prix) {
        // On utilise les setters (setPoids, setNote, ...) pour sécuriser la valeur de nos attributs
        $this->setPoids($poids);
        $this->setNote($note);
        $this->setPrix($prix);
 }

 public function presentation() {
     echo "<br/><strong>Presentation de la patisserie</strong> <br/>";
     echo 'le poids est' . $this->poids .'g<br/>';
     echo "la note est $this->note étoiles<br/>";
     echo "le prix est $this->prix €<br/>";
 }

 public function setPoids($poids) {
     echo "<br/><strong>Fonction setpoids patisserie</strong> <br/>";

    // On vérifie que le poids est numérique (Int, float, ...) et compris entre 10g et 1000g inclus
     if (is_numeric($poids) && $poids >= 10 && $poids <= 1000)  {
         $this->poids = $poids;
     }
 }

 public function setPrix($prix) {
     echo "<br/><strong>Fonction setprix patisserie</strong> <br/>";

     if (is_numeric($prix) && $prix >= 0 && $prix <= 1000)  {
         $this->prix = $prix;
     }
 }

 public function setNote($note) {

     echo "<br/><strong>Fonction setnote patisserie</strong> <br/>";

     if (is_numeric($note) && $note >= 0 && $note <= 5)  {
         $this->note = $note;
     }
 }

}