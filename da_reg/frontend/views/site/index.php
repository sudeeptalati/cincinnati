<?php
use yii\helpers\Html;
use common\models\Products;
use \common\models\Brands;
use \common\models\Appliances;

/* @var $this yii\web\View */

$this->title = 'WTA My Appliance';
$new_product_model=new Products();
?>
<div class="site-index">




    <table class="full_width ">
        <tr>
            <td style="width: 10%">
                <?= Html::button('Your Details <i class="fa fa-pencil-square" aria-hidden="true"></i>', ['class' => 'btn-lg customerheadingbox white_color', 'onclick' => '(function ( $event ) { $("#customer_edit_box").toggle("slow"); $("#customer_view_box").toggle("slow"); })();']); ?>
                <br><br>
                <div id="customer_view_box">

                    <address>
                        <table class="full_width">
                            <tr>
                                <td>
                                    <i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>

                                    <div style="display:block;" id="customer_div_box">
                                        <!-- These values are taken from customer form fields-->
                                        <div class="customer_address_printed"></div>
                                    </div><!--customer_div_box -->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <?= $customer_model->telephone; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-mobile fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <?= $customer_model->mobile; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <i class="fa fa-mail fa-2x" aria-hidden="true">@</i>
                                </td>
                                <td>
                                    <span style="text-transform: none;">
                                      <?= $customer_model->email; ?>
                                    </span>
                                </td>
                            </tr>


                        </table>
                    </address>

                </div>


            </td>
            <td style="width: 60%">

                <div class="jumbotron">
                    <h1>My Appliance!</h1>

                    <p class="lead">Your following appliances are registered with us.</p>


                    <?= Html::button('Add another Appliance <i class="fa fa-plus-square" aria-hidden="true"></i>', ['class' => 'btn btn-lg btn-success', 'onclick' => '(function ( $event ) { $("#add_new_product_div").toggle("slow"); })();']); ?>


                </div>


                <div id="add_new_product_div" style="display: none">
                    <?=  $this->render('/registermyproduct/createproduct', ['customer_model' => $customer_model, 'product_model'=>$new_product_model]); ?>
                </div>




            </td>

        </tr>
    </table>
    <div id="customer_edit_box" style="display: none;">

        <?= $this->render('/registermyproduct/updatecustomer', ['customer_model' => $customer_model]); ?>

    </div><!-- <div id="customer_edit_box">-->


    <div class="body-content">


        <div class="row">

            <table class="full_width">

                <tr>
                    <th>Prdouct</th>
                    <th>Model No</th>
                    <th>Serial No</th>
                    <th>Color</th>
                    <th>Purchase Date</th>
                    <th>Seller</th>
                </tr>

                <?php foreach ($customer_model->products as $customer_product_model): ?>


                    <tr>
                        <td>
                            <h1>
                                <?= Brands::getawesomebrandicon($customer_product_model->brand->name); ?>
                                <?= Appliances::getawesomeapplianceicon($customer_product_model->appliance->name); ?>
                            </h1>
                            <?= $customer_product_model->brand->name; ?>
                            <?= $customer_product_model->appliance->name; ?>

                        </td>


                        <td><?= $customer_product_model->model_number; ?></td>


                        <td><?= $customer_product_model->serial_number; ?></td>


                        <td><?= $customer_product_model->color; ?></td>


                        <td>
                            <?= Yii::$app->formatter->asDate($customer_product_model->purchase_date, 'long'); ?>


                        </td>





                        <td><?= $customer_product_model->seller; ?></td>


                        <td>

                            <?php $product_edit_box_id=$customer_product_model->id.'_product_edit_box'; ?>

                            <!--
                            <?= Html::button('<i class="fa fa-pencil-square" aria-hidden="true"></i>', ['class' => 'btn btn-primary', 'onclick' => '(function ( $event ) { $("#'.$product_edit_box_id.' ").toggle("slow"); })();']); ?>
                            -->




                            <?= Html::a( '<i class="fa fa-times" aria-hidden="true"></i>', ['registermyproduct/deleteproduct', 'product_id' => $customer_product_model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' =>'Are you sure you want to delete this product?',
                                    'method' => 'post',
                                ],
                            ]) ?>

                            <?= Html::a( '<i class="fa fa-pencil-square" aria-hidden="true"></i>', ['registermyproduct/updateproduct', 'product_id' => $customer_product_model->id], [
                                'class' => 'btn btn-primary',

                            ]) ?>







                        </td>

                    </tr>
                    <tr>
                        <td colspan="6">

                            <div id="<?= $product_edit_box_id; ?>"  style="display: none;">

                                <?= $this->render('/registermyproduct/updateproduct', ['product_model' => $customer_product_model]); ?>
                            </div>
                            <hr>

                        </td>
                    </tr>

                <?php endforeach; //// ($customer_model->products as $customer_product_model()):?>

            </table>
        </div><!--  <div class="row">-->

    </div><!--  <div class="body-content">-->
</div><!-- end of <div class="site-index"> -->