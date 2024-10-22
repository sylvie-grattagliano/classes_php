<?php require_once("navbar.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-poo.css">
    <title>Accueil - Exercice PHP avec PDO</title>
</head>

<body>
    <div class="container">
        <h1>Introduction à la Programmation Orientée Objet (POO)</h1>
        </br>
        <div class="content">
            <p>organiser le code en objets. Ces objets sont des instances de classes,
                qui regroupent des données (attributs) et des comportements (méthodes).
                Cela permet de structurer le code de manière plus claire et réutilisable.</p>
        </div>
        <div class="content">
            <p>Concepts clés de la POO :</p>
            <p><strong>1-Classe :</strong></p>

            <p>
                Une classe est un modèle qui définit les attributs et méthodes d'un objet. C'est une sorte de plan pour créer des objets.
                Exemple en PHP :</p>
            <div class="code">
            <p> Exemple:</p>
            </ul>
            <li>class Voiture {</li>
            <li>public $marque;</li>
            <li>public $couleur;</li>
            <li>public function demarrer() {</li>
            <li>echo "La voiture démarre.";</li>
            <li>}</li>
        <li>}</li>
            </ul>
        </div>
        </p>
        <P>Ici, Voiture est une classe avec deux attributs $marque et $couleur, et une méthode demarrer.</P><br />
        <p><strong>2-Objet :</strong></p><br />
        <p>Un objet est une instance d'une classe. Vous pouvez en créer autant que vous voulez à partir d'une classe.
        </p>
        <p>Exemple:</p><br />
        <div class="code">
            <ul>
                <li>$maVoiture = new Voiture(); // Création d'un objet Voiture</li>
                <li>$maVoiture->marque = "Toyota";</li>
                <li>$maVoiture->couleur = "Rouge";</li>
                <li>$maVoiture->demarrer(); // Appel de la méthode demarrer</li>
            </ul>
        </div>
        <p>Ici, $maVoiture est un objet de la classe Voiture.</p>
        <p><strong>3-Encapsulation :</strong></p><br />
        <p>L'encapsulation consiste à protéger les données de <b>l'objet</b>
        en contrôlant leur accès avec des modificateurs de visibilité (public, private, protected).</p>

        <p>Exemple :</p>
        <div class="code">
        <ul>
            
                <li>class Voiture {</li>
                    <li>private $marque;</li>

                    <li>public function setMarque($marque) {</li>
                        <li>$this->marque = $marque;</li>
                        <li>}</li>

                        <li>public function getMarque() {</li>
                            <li>return $this->marque;</li>
                            <li>}</li>
                            <li>}</li>

            </ul>
        </div>
        <P>Ici, l'attribut $marque est privé et ne peut être <b>modifié qu'avec la méthode setMarque.</b></P><br/>
        <p><strong>4-Héritage :</strong></p><br />
        <p>L'héritage permet de créer une nouvelle classe en se basant sur une classe existante. 
        La nouvelle classe (classe enfant) hérite des attributs et méthodes de la classe parente.</p>
        <p>Exemple :</p>
        <div class="code">
            <ul>
                <li></li>
                <li>class VoitureSport extends Voiture {</li>
                    <li>public function accelerer() {</li>
                        <li>echo "La voiture accélère !";</li>
                        <li>}</li>
                        <li>}</li>

            </ul>
        </div>
        <p>VoitureSport hérite de Voiture et ajoute une méthode accelerer.</p>

        <p><strong>5-Polymorphisme : :</strong></p><br />
                <p>Le polymorphisme permet d'utiliser une même méthode avec différents objets, 
        chaque objet pouvant avoir son propre comportement</p>
        <p>Exemple :</p>
        <div class="code">
         <ul> <li></li>
                    <li><b>class  Animal {</b></li>
                    <li>public function parler() {</li>
                        <li>echo "L'animal fait un bruit.";</li>
                        <li>}</li>
                <li>}</li>
                   
                    
                        <li><b>class Chien extends Animal {</b></li>
                            <li>public function parler() {</li>
                                <li>echo "Le chien aboie.";</li>
                                <li>}</li>
                                <li>}</li>

                                <li><b>class Chat extends Animal {</b></li>
                                    <li>public function parler() {</li>
                                        <li>echo "Le chat miaule.";</li>
                                        <li>}</li>
                                        <li>}</li>
                                        </ul>
<P></P>$monChien = new Chien();</P>
<p></p>$monChat = new Chat();</P>

<p>$monChien->parler();  // Le chien aboie.</P>
<p>$monChat->parler();   // Le chat miaule.</P>
            
        </div>
        <p>Le mot-clé __construct en programmation orientée objet (POO) est une méthode spéciale appelée automatiquement lorsqu'un objet d'une classe est créé. C'est un "constructeur", il sert souvent à initialiser les propriétés d'un objet.

<p>Voici un exemple simple avec une classe représentant des animaux :</p>

<div class="code">
        <ul>
            <li></li>
            <li>
            <li>class Animal {</li>
                <li>protected $nom;</li>
                <li>protected $espece;</li>
                <li>protected $age;</li>

                <li><b>// Constructeur : appelé quand un objet est créé</b></li>
                <li>public function __construct($nom, $espece, $age) {</li>
                    <li>$this->nom = $nom;</li>
                    <li>$this->espece = $espece;</li>
                    <li>$this->age = $age;</li>
                    <li>}</li>

                    <li>// Méthode pour afficher les informations de l'animal</li>
                    <li>public function afficherInfos() {</li>
                        <li> echo "Nom : " . $this->nom . "<br>";</li>
                        <li> echo "Espèce : " . $this->espece . "<br>";</li>
                        <li> echo "Âge : " . $this->age . " ans<br>";</li>
                        <li>}</li>
                        <li>}</li>

                        <li>// Création de nouveaux objets Animal</li>
                        <li>$chien = new Animal("Rex", "Chien", 5);</li>
                        <li>$chat = new Animal("Mia", "Chat", 3);</li>

                        <li>// Appel de la méthode afficherInfos pour chaque animal</li>
                        <li>$chien->afficherInfos();</li>
                        <li>echo "<br>";</li>
                        <li>$chat->afficherInfos();</li>
            
            </ul>
            </div>
            <p>Explication </p>
<p>La méthode __construct est utilisée ici pour initialiser les propriétés (nom, espece, et age) d'un objet lorsque celui-ci est créé.
Quand on crée un nouvel objet avec new Animal("Rex", "Chien", 5), la méthode __construct est automatiquement appelée avec les valeurs fournies.
La méthode afficherInfos permet d'afficher les informations de chaque animal.</p>

<p>our utiliser un __construct avec une classe mère et une classe fille (héritage), l'idée est que la classe fille hérite des propriétés et méthodes de la classe mère. Si la classe fille a besoin de définir ses propres propriétés,</p>
<p>elle peut étendre le constructeur de la classe mère <b>tout en y ajoutant des fonctionnalités spécifiques.</b></p>
<p>Voici un exemple avec des classes représentant des animaux 
    <b>(Animal comme classe mère)</b> et une classe fille pour les oiseaux (Oiseau).</p>
      
    <div class="code">
        
         <ul>     
            <li><b>// Classe mère Animal</li></b>
            <li>class Animal {</li>
                <li>public $nom;</li>
                <li>public $espece;</li>

                <li><b> // Constructeur de la classe mère</li></b>
                <li>public function __construct($nom, $espece) {</li>
                    <li>$this->nom = $nom;</li>
                    <li>$this->espece = $espece;</li>
                    <li>}</li>

                    <li><b>// Méthode pour afficher les informations de l'animal</li></b>
                    <li>public function afficherInfos() {</li>
                        <li>echo "Nom : " . $this->nom . "<br>";</li>
                        <li>echo "Espèce : " . $this->espece . "<br>";</li>
                        <li>}</li>
                        <li>}</li>

                        <li><b>// Classe fille Oiseau qui hérite de la classe Animal</li></b>
                        <li>class Oiseau <b>extends Animal</b> {</li>
                            <li>public $couleurPlumes;</li></br>

                            <li><b>// Constructeur de la classe fille</li></b><br>
                            <li>public function __construct($nom, $espece, $couleurPlumes) {</li>
                                <li><b>// Appel du constructeur de la classe mère</li></b>
                                <li><b>parent::__construct($nom, $espece);</li></b></br>
                                <li>// Ajout d'une propriété spécifique à Oiseau</li>
                                <li>$this->couleurPlumes = $couleurPlumes;</li>
                                <li>}</li>

                                <li><b>// Méthode pour afficher les informations spécifiques à Oiseau</li></b>
                                <li>public function afficherInfosOiseau() {</li>
                                    <li>// Appel de la méthode afficherInfos de la classe mère</li>
                                    <li>parent::afficherInfos();</li>
                                    <li>echo "Couleur des plumes : " . $this->couleurPlumes . "<br>";</li>
                                    <li> }</li>
                                    <li>}</li>

                                    <li><b>// Création d'un objet Oiseau</li></b>
                                    <li>$perroquet = new Oiseau("Coco", "Perroquet", "Vert");</li>

                                    <li>// Appel de la méthode pour afficher les informations du perroquet</li>
                                    <li>$perroquet->afficherInfosOiseau(); </li>
                                    
                                </ul>
                      
        </div>
        </br>
        <p>Explication :</p>

<p><b>Classe mère </b>: Animal contient le constructeur pour initialiser les propriétés nom et espece, ainsi qu'une méthode afficherInfos() pour afficher ces informations.</p>

<p><b>Classe fille </b>: Oiseau hérite de Animal. Son constructeur utilise parent::__construct($nom, $espece) pour appeler le constructeur de la classe mère, ce qui permet de réutiliser l'initialisation de nom et espece. Ensuite, il ajoute une propriété spécifique à Oiseau, à savoir couleurPlumes.</p>

<p><b>Méthode afficherInfosOiseau</b> : Cette méthode appelle parent::afficherInfos() pour afficher les informations de base (nom et espece) et complète avec l'affichage de la propriété spécifique couleurPlumes.</p>

    </div><br>

    <h2>Exemple concret exercice Patisseries </h2>
<p>Vous pouvez naviguer dans les différentes pages à l'aide des liens ci-dessous.</p>

<nav>
    <ul>
        <li><a href="exemple_patisserie.php">patisseries</a></li>
        <li><a href="exemple_eclairs.php">eclair</a></li>
        <li><a href="exemple_religieuse.php">religieuse</a></li>
        <li> <a href ="exemple_index.php"> index</a></li>
    </ul>
</nav>

<div id="page1">
    <?php include 'exemple_patisserie.php'; ?>
</div>

<div id="page2">
    <?php include 'exemple_eclairs.php'; ?>
</div>

<div id="page3">
    <?php include 'exemple_religieuse.php'; ?>
</div>
<div id="page4">
    <?php include 'exemple_index.php'; ?>
                                </div>
