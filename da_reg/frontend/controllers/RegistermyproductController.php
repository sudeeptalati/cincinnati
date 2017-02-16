<?php


namespace frontend\controllers;


use common\models\Appliances;
use common\models\Brands;
use common\models\Customers;
use common\models\Products;
use frontend\models\PasswordResetRequestForm;
use frontend\models\SignupForm;
use Yii;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;


class RegistermyproductController extends \yii\web\Controller
{


    /*
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'deleteproduct' => ['POST'],
                ],
            ],
        ];
    }
*/



    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest)
            return $this->goHome();


        $customer_model = new Customers();
        $product_model = new Products();


        if (Yii::$app->request->isAjax && $customer_model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($customer_model);
        }


        if ($customer_model->load(Yii::$app->request->post()) && $product_model->load(Yii::$app->request->post())) {

            if ($customer_model->save()) {

                $product_model->customer_id = $customer_model->id;

                if (!empty($product_model->purchase_date))
                    $product_model->purchase_date = Yii::$app->formatter->asDate($product_model->purchase_date, 'php:Y-m-d H:i:s'); // 2014-10-06 15:22:34
                else
                    $product_model->purchase_date =null;

                if ($product_model->save()) {

                    Yii::$app->session->setFlash('success', 'Your product has been registered successfully');

                    return $this->redirect(['createuser', 'email' => $customer_model->email]);

                    if (Yii::$app->request->post('register_and_sign_up'))
                        return $this->redirect(['createuser', ['email' => $customer_model->email]]);

                    /*
                    if (Yii::$app->request->post('register_only'))
                        return $this->redirect(['thankyou']);

                    if (Yii::$app->request->post('register_and_add_another_appliance'))
                        return $this->redirect(['thankyou']);

                    */

                } else {
                    Yii::$app->session->setFlash('error', 'There was some problem in saving product details. Please try agian or contact support');
                }
            } else {

                Yii::$app->session->setFlash('error', 'There was some problem in registering your details. Please contact support');
            }
        }


        return $this->render('index', [
            'customer_model' => $customer_model,
            'product_model' => $product_model,
        ]);


    }///end of acpublic function actionIndex()


    public function actionCreateuser()
    {
        $email = Yii::$app->request->get('email');


        echo 'EMAIL IS ' . $email;
        $signup_model = new SignupForm();
        $signup_model->username = $email;
        $signup_model->email = $email;
        $signup_model->password = $email;


        if ($user = $signup_model->signup()) {
            Yii::$app->getUser()->login($user);
            $password_reset_model = new PasswordResetRequestForm();
            $password_reset_model->email = $signup_model->email;

            if ($password_reset_model->sendEmail()) {

                Yii::$app->session->setFlash('success', 'Please check your email for further instructions.');
                return $this->goHome();

            }

        } else {
            var_dump($signup_model->getErrors());
        }


    }//end of     public function actionCreateuser()


    public function actionThankyou()
    {


        return $this->render('thankyou', [

        ]);


    }///end of actionViewmydetails


    public function actionBrandsearch()
    {

        $brand_name_keyword = Yii::$app->request->get('brand_name_keyword');

        $brands = Brands::get_brands_by_keyword($brand_name_keyword);

        //var_dump($brands);

        return $this->renderPartial('_brandsearch', [
            'brands' => $brands,
        ]);


    }///end of public function actionBrandsearch()


    public function actionAppliancesearch()
    {

        $appliance_name_keyword = Yii::$app->request->get('appliance_name_keyword');

        $appliances = Appliances::get_appliances_by_keyword($appliance_name_keyword);


        return $this->renderPartial('_appliancesearch', [
            'appliances' => $appliances,
        ]);


    }///end of public function actionBrandsearch()


    /*
    public function actionRegister_customer()
    {
        $model = new  Customers(['scenario' => 'create']);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('_register_customer', [
            'model' => $model,
        ]);
    }*/


    public function actionUpdatecustomer()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        $loggedin_user_email = Yii::$app->user->identity->email;
        $customer_model = $this->findCustomerbyemail($loggedin_user_email);


        if (Yii::$app->request->isAjax && $customer_model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($customer_model);
        }


        if ($customer_model->load(Yii::$app->request->post()) && $customer_model->save()) {
            return $this->goHome();
        } else {
            return $this->render('/registermyproduct/updatecustomer', ['customer_model' => $customer_model]);
        }

    }///end of  public function actionUpdatecustomer()


    public function actionUpdateproduct()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        $product_id = Yii::$app->request->get('product_id');


        $product_model = $this->findProduct($product_id);


        if (Yii::$app->request->isAjax && $product_model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($product_model);
        }


        if ($product_model->load(Yii::$app->request->post())) {

            if (!empty($product_model->purchase_date))
                $product_model->purchase_date = Yii::$app->formatter->asDate($product_model->purchase_date, 'php:Y-m-d H:i:s'); // 2014-10-06 15:22:34
            else
                $product_model->purchase_date = null;

            if ($product_model->save())
                return $this->goHome();

        } else {
            return $this->render('/registermyproduct/updateproduct', ['product_model' => $product_model]);
        }

    }/////end of fpublic function actionCreateproduct()



    public function actionCreateproduct()
    {
        $loggedin_user_email = Yii::$app->user->identity->email;
        $customer_model = $this->findCustomerbyemail($loggedin_user_email);


        $product_model = new Products();


        if ($product_model->load(Yii::$app->request->post())) {


            if (!empty($product_model->purchase_date))
                $product_model->purchase_date = Yii::$app->formatter->asDate($product_model->purchase_date, 'php:Y-m-d H:i:s'); // 2014-10-06 15:22:34
            else
                $product_model->purchase_date = null;

            if ($product_model->save())
                return $this->goHome();



        } else {
            return $this->render('/registermyproduct/createproduct', ['customer_model' => $customer_model, 'product_model' => $product_model]);
        }




    }///end of  protected function findCustomerbyemail($email


    public function actionDeleteproduct($product_id)
    {

        $product_id = Yii::$app->request->get('product_id');
        $this->findProduct($product_id)->delete();
        return $this->redirect(['index']);

    }





/////////////////////////////////////////////////////////////////////////////
///////////////////////////////////Private function/////////////////// //////
/////////////////////////////////////////////////////////////////////////////

    protected function findProduct($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('There is no products found with the logged in user . Please contact support.');
        }
    }///end of  protected function findCustomerbyemail($email

    protected function findCustomerbyemail($email)
    {
        if (($model = Customers::findOne(['email' => $email])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('There is no account found with the logged in user . Please contact support.');
        }
    }///end of  public function actionUpdatecustomer()


}/////end of class
