<?php
/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>


<h1>

    <i class="ukwfa ukwfa-wta fa-5x"></i>
</h1>

<table class="responsive-stacked-table">
    <tr>
        <td>
            <h1>
                Register your appliance
            </h1>
        </td>


    </tr>
</table>
<br>
<br>

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

<br>


<div id="customer_product_reg_box">


    <?php $form = ActiveForm::begin( ['id' => 'customer_product_registration_form',  'enableAjaxValidation' => true,]); ?>

    <!-- CUSTOMER SECTION -->
    <div style="display: none;" id="customer_div_box">
        <?= $this->render('_customer_form_fields', ['customer_model' => $customer_model, 'form' => $form]); ?>

    </div>


    <!-- PRODUCT SECTION -->
    <div style="display: none;" id="product_div_box">
        <?= $this->render('_product_form_fields', ['product_model' => $product_model, 'form' => $form]); ?>
    </div>


    <!-- REGISTER BUTTON -->
    <div style="display: block;" id="register_button_div_box">

        <table class="full_width responsive-stacked-table">
            <tr>
                <td style="width: 100%; text-align: center">
                    <div class="form-group">
                        <?= Html::submitButton('Register & Sign Up ', ['name' => 'register_and_sign_up', 'class' => 'btn btn-lg btn-success']) ?>
                    </div>
                </td>
                <!--
                   <td style="width: 50%; text-align: center">
                    <div class="form-group">
                        <?= Html::submitButton('Register my appliance', ['name' => 'register_only', 'class' => 'btn btn-lg btn-primary']) ?>
                    </div>
                </td>

                <td style="width: 33%; text-align: right">
                    <div class="form-group">
                        <?= Html::submitButton('Register & add another appliance', ['name' => 'register_and_add_another_appliance', 'class' => 'btn btn-lg btn-info']) ?>
                    </div>
                </td>
-->
            </tr>
        </table>
    </div><!--  <div id="register_button_div_box">-->

    <?php ActiveForm::end(); ?>


</div><!-- <div id="customer_product_reg_box"> -->


