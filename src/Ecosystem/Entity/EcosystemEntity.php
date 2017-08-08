<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:53
 */

namespace Ecosystem\Entity;

/**
 * Любая сущность экосистемы
 *
 * Class EcosystemEntity
 *
 * @package Ecosystem\Entity
 */
class EcosystemEntity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $xPosition;

    /**
     * @var int
     */
    private $yPosition;

    /**
     * EcosystemEntity constructor.
     *
     * @param int $xPosition
     * @param int $yPosition
     * @param string $name
     */
    public function __construct($xPosition, $yPosition, $name)
    {
        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
}