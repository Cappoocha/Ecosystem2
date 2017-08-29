<?php
/**
 * Created by PhpStorm.
 * User: Cappoocha
 * Date: 30.08.2017
 * Time: 0:17
 *
 * @var FieldCell $fieldCell
 */

use Ecosystem\Entity\Field\FieldCell;

var_dump($fieldCell);
?>

<?php if ($fieldCell instanceof FieldCell) : ?>
<td>
    <?php foreach ($fieldCell->getEcosystemObjects() as $ecosystemObject) : ?>
        <?= $ecosystemObject->getName() . $ecosystemObject->getId(); ?> :
        <?= $ecosystemObject->getXPosition() . ':' . $ecosystemObject->getYPosition(); ?>
    <?php endforeach; ?>
</td>
<?php endif; ?>
