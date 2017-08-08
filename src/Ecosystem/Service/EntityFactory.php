<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 08.08.2017
 * Time: 22:11
 */

namespace Ecosystem\Service;


use Ecosystem\Entity\Field\Field;
use Ecosystem\Entity\Herbivorous;
use Ecosystem\Entity\HugePredator;
use Ecosystem\Entity\Observer;
use Ecosystem\Entity\Plant;
use Ecosystem\Entity\Predator;

class EntityFactory
{
    /**
     * @param Field $field
     *
     * @return Plant
     */
    public function createPlant(Field $field)
    {
        return new Plant($field->getRandomX(), $field->getRandomY(), 'Plant');
    }

    public function createPredator(Field $field)
    {
        return new Predator($field->getRandomX(), $field->getRandomY(), 'Predator');
    }

    public function createHugePredator(Field $field)
    {
        return new HugePredator($field->getRandomX(), $field->getRandomY(), 'HugePredator');
    }

    public function createHerbivorous(Field $field)
    {
        return new Herbivorous($field->getRandomX(), $field->getRandomY(), 'Herbivorous');
    }

    public function createObserver(Field $field)
    {
        return new Observer($field->getRandomX(), $field->getRandomY(), 'Observer');
    }
}