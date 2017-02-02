<?php



namespace frontend\controllers;

use yii;
use common\models\Brands;
use common\models\Appliances;


class RegistermyproductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }



    public function actionBrandsearch()
    {

        $brand_name_keyword=Yii::$app->request->get('brand_name_keyword');

        $brands=Brands::get_brands_by_keyword($brand_name_keyword);

        //var_dump($brands);

        return $this->renderPartial('_brandsearch', [
            'brands' => $brands,
        ]);


    }///end of public function actionBrandsearch()


    public function actionAppliancesearch()
    {

        $appliance_name_keyword=Yii::$app->request->get('appliance_name_keyword');

        $appliances=Appliances::get_appliances_by_keyword($appliance_name_keyword);




        return $this->renderPartial('_appliancesearch', [
            'appliances' => $appliances,
        ]);


    }///end of public function actionBrandsearch()



    /////to be deleted
    public function actionRegister_customer()
    {
        $model = new common\models\Customers(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('_register_customer', [
            'model' => $model,
        ]);
    }



}
