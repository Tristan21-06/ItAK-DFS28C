<?php

namespace App\JDR;

require __DIR__ . '/Autoloader.php';
Autoloader::register();

use App\JDR\Class\GameMaster;
use App\JDR\Class\Logger;
use InvalidArgumentException;

$argv = [
    ...array_filter($argv, function ($el) {
        return is_numeric($el);
    })
];

if (!count($argv) == 4) {
    Logger::log("Paramètres manquants, utilisation des valeurs par défaut");
    Logger::log("Utilisation avec les taux: php main.php <success_rate> <crit_rate> <fumble_rate>");
    
    $argv = [
        40,
        15,
        5,
    ];
}

$successRate = $argv[0];
$critRate = $argv[1];
$fumbleRate = $argv[2];

try {
    $gm = new GameMaster($successRate, $critRate, $fumbleRate);

    $result = $gm->pleaseGiveMeACrit();
    echo "Résultat : " . $result->getType();
} catch (InvalidArgumentException $th) {
    echo $th->getMessage();
}
