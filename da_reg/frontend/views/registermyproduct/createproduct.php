<?php
/**
 * Created by PhpStorm.
 * User: sudeeptalati
 * Date: 12/02/2017
 * Time: 15:09
 */



use yii\helpers\Html;
use yii\widgets\ActiveForm;

$product_model->customer_id=$customer_model->id;

?>




<?php $form = ActiveForm::begin([ 'action' =>['registermyproduct/createproduct' ], 'id' => 'create_product_form', 'enableAjaxValidation' => true,]); ?>


<?= $form->field($product_model, 'customer_id')->hiddenInput()->label(false); ?>

<div style="display: block;" id="brand_div_box">

    <p>
        <?= Html::textInput('brand_search_box', '', ['id' => 'brand_search_box', 'class' => 'large_search_box', 'placeholder' => 'Type your appliance make']); ?>
    </p>

    <div id="brand_search_data"></div>
</div>


<br>

<div style="display: none;" id="appliance_div_box">

    <p>
        <?= Html::textInput('appliance_search_box', '', ['id' => 'appliance_search_box', 'class' => 'large_search_box', 'placeholder' => 'Select your appliance make']); ?>
    </p>

    <div id="appliance_search_data"></div>

</div>




<?= $this->render('_product_form_fields', ['product_model' => $product_model, 'form' => $form]); ?>
<div style="text-align: center">
    <?= Html::submitButton('Save', ['name' => 'update_product', 'class' => 'btn btn-lg btn-info']) ?>
</div>


<?php ActiveForm::end(); ?>
<br><br>

