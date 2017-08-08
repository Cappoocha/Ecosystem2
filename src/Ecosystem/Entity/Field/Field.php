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
     * Ограничение поля по координате X
     *
     * @var int
     */
    private $xLimit;

    /**
     * Ограничение поля по координате Y
     *
     * @var int
     */
    private $yLimit;

    /**
     * @var FieldCell[]
     */
    private $fieldCells = [];

    /**
     * Field constructor.
     *
     * @param int $xLimit
     * @param int $yLimit
     */
    public function __construct($xLimit, $yLimit)
    {
        $this->xLimit = $xLimit;
        $this->yLimit = $yLimit;

        for ($x = 0; $x < $this->xLimit; $x++) {
            for($y = 0; $y < $this->yLimit; $y++) {
                $this->fieldCells[$x][$y] = new FieldCell($x, $y);
            }
        }
    }

    public function getRandomX()
    {
        return rand(0, $this->xLimit - 1);
    }

    public function getRandomY()
    {
        return rand(0, $this->yLimit - 1);
    }

    /**
     * @param EcosystemEntity $object
     */
    public function addObject(EcosystemEntity $object)
    {
        $this->getFieldCell($object->getXPosition(), $object->getYPosition())->addObject($object);
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

}