<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $id
 * @property string $title
 * @property string $first_name
 * @property string $last_name
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $address_line_3
 * @property string $town
 * @property string $county
 * @property string $postcode
 * @property double $lat
 * @property double $lng
 * @property string $telephone
 * @property string $mobile
 * @property string $email
 * @property string $notes
 * @property string $created
 * @property string $modified
 *
 * @property Products[] $products
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'first_name', 'last_name', 'address_line_1', 'town', 'postcode', 'email'], 'required'],
            [['lat', 'lng'], 'number'],
            [['notes'], 'string'],
            [['email'], 'email'],
            [['email'], 'unique',  'message' => 'This email address already exists. If you have forgotten your password, please reset your password from the login page'],

            [['created', 'modified'], 'safe'],
            [['title', 'first_name', 'last_name', 'address_line_1', 'address_line_2', 'address_line_3', 'town', 'county', 'postcode', 'telephone', 'mobile', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'address_line_3' => 'Address Line 3',
            'town' => 'Town',
            'county' => 'County',
            'postcode' => 'Postcode',
            'lat' => 'Latitudes',
            'lng' => 'Longitudes',
            'telephone' => 'Telephone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'notes' => 'Notes',
            'created' => 'Created',
            'modified' => 'Modified',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['customer_id' => 'id']);
    }



}
