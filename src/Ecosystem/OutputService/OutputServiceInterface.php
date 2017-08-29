<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 29.08.2017
 * Time: 23:47
 */

namespace Ecosystem\OutputService;


use Ecosystem\Entity\Field\Field;

/**
 * Interface OutputServiceInterface
 * @package Ecosystem\OutputService
 */
interface OutputServiceInterface
{
    /**
     * @param Field $field
     *
     * @return void
     */
    public function displayField(Field $field);

    /**
     * @return void
     */
    public function nextLine();
}