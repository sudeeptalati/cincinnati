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
        <td>
            <div style="" id="selected_brand">

            </div>
        </td>

        <td>
            <div style="" id="selected_appliance">

            </div>
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

<div style="display: none;" id="product_div_box">

    <h3>Product Details</h3>

    <table class="full_width">
        <tr>
            <td style="width: 30%">
                <input placeholder="Model Number" class="large_search_box mobile_content">
            </td>
            <td style="width: 90%">
                <input placeholder="Serial Number" class="large_search_box mobile_content">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br><br>
            </td>
        </tr>
        <tr>
            <td style="width: 30%">
                <input placeholder="Purchase Date" class="large_search_box  mobile_content">

            </td>
            <td style="width: 90%">
                <input placeholder="Purchased From " class="large_search_box mobile_content">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <br><br>
            </td>
        </tr>

        <tr>
            <td style="width: 30%">
                <input placeholder="Color" class="large_search_box mobile_content">
            </td>

        </tr>
    </table>

</div>

<br>
<hr/>

<div style="display: none;" id="customer_div_box">

    <h3>Your Details</h3>

    <table class="full_width">
        <tr>

            <td>
                <input placeholder="title" class="large_search_box mobile_content" style="width: 100px">
                <input placeholder="First Name" class="large_search_box mobile_content" style="width: 300px">
                <input placeholder="Last Name" class="large_search_box mobile_content" style="width: 300px">
            </td>
        </tr>
        <tr>
            <td>
                <br><br><br>
                <h4><i class="fa fa-home" aria-hidden="true"></i>
                    Your address
                </h4>


                <input placeholder="POSTCODE" class="large_search_box mobile_content" style="width: 800px">
                <br><br>
                <input placeholder="Line 1" class="large_search_box mobile_content" style="width: 300px">
                <input placeholder="line 2" class="large_search_box mobile_content" style="width: 300px">
                <input placeholder="line 3" class="large_search_box mobile_content" style="width: 300px">

                <br><br>
                <input placeholder="Town" class="large_search_box mobile_content" style="width: 300px">
                <br>
                <input placeholder="County" class="large_search_box mobile_content" style="width: 300px">

            </td>
        </tr>
        <tr>
            <td>

                <br><br>
                <h4><i class="fa fa-commenting" aria-hidden="true"></i>
                    We can reach you at
                </h4>

                <i class="fa fa-phone fa-3x" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
                <input placeholder="Phone" class="large_search_box mobile_content" style="width: 800px">
                <br><br>

                <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>
                &nbsp;&nbsp;&nbsp;
                <input placeholder="Mobile" class="large_search_box mobile_content" style="width: 800px">
                <br><br>
                <i class="fa fa-envelope-o fa-3x    " aria-hidden="true"></i>
                &nbsp;&nbsp;&nbsp;

                <input placeholder="Email" class="large_search_box mobile_content" style="width: 800px">

            </td>
        </tr>
        <tr>
            <td>
                <br><br><br>

                <button class="btn btn-lg btn-success" style="float: right">
                    register my appliance
                </button>
            </td>
        </tr>


    </table>

</div>







