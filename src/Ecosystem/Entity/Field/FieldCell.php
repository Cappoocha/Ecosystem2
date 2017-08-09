<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 22:37
 */

namespace Ecosystem\Entity\Field;


use Ecosystem\Entity\EcosystemEntity;

class FieldCell
{
    /**
     * @var int
     */
    private $xPosition;

    /**
     * @var int
     */
    private $yPosition;

    /**
     * @var EcosystemEntity[]
     */
    private $ecosystemObjects = [];

    /**
     * FieldCell constructor.
     *
     * @param $xPosition
     * @param $yPosition
     */
    public function __construct($xPosition, $yPosition)
    {
        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
    }

    /**
     * @param EcosystemEntity $object
     */
    public function addObject(EcosystemEntity $object)
    {
        $this->ecosystemObjects[$object->getId()] = $object;
    }

    /**
     * @return int
     */
    public function getXPosition()
    {
        return $this->xPosition;
    }

    /**
     * @return int
     */
    public function getYPosition()
    {
        return $this->yPosition;
    }

    /**
     * @return EcosystemEntity[]
     */
    public function getEcosystemObjects()
    {
        return $this->ecosystemObjects;
    }
}