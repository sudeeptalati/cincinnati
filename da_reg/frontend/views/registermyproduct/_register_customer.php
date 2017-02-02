<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use common\models\Handyfunctions;
use common\models\Customers;
use common\models\Products;


$model = new Customers();
$product_model=new Products();





/* @var $this yii\web\View */
/* @var $model common\models\Customers */
/* @var $form ActiveForm */
?>

<h3>
    <i class="fa fa-user" aria-hidden="true"></i>
    &nbsp; Your Details
</h3>

<div class="register_customer">

    <?php $form = ActiveForm::begin(); ?>


    <table class="full_width responsive-stacked-table" >
        <tr>

            <td>
                <?= $form->field($model, 'title')->dropDownList(Handyfunctions::name_title(), ['class' => 'large_search_box mobile_content', 'style' => 'width: 100px'])->label(false) ?>
            </td>
            <td>
                <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'first name', 'class' => 'large_search_box mobile_content', 'style' => 'width:80%'])->label(false) ?>
            </td>
            <td>
                <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'last name', 'class' => 'large_search_box mobile_content', 'style' => 'width:80%'])->label(false) ?>
            </td>
        </tr>
    </table>

    <br><hr>
    <h4><i class="fa fa-home" aria-hidden="true"></i>
        Your address
    </h4>

        <input id="address_autocomplete" name="address_autocomplete" placeholder="Type your postcode" class="large_search_box mobile_content" style='width:90%' >



    <table class="responsive-stacked-table">
            <tr>
                <td>
                    <?= $form->field($model, 'address_line_1')->textInput(['placeholder' => ' Line 1', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($model, 'address_line_2')->textInput(['placeholder' => ' Line 2', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
                </td>
                <td>
                    <?= $form->field($model, 'address_line_3')->textInput(['placeholder' => ' Line 3', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?= $form->field($model, 'town')->textInput(['placeholder' => ' Town', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
                    <?= $form->field($model, 'county')->textInput(['placeholder' => ' County', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>

                </td>
                <td>
                    <?= $form->field($model, 'postcode')->textInput(['placeholder' => ' Postcode', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
                </td>
                <td>

                    <?= $form->field($model, 'lat')->hiddenInput()->label(false) ?>

                    <?= $form->field($model, 'lng')->hiddenInput()->label(false) ?>

                    <address id="customer_address_printed" style="text-align: left;">

                    </address>
                    <?php

                    $this->registerJs(
                        "
                        
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
                          
                   
                        
                          


function format_customer_address_for_html() {

    address_customer_div_html='';
    if( $('#customers-address_line_1').val()) {
        address_customer_div_html=address_customer_div_html+' '+$('#customers-address_line_1').val();
    }
    if( $('#customers-address_line_2').val()) {
        address_customer_div_html=address_customer_div_html+'<br>'+$('#customers-address_line_2').val();
    }
    
    if( $('#customers-address_line_3').val()) {
        address_customer_div_html=address_customer_div_html+'<br> '+$('#customers-address_line_3').val();
    }
    
    if( $('#customers-town').val()) {
        address_customer_div_html=address_customer_div_html+'<br> '+$('#customers-town').val();
    }
    
    if( $('#customers-county').val()) {
        address_customer_div_html=address_customer_div_html+'<br> '+$('#customers-county').val();
    }   
     
    if( $('#customers-postcode').val()) {
        address_customer_div_html=address_customer_div_html+'<br> '+$('#customers-postcode').val();
    }
    
    console.log(address_customer_div_html);

$('#customer_address_printed').html(address_customer_div_html)
    
    
    
    /*

    $('#customers-address_line_2').val();
    $('#customers-address_line_3').val();
    $('#customers-town').val();
    $('#customers-county').val();
    $('#customers-postcode').val();
    */


}


                    ");

                    ?>


                </td>
            </tr>
            <tr>

                <td>
                 </td>


            </tr>

        </table>

    <br><hr>
    <h4><i class="fa fa-commenting" aria-hidden="true"></i>
        We can reach you at
    </h4>

    <table class="full_width responsive-stacked-table">
        <tr>
            <td>
                <i class="fa fa-phone fa-3x" aria-hidden="true"></i>
            </td>
            <td>
                <?= $form->field($model, 'telephone')->textInput(['placeholder' => ' Phone', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
            </td>

            <td>
                <i class="fa fa-mobile fa-3x" aria-hidden="true"></i>
            </td>
            <td>
                <?= $form->field($model, 'mobile')->textInput(['placeholder' => ' Mobile', 'class' => 'large_search_box mobile_content', 'style' => 'width:90%'])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td>
                <i class="fa fa-envelope-o fa-3x    " aria-hidden="true"></i>
            </td>
            <td colspan="3">
                <?= $form->field($model, 'email')->textInput(['placeholder' => ' Email @', 'class' => 'large_search_box mobile_content', 'style' => 'width:95%'])->label(false) ?>
            </td>
        </tr>
        <tr>
            <td>
                <i class="fa fa-sticky-note-o fa-3x" aria-hidden="true"></i>
            </td>
            <td colspan="3">
                <?= $form->field($model, 'notes')->textarea(['rows'=>'5','placeholder' => ' Any other info ',  'style' => 'width:95%'])->label(false) ?>
            </td>
        </tr>



        <!-- PRODUCT SECTION-->
        <tr>
            <td colspan="4">

                <div style="display: none;" id="product_div_box">
                    <?= $this->render('_product_form_fields',['product_model'=>$product_model, 'form'=>$form]); ?>
                </div>

            </td>
        </tr>



        <!-- PRODUCT SECTION END-->



        <!-- REGISTER BUTTON-->


        <tr>
            <td></td>
            <td>
                <div class="form-group">
                    <?= Html::submitButton('Register & Sign Up ', ['name'=>'register_and_sign_up', 'class' => 'btn btn-lg btn-success']) ?>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <?= Html::submitButton('Register my appliance', ['name'=>'register_only', 'class' => 'btn btn-lg btn-primary']) ?>
                </div>
            </td>

            <td>
                <div class="form-group">
                    <?= Html::submitButton('Register & add another appliance', ['name'=>'register_and_add_another_appliance', 'class' => 'btn btn-lg btn-info']) ?>
                </div>
            </td>

        </tr>







    </table>
        <?php ActiveForm::end(); ?>

</div><!-- _register_customer -->
