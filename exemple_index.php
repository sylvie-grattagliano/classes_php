<?php
require_once ('Eclairs.php');
require_once ('Religieuse.php');

$patisserie1 = new Patisserie(100,2,100);
$patisserie1->presentation();
$patisserie1->setPoids(2000);
$patisserie1->setPrix(1900);
$patisserie1->setNote(4);

echo "<br/><strong>Religieuse</strong></strong><br/>";
$religieuse1 = new Religieuse(200,2,50, "fraise","chocolat",false);
$religieuse1->afficherReligieuse();
$religieuse1->modifierPremiereBoule('fraise');
$religieuse1->modifierDeuxiemeBoule(3);
$religieuse1->setChantilly(false);

//$religieuse1 = new Religieuse(100, 5,2,
//    'fraise', 'chocolat',
//    false);
//$religieuse1->afficherReligieuse();

echo "<br/><strong>Eclair</strong></strong><br/>";

$eclair1 = new Eclairs(189,4, 30,'chocolat',
    'cafe', 13);
$eclair1->afficherEclair();
$eclair1->changerGlacage('citron');
$eclair1->changerCreme('chocolat');