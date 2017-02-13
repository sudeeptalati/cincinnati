<?php

use common\models\Handyfunctions;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $customer_model common\models\Customers */
/* @var $form ActiveForm */
?>

<h3>
    <i class="fa fa-user" aria-hidden="true"></i>
    &nbsp; Your Details
</h3>

<div class="register_customer">

    <?= $form->field($customer_model, 'title')->dropDownList(Handyfunctions::name_title(), ['class' => 'large_search_box mobile_content', 'style' => 'width: 100px'])->label(false) ?>
    <table class="full_width responsive-stacked-table">
        <tr>

            <td>
                <?= $form->field($customer_model, 'first_name')->textInput(['placeholder' => 'first name', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>
            </td>
            <td>
                <?= $form->field($customer_model, 'last_name')->textInput(['placeholder' => 'last name', 'class' => 'large_search_box mobile_content', 'style' => 'width:100%'])->label(false) ?>
            </td>
        </tr>
    </table>

    <br>
    <hr>
    <h4><i class="fa fa-home" aria-hidden="true"></i>
        Your address
    </h4>

    <input id="address_autocomplete" name="address_autocomplete" placeholder="Type your postcode or your full address"
           class="large_search_box mobile_content" style='width:100%'>


    <table class="responsive-stacked-table">
        <tr>
            <td>
                <?= $form->field($customer_model, 'address_line_1')->textInput(['placeholder' => ' House No', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>

                <br>
                <?= $form->field($customer_model, 'lat')->hiddenInput()->label(false) ?>

                <?= $form->field($customer_model, 'lng')->hiddenInput()->label(false) ?>


                <address
                        style="">
                    <table>
                        <tr>
                            <td>
                                <i class="fa fa-envelope-o fa-3x" aria-hidden="true"></i>
                            </td>
                            <td>
                                <div class="customer_address_printed"></div>
                            </td>
                        </tr>
                    </table>


                </address>
                <?php

                $this->registerJs(
                    "
                        $( document ).ready(function() {
                            format_customer_address_for_html();
                        });
 
                        
                        $('#address_autocomplete').keyup(function() {
                                format_customer_address_for_html();
                          });
                        
                        $('#customers-address_line_1').keyup(function() {
                                format_customer_address_for_html();
                          });
                          
                        $('#customers-address_line_2').keyup(function() {
                                format_customer_address_for_html();
                          });
                          
                        $('#customers-address_line_3').keyup(function() {
                                format_customer_address_for_html();
                          });
                          
                        $('#customers-town').keyup(function() {
                                format_customer_address_for_html();
                          });
                          
                        $('#customers-postcode').keyup(function() {
                                format_customer_address_for_html();
                          });
                          
                                             
                        $('#customers-county').keyup(function() {
                                format_customer_address_for_html();
                          });
                          
                   
                        
                          
                        
                        


                    ");

                ?>

            </td>
            <td>
                <?= $form->field($customer_model, 'address_line_2')->textInput(['placeholder' => ' Line 2', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
                <?= $form->field($customer_model, 'town')->textInput(['placeholder' => ' Town', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
            </td>
            <td>
                <?= $form->field($customer_model, 'address_line_3')->textInput(['placeholder' => ' Line 3', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
                <?= $form->field($customer_model, 'postcode')->textInput(['placeholder' => ' Postcode', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
                <?= $form->field($customer_model, 'county')->textInput(['placeholder' => ' County', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
            </td>
        </tr>



    </table>

    <br>
    <hr>
    <h4><i class="fa fa-commenting" aria-hidden="true"></i>
        We can reach you at
    </h4>

    <table class="full_width responsive-stacked-table">
        <tr>
            <td style="width: 10%"></td>
            <td style="width: 40%"></td>
            <td style="width: 10%"></td>
            <td style="width: 40%"></td>
        </tr>

        <tr>
            <td>
                <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
            </td>
            <td>
                <?= $form->field($customer_model, 'telephone')->textInput(['placeholder' => ' Phone', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
            </td>

            <td>
                <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>
            </td>
            <td>
                <?= $form->field($customer_model, 'mobile')->textInput(['placeholder' => ' Mobile', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td>
                <i class="fa fa-envelope-o fa-3x    " aria-hidden="true"></i>
            </td>
            <td colspan="3">
                <?php if ($customer_model->isNewRecord):?>
                    <?= $form->field($customer_model, 'email', ['enableAjaxValidation' => true])->textInput(['placeholder' => ' Email @', 'class' => 'large_search_box mobile_content', 'style' => 'width:95%; text-transform: none;'])->label(false) ?>
                <?php else:?>
                    <?= $form->field($customer_model, 'email', ['enableAjaxValidation' => true])->textInput(['placeholder' => ' Email @', 'class' => 'large_search_box mobile_content', 'style' => 'width:95%; text-transform: none; background: #d0d0d0', 'readonly'=>'readonly', ])->label(false) ?>
                <?php endif;?>

            </td>
        </tr>
        <tr>
            <td>
                <i class="fa fa-sticky-note-o fa-3x" aria-hidden="true"></i>
            </td>
            <td colspan="3">
                <?= $form->field($customer_model, 'notes')->textarea(['rows' => '5', 'placeholder' => ' Any other info ', 'style' => 'width:95%'])->label(false) ?>
            </td>
        </tr>


    </table>


</div><!-- _register_customer -->
