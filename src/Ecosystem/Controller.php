<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 21:23
 */

namespace Ecosystem;

use Ecosystem\Entity\Field\Field;
use Ecosystem\Service\EntityFactory;

/**
 * Контроллер для управления экосистемой
 *
 * Class Controller
 *
 * @package Ecosystem
 */
class Controller
{
    /**
     * @var EntityFactory
     */
    private $entityFactory;

    public function __construct()
    {
        $this->entityFactory = new EntityFactory();
    }

    /**
     * Создаем экосистему
     *
     * @param int $xFieldLimit
     * @param int $yFieldLimit
     * @param int $watchDuration
     */
    public function createEcosystem($xFieldLimit, $yFieldLimit, $watchDuration)
    {
        echo "Create field" . PHP_EOL;
        $field = new Field($xFieldLimit, $yFieldLimit);

        $maxEntitiesCount = $xFieldLimit * $yFieldLimit;
        $plantsCount = rand(0, $maxEntitiesCount);
        $predatorCount = rand(0, $maxEntitiesCount);
        $hugePredatorCount = rand(0, $maxEntitiesCount);
        $herbivorousCount = rand(0, $maxEntitiesCount);
        $observerCount = rand(0, 3);

        echo "Create plants" . PHP_EOL;
        $this->createPlants($field, $plantsCount);

        echo "Create predators" . PHP_EOL;
        $this->createPredators($field, $predatorCount);
        $this->createHugePredators($field, $hugePredatorCount);
        $this->createHerbivorous($field, $herbivorousCount);
        $this->createObservers($field, $observerCount);

        var_dump($field->getFieldCells());
    }

    /**
     * @param Field $field
     * @param int $plantsCount
     */
    private function createPlants(Field $field, $plantsCount)
    {
        for ($i = 0; $i < $plantsCount; $i++) {
            $plant = $this->entityFactory->createPlant($field);
            $field->addObject($plant);
        }
    }

    private function createPredators(Field $field, $predatorsCount)
    {
        for ($i = 0; $i < $predatorsCount; $i++) {
            $predator = $this->entityFactory->createPredator($field);
            $field->addObject($predator);
        }
    }

    private function createHugePredators(Field $field, $hugePredatorsCount)
    {
        for ($i = 0; $i < $hugePredatorsCount; $i++) {
            $hugePredator = $this->entityFactory->createHugePredator($field);
            $field->addObject($hugePredator);
        }
    }

    private function createHerbivorous(Field $field, $herbivorousCount)
    {
        for ($i = 0; $i < $herbivorousCount; $i++) {
            $herbivorous = $this->entityFactory->createHerbivorous($field);
            $field->addObject($herbivorous);
        }
    }

    private function createObservers(Field $field, $observersCount)
    {
        for ($i = 0; $i < $observersCount; $i++) {
            $observer = $this->entityFactory->createObserver($field);
            $field->addObject($observer);
        }
    }
}