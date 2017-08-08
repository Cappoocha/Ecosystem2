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
class Observer extends EcosystemEntity
{
    public function describeEcosystemObject()
    {
        echo 'Observer number: ' . $this->getId() .
            'Date: ' . date('d.m.Y H:i:s');
    }
}