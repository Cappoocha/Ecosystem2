<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:34
 */

namespace Ecosystem\Entity;

/**
 * Травоядное
 *
 * Class Herbivorous
 *
 * @package Ecosystem\Entity
 */
class Herbivorous extends Animal
{

    /**
     * @return int
     */
    function getStrengthMin()
    {
        return 0;
    }

    /**
     * @return int
     */
    function getStrengthMax()
    {
        return 100;
    }
}