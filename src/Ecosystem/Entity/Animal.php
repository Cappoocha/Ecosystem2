<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:32
 */

namespace Ecosystem\Entity;

/**
 * Сущность животные
 *
 * Class Animal
 *
 * @package Ecosystem\Entity
 */
abstract class Animal extends EcosystemEntity
{
    /**
     * Сила
     *
     * @var int
     */
    private $strength;

    /**
     * @return int
     */
    abstract function getStrengthMin();

    /**
     * @return int
     */
    abstract function getStrengthMax();

    /**
     * Animal constructor.
     *
     * @param int $xPosition
     * @param int $yPosition
     * @param string $name
     * @param null $strength
     */
    public function __construct($xPosition, $yPosition, $name, $strength = null)
    {
        parent::__construct($xPosition, $yPosition, $name);
        $this->strength = ($strength === null) ? $this->generateStrength() : $strength;
    }

    /**
     * Генерируем силу животного случайным образом в его диапазоне
     *
     * @return int
     */
    private function generateStrength()
    {
        return rand($this->getStrengthMin(), $this->getStrengthMax());
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }
}