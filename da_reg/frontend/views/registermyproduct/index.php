<?php
/* @var $this yii\web\View */


use yii\helpers\Html;
use common\models\Handyfunctions;
use common\models\Brands;


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






<div style="display: block;" id="customer_div_box">


        <?=
        $this->render('_register_customer');

        ?>


</div>







