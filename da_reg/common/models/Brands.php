<?php

namespace common\models;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "brands".
 *
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property string $brand_code
 * @property integer $active
 * @property string $created
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'brand_code', 'active'], 'required'],
            [['name', 'info'], 'string'],
            [['active'], 'integer'],
            [['created'], 'safe'],
            [['brand_code'], 'string', 'max' => 255],
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
            'brand_code' => 'Brand Code',
            'active' => 'Active',
            'created' => 'Created',
        ];
    }


    ////Brands
    public static function get_all_brands_for_drop_down()
    {
        return ArrayHelper::map(self::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name');
    }//    public function get_all_brands_for_drop_down()

    public static function get_brand_name($brand_id)
    {
        return self::findOne($brand_id)->manufacturer;
    }//    public function get_all_brands_for_drop_down()

    public static function get_all_active_brands()
    {
        return self::find()
            ->where(['active'=>'1'])
            ->orderBy(['name' => SORT_ASC])->all();
    }//    public function get_all_brands_for_drop_down()


    public static function get_brands_by_keyword($keyword)
    {
        return self::find()
            ->where(['active'=>'1'])
            ->andWhere(['like','name',$keyword])
            ->orderBy(['name' => SORT_ASC])
            ->all();

    }//    public function get_all_brands_for_drop_down()


    public static function getawesomebrandicon($brandname)
    {
        $brandname = strtolower($brandname);
        $brandname = preg_replace('/\s+/', '', $brandname);
        return '<i class="ukw-logo-fa ukw-logo-fa-' . $brandname . '"></i>';
    }///end of public function getawesomebrandicon()







}///end of class
