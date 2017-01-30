<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 27/01/2017
 * Time: 15:49
 */

use common\models\Appliances;
?>

<table class="responsive-stacked-table">
    <tr>
        <?php $cols_count = 0; ?>

        <?php foreach ($appliances as $appliance): ?>

        <td style="text-align: center;" onclick="select_the_appliance( '<?= $appliance->id ?>' , '<?= $appliance->name ?>' , '<?= $appliance->appliance_code ?>'  )">


            <div id="<?= strtolower($appliance->appliance_code.'_appliance_icon'); ?>">
                <h1>
                    <?= Appliances::getawesomeapplianceicon($appliance->appliance_code); ?>
                </h1>
                <h4>
                    <?= $appliance->name; ?>
                </h4>

            </div>

        </td>

        <?php $cols_count++; ?>
        <?php if ($cols_count == 5): ?>
        <?php $cols_count = 0; ?>
    </tr>
    <tr>

        <?php endif; ///if ($cols_count==4): ?>


        <?php endforeach; //n$active_brands as $brand: ?>
</table>

