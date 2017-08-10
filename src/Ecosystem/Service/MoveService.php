<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 09.08.2017
 * Time: 23:21
 */

namespace Ecosystem\Service;

use Ecosystem\Entity\Animal;
use Ecosystem\Entity\EcosystemEntity;
use Ecosystem\Entity\Field\Field;
use Ecosystem\Entity\Field\FieldCell;
use Ecosystem\Entity\Observer;

/**
 * Сервис движения животных
 *
 * Class MoveService
 *
 * @package Ecosystem\Service
 */
class MoveService
{
    /**
     * @param Field $field
     */
    public function move(Field $field)
    {
        $fieldSize = $field->getSize();
        $fieldCells = $field->getFieldCells();

        for ($x = 0; $x < $fieldSize; $x ++) {
            for ($y = 0; $y < $fieldSize; $y ++) {
                $fieldCell = $fieldCells[$x][$y];

                if ($fieldCell instanceof FieldCell) {
                    foreach ($fieldCell->getEcosystemObjects() as $object) {
                        $field->deleteObject($object);
                        $this->chooseMovement($object, $field);
                        $field->addObject($object);
                    }
                }
            }
        }
    }

    /**
     * Выбираем движение
     *
     * @param EcosystemEntity $object
     * @param Field $field
     */
    private function chooseMovement(EcosystemEntity $object, Field $field)
    {
        $move = false;
        switch (true) {
            case ($object instanceof Animal) :
                while ($move) {
                    $move = $this->animalMove($object, $field->getSize());
                }
                break;
            case ($object instanceof Observer) :
                $this->observerMove($object, $field);
                break;
        }
    }

    /**
     * Движение животного
     *
     * @param Animal $animal
     * @param $fieldSize
     *
     * @return bool
     */
    public function animalMove(Animal $animal, $fieldSize) : boolean
    {
        $animalPositionX = $animal->getXPosition();
        $animalPositionY = $animal->getYPosition();
        $moveVector = rand(0, 3);

        switch ($moveVector) {
            case 0:
                // двигаемся по оси X вправо
                if ($animalPositionX < $fieldSize) {
                    $animal->setXPosition($animalPositionX + 1);
                    return true;
                }
                return false;
            case 1:
                // двигаемся по оси X влево
                if ($animalPositionX > 0) {
                    $animal->setXPosition($animalPositionX - 1);
                    return true;
                }
                return false;
            case 2:
                // двигаемся по оси Y вверх
                if ($animalPositionY < $fieldSize) {
                    $animal->setYPosition($animalPositionY + 1);
                    return true;
                }
                return false;
            case 3:
                // двигаемся по оси Y вниз
                if ($animalPositionY > 0) {
                    $animal->setYPosition($animalPositionY - 1);
                    return true;
                }
                return false;
            default:
                return false;
        }
    }

    /**
     * @param Observer $observer
     * @param Field $field
     */
    public function observerMove(Observer $observer, Field $field)
    {
        $observer->setXPosition($field->createCoordinate());
        $observer->setYPosition($field->createCoordinate());
    }
}