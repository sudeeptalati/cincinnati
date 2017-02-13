<?php

namespace common\models;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "appliances".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property string $appliance_code
 * @property integer $active
 * @property string $created
 */
class Appliances extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appliances';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'appliance_code', 'active'], 'required'],
            [['name', 'info'], 'string'],
            [['active'], 'integer'],
            [['created'], 'safe'],
            [['appliance_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'info' => 'Info',
            'appliance_code' => 'Appliance Code',
            'active' => 'Active',
            'created' => 'Created',
        ];
    }




    ////Product Type
    public static function get_all_appliances_for_drop_down()
    {
        return ArrayHelper::map(self::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }//    public function get_all_brands_for_drop_down()

    public static function get_appliance_name($product_type_id)
    {
        return Producttype::findOne($product_type_id)->product_type;
    }///end of     public static function get_product_type_name()



    ////Font awesome icons////

    public static function getawesomeapplianceicon($producttypename)
    {
        $producttypename = strtolower($producttypename);
        $producttypename = preg_replace('/\s+/', '', $producttypename);

        $producttypename = str_replace('_', '', $producttypename);



        return '<i class="ukwfa ukwfa-' . $producttypename . '"></i>';

    }///end of public function getawesomeapplianceicon()



    public static function get_appliances_by_keyword($keyword)
    {
        return self::find()
            ->where(['active'=>'1'])
            ->andWhere(['like','name',$keyword])
            ->orderBy(['name' => SORT_ASC])
            ->all();

    }//    public function get_all_brands_for_drop_down()




}///end of class
