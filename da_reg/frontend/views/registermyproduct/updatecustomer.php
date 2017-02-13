<?php
/**
 * Created by PhpStorm.
 * User: sudeeptalati
 * Date: 10/02/2017
 * Time: 13:09
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;





?>

<?php $form = ActiveForm::begin([ 'action' =>['registermyproduct/updatecustomer'], 'id' => 'customer_product_registration_form', 'enableAjaxValidation' => true,]); ?>

    <div style="float: right">
        <?= Html::submitButton('Save', ['name' => 'register_only', 'class' => 'btn btn-lg btn-info']) ?>
    </div>

<?= $this->render('_customer_form_fields', ['customer_model' => $customer_model, 'form' => $form]); ?>
    <div style="float: right">
        <?= Html::submitButton('Save', ['name' => 'register_only', 'class' => 'btn btn-lg btn-info']) ?>
    </div>


<?php ActiveForm::end(); ?>


