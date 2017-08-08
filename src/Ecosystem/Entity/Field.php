<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 21:10
 */

namespace Ecosystem\Entity;

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
     * Field constructor.
     *
     * @param int $xLimit
     * @param int $yLimit
     */
    public function __construct($xLimit, $yLimit)
    {
        $this->xLimit = $xLimit;
        $this->yLimit = $yLimit;
    }
}