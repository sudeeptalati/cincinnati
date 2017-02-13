<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 01/02/2017
 * Time: 12:13
 */


use common\models\Appliances;
use common\models\Brands;
use kartik\date\DatePicker;

?>


<hr>


<table class="full_width responsive-stacked-table">
    <tr>
        <td>
            <?php if ($product_model->isNewRecord): ?>
                <?= $form->field($product_model, 'brand_id')->hiddenInput()->label(false); ?>
            <?php else: ?>
                <?= $form->field($product_model, 'brand_id')->dropDownList(Brands::get_all_brands_for_drop_down())->label(false); ?>
            <?php endif; ?>

            <div style="" id="selected_brand">

            </div>
        </td>

        <td>
            <?php if ($product_model->isNewRecord): ?>
                <?= $form->field($product_model, 'appliance_id')->hiddenInput()->label(false); ?>
            <?php else: ?>
                <?= $form->field($product_model, 'appliance_id')->dropDownList(Appliances::get_all_appliances_for_drop_down())->label(false); ?>
            <?php endif; ?>

            <div style="" id="selected_appliance">

            </div>
        </td>
    </tr>
    <tr>
        <td style="width: 90%" colspan="2">
            <?= $form->field($product_model, 'serial_number')->textInput(['placeholder' => ' Serial Number', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>
        </td>
    </tr>

    <tr>
        <td style="width: 90%">

            <?php
            if ($product_model->isNewRecord)
                $product_model->purchase_date = null;
            ?>


            <?= $form->field($product_model, 'purchase_date')->widget(DatePicker::classname(),
                [

                    'attribute' => 'purchase_date',
                    'options' => [
                        'placeholder' => 'Date of Purchase',
                        'class' => 'full_width large_search_box mobile_content'],
                    'readonly' => true,
                    'pluginOptions' => [
                        'format' => 'dd-M-yyyy',
                        'endDate' => '-1d',
                        'todayHighlight' => true
                    ]
                ])->label(false);

            ?>
        </td>
        <td style="width: 90%">
            <?= $form->field($product_model, 'seller')->textInput(['placeholder' => ' Purchased From', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>

        </td>
    </tr>


    <tr>
        <td style="width: 90%">
            <?= $form->field($product_model, 'color')->textInput(['placeholder' => ' Color', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>
        </td>
        <td style="width: 90%">
            <?= $form->field($product_model, 'model_number')->textInput(['placeholder' => ' Model Number', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>

        </td>

    </tr>
</table>