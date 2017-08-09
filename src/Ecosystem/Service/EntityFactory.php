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
        return new Plant($field->createCoordinate(), $field->createCoordinate(), 'Plant');
    }

    public function createPredator(Field $field)
    {
        return new Predator($field->createCoordinate(), $field->createCoordinate(), 'Predator');
    }

    public function createHugePredator(Field $field)
    {
        return new HugePredator($field->createCoordinate(), $field->createCoordinate(), 'HugePredator');
    }

    public function createHerbivorous(Field $field)
    {
        return new Herbivorous($field->createCoordinate(), $field->createCoordinate(), 'Herbivorous');
    }

    public function createObserver(Field $field)
    {
        return new Observer($field->createCoordinate(), $field->createCoordinate(), 'Observer');
    }
}