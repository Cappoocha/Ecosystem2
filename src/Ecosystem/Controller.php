<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 21:23
 */

namespace Ecosystem;

use Ecosystem\Entity\Field\Field;
use Ecosystem\OutputService\OutputServiceInterface;
use Ecosystem\Service\EntityFactory;
use Ecosystem\Service\MoveService;

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

    /**
     * @var MoveService
     */
    private $moveService;

    /**
     * @var Field
     */
    private $field;

    /**
     * Controller constructor.
     * @param $fieldSize
     */
    public function __construct($fieldSize)
    {
        $this->entityFactory = new EntityFactory();
        $this->moveService = new MoveService();

        $this->field = new Field($fieldSize);

        $plantsCount = rand(0, $fieldSize);
        $predatorCount = rand(0, $fieldSize);
        $hugePredatorCount = rand(0, $fieldSize);
        $herbivorousCount = rand(0, $fieldSize);
        $observerCount = rand(0, 3);

        echo "Create plants" . PHP_EOL;
        $this->createPlants($this->field, $plantsCount);

        echo "Create predators" . PHP_EOL;
        $this->createPredators($this->field, $predatorCount);

        echo "Create huge predators" . PHP_EOL;
        $this->createHugePredators($this->field, $hugePredatorCount);

        echo "Create herbivorous" . PHP_EOL;
        $this->createHerbivorous($this->field, $herbivorousCount);

        echo "Create observers" . PHP_EOL;
        $this->createObservers($this->field, $observerCount);

        echo PHP_EOL;
    }

    /**
     * Создаем экосистему
     * @param $watchDuration
     */
    public function createEcosystem(OutputServiceInterface $outputService, $watchDuration)
    {
        $outputService->displayField($this->field);

        for ($i = 0; $i < $watchDuration; $i++) {
            echo PHP_EOL;
            echo 'Move' . $i . PHP_EOL;
            echo PHP_EOL;
            $this->moveService->move($this->field);
            $outputService->displayField($this->field);
        }
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