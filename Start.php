<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:28
 */

include "Autoload.php";

use Ecosystem\Controller;

if (count($argv) < 4) {
    echo 'Enter the coordinates and watch duration';
    return;
}

$xFieldLimit = $argv[1];
$yFieldLimit = $argv[2];
$watchDuration = $argv[3];

echo "Create ecosystem" . PHP_EOL;

$controller = new Controller();
$controller->createEcosystem($xFieldLimit, $yFieldLimit, $watchDuration);

echo "Finish";