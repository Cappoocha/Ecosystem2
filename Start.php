<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:28
 */

//include "Autoload.php";
use Ecosystem\Controller;
use Ecosystem\OutputService\Html;

require_once __DIR__.'/vendor/autoload.php';

//$mySqlRepository = new \Ecosystem\Repository\MySQL\MySQLRepository('localhost', 'root', 'root', 'ecosystem', 3360);
//$mySqlRepository->connect();
//$mySqlRepository->getAll();
//$mySqlRepository->disconnect();

//use Ecosystem\Controller;

$fieldSize = $_POST['fieldSize'];
$repeatedCount = $_POST['repeatedCount'];

$outputService = new Html();
$controller = new Controller($fieldSize);
$controller->createEcosystem($outputService, $repeatedCount);