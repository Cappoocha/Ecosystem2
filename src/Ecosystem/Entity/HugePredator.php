<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:35
 */

namespace Ecosystem\Entity;

/**
 * Крупный хищник
 *
 * Class HugePredator
 *
 * @package Ecosystem\Entity
 */
class HugePredator extends Predator
{
    /**
     * @return int
     */
    function getStrengthMin()
    {
        return 200;
    }

    /**
     * @return int
     */
    function getStrengthMax()
    {
        return 300;
    }
}