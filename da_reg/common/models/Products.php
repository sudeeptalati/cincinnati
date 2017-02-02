<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $brand_id
 * @property integer $appliance_id
 * @property string $model_number
 * @property string $serial_number
 * @property string $color
 * @property string $seller
 * @property string $purchase_date
 * @property string $created
 * @property string $modified
 *
 * @property Customers $customer
 * @property Appliances $appliance
 * @property Brands $brand
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'brand_id', 'appliance_id', 'modified'], 'required'],
            [['id', 'customer_id', 'brand_id', 'appliance_id'], 'integer'],
            [['purchase_date', 'created', 'modified'], 'safe'],
            [['model_number', 'serial_number', 'color', 'seller'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['appliance_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appliances::className(), 'targetAttribute' => ['appliance_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'brand_id' => 'Brand ID',
            'appliance_id' => 'Appliance ID',
            'model_number' => 'Model Number',
            'serial_number' => 'Serial Number',
            'color' => 'Color',
            'seller' => 'Seller',
            'purchase_date' => 'Purchase Date',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppliance()
    {
        return $this->hasOne(Appliances::className(), ['id' => 'appliance_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brand_id']);
    }
}
