<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 20:49
 */

namespace Ecosystem\Entity;

/**
 * Наблюдатель
 *
 * Class Observer
 *
 * @package Ecosystem\Entity
 */
class Observer
{
    /**
     * Порядковый номер
     *
     * @var int
     */
    private $id;

    public function describeEcosystemObject()
    {
        echo 'Observer number: ' . $this->id .
            'Date: ' . date('d.m.Y H:i:s');
    }
}