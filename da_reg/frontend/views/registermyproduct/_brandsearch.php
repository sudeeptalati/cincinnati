<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 27/01/2017
 * Time: 14:11
 */


use common\models\Brands;

?>


<table class="responsive-stacked-table">
    <tr>
        <?php $cols_count = 0; ?>

        <?php foreach ($brands as $brand): ?>

        <td style="text-align: center;" onclick="select_the_brand( '<?= $brand->id ?>' , '<?= $brand->name ?>' , '<?= $brand->brand_code ?>'  )">


            <div id="<?= strtolower($brand->brand_code . '_brand_icon'); ?>">
                <h1>
                    <?= Brands::getawesomebrandicon($brand->brand_code); ?>
                </h1>
                <h4>
                    <?= $brand->name; ?>
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
