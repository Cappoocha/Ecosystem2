<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 21:10
 */

namespace Ecosystem\Entity\Field;

use Ecosystem\Entity\EcosystemEntity;

/**
 * Поле, на котором существует экосистема
 *
 * Class Field
 *
 * @package Ecosystem\Entity
 */
class Field
{
    /**
     * Размер поля
     *
     * @var int
     */
    private $size;

    /**
     * @var FieldCell[]
     */
    private $fieldCells = [];

    /**
     * Field constructor.
     *
     * @param int $size
     *
     */
    public function __construct($size)
    {
        $this->size = $size;

        for ($x = 0; $x < $this->size; $x++) {
            for($y = 0; $y < $this->size; $y++) {
                $this->fieldCells[$x][$y] = new FieldCell($x, $y);
            }
        }
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param EcosystemEntity $object
     */
    public function addObject(EcosystemEntity $object)
    {
        $fieldCell = $this->getFieldCell($object->getXPosition(), $object->getYPosition());
        $fieldCell->addObject($object);
    }

    public function deleteObject(EcosystemEntity $object)
    {
        $fieldCell = $this->getFieldCell($object->getXPosition(), $object->getYPosition());
        $fieldCell->deleteObject($object);
    }

    /**
     * @param $x
     * @param $y
     * @return FieldCell
     */
    private function getFieldCell($x, $y)
    {
        return $this->fieldCells[$x][$y];
    }

    /**
     * @return FieldCell[]
     */
    public function getFieldCells()
    {
        return $this->fieldCells;
    }

    /**
     * @return int
     */
    public function createCoordinate()
    {
        return rand(0, $this->size - 1);
    }

    public function displayObjects()
    {
        foreach ($this->fieldCells as $fieldCell) {
            /** @var FieldCell $object */
            foreach ($fieldCell as $object) {
                echo 'Coordinates: ' . $object->getXPosition() . ':' . $object->getYPosition() . ' ' . PHP_EOL;

                $ecosystemObjects = $object->getEcosystemObjects();
                if (count($ecosystemObjects) > 0) {
                    foreach ($ecosystemObjects as $ecosystemEntity) {
                        echo $ecosystemEntity->getName() . $ecosystemEntity->getId() . ' ';
                    }
                } else {
                    echo '----';
                }
                echo PHP_EOL;
            }
        }
    }
}