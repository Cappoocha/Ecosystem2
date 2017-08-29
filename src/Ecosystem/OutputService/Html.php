<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 29.08.2017
 * Time: 23:46
 */

namespace Ecosystem\OutputService;

use Ecosystem\Entity\Field\Field;

/**
 * Class Html
 *
 * @package Ecosystem\OutputService
 */
class Html implements OutputServiceInterface
{
    /**
     * @param Field $field
     *
     * @return void
     */
    public function displayField(Field $field)
    {
        echo '<table border="1">';
        $fieldCells = $field->getFieldCells();

        for ($i = 0; $i < $field->getSize(); $i++) {
            echo '<tr>';
            for ($j = 0; $j < $field->getSize(); $j++) {
                $this->renderFile('tdTemplate', ['fieldCell' => $fieldCells[$i][$j]]);
            }
            echo '</tr>';
        }
        echo '</table>';
    }

    /**
     * @return void
     */
    public function nextLine()
    {
        echo '<br />';
    }

    /**
     * @param $fileName
     * @param array $params
     */
    private function renderFile($fileName, array $params = [])
    {
        if (is_array($params) && !empty($params)) {
            extract($params);
        }
        ob_start();
        $filePath = __DIR__ .  '/../View/' . $fileName . '.php';
        include ($filePath);
        echo ob_get_clean();
    }
}