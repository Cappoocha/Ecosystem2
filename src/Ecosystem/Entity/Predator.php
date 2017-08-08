<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:33
 */

namespace Ecosystem\Entity;

/**
 * Хищник
 *
 * Class Predator
 *
 * @package Ecosystem\Entity
 */
class Predator extends Animal
{
    /**
     * @return int
     */
    function getStrengthMin()
    {
        return 100;
    }

    /**
     * @return int
     */
    function getStrengthMax()
    {
        return 200;
    }
}