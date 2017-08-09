<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 09.08.2017
 * Time: 23:21
 */

namespace Ecosystem\Service;

use Ecosystem\Entity\Animal;
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
    public function move(Field $field)
    {
        $fieldSize = $field->getSize();
        $fieldCells = $field->getFieldCells();

        for ($x = 0; $x < $fieldSize; $x ++) {
            for ($y = 0; $y < $fieldSize; $y ++) {
                $fieldCell = $fieldCells[$x][$y];

                if ($fieldCell instanceof FieldCell) {
                    foreach ($fieldCell->getEcosystemObjects() as $object) {
                        $this->chooseMovement($object);
                    }
                }
            }
        }
    }

    private function chooseMovement($object)
    {
        switch (true) {
            case ($object instanceof Animal) :
                $this->animalMove($object);
                break;
            case ($object instanceof Observer) :
                $this->observerMove($object);
                break;
        }
    }

    public function animalMove(Animal $animal)
    {

    }

    public function observerMove(Observer $observer)
    {

    }
}