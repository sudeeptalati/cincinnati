<?php
/**
 * Created by PhpStorm.
 * User: sudeeptalati
 * Date: 10/02/2017
 * Time: 16:29
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;





?>

    <?php $form = ActiveForm::begin([ 'action' =>['registermyproduct/updateproduct', 'product_id'=>$product_model->id], 'id' => 'update_product_form', 'enableAjaxValidation' => true,]); ?>






<?= $this->render('_product_form_fields', ['product_model' => $product_model, 'form' => $form]); ?>
<div style="text-align: center">
    <?= Html::submitButton('Save', ['name' => 'update_product', 'class' => 'btn btn-lg btn-info']) ?>
</div>


<?php ActiveForm::end(); ?>
<br><br>
