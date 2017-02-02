<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 01/02/2017
 * Time: 12:13
 */


use kartik\datetime\DateTimePicker;

use yii\jui\DatePicker;
?>



<hr>

<h3>
    <i class="fa fa-archive" aria-hidden="true"></i>
    &nbsp; Product Details
</h3>

<table class="full_width responsive-stacked-table">
    <tr>
        <td>
            <div style="" id="selected_brand">

            </div>
        </td>

        <td>
            <div style="" id="selected_appliance">

            </div>
        </td>
    </tr>
    <tr>
        <td style="width: 90%">
            <?= $form->field($product_model, 'model_number')->textInput(['placeholder' => ' Model Number', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>
        </td>
        <td style="width: 90%">
            <?= $form->field($product_model, 'serial_number')->textInput(['placeholder' => ' Serial Number', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>
        </td>
    </tr>

    <tr>
        <td style="width: 90%">
            <?= $form->field($product_model, 'purchase_date')->widget(DatePicker::classname(), [ ]);  ?>

        </td>
        <td style="width: 90%">
            <?= $form->field($product_model, 'seller')->textInput(['placeholder' => ' Purchased From', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>

        </td>
    </tr>


    <tr>
        <td style="width: 90%">
            <?= $form->field($product_model, 'color')->textInput(['placeholder' => ' Color', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>
        </td>

    </tr>
</table>