<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:28
 */

include "Autoload.php";

use Ecosystem\Controller;

if (count($argv) < 3) {
    echo 'Enter the coordinates and watch duration';
    return;
}

$fieldSize = $argv[1];
$watchDuration = $argv[2];

echo "Create ecosystem" . PHP_EOL;

$controller = new Controller($fieldSize);
$controller->createEcosystem($watchDuration);

echo "Finish";