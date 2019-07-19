<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addresses".
 *
 * @property int $id
 * @property int $user_id
 * @property int $zip
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string $house
 * @property string $flat
 *
 * @property Users $user
 */
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zip', 'country', 'city', 'street', 'house'], 'required'],
            [['user_id', 'zip'], 'integer'],
            [['country'], 'string', 'max' => 2],
            [['country'], 'string', 'min' => 2],
            [['city'], 'string', 'max' => 30],
            [['street'], 'string', 'max' => 40],
            [['house', 'flat'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'zip' => 'Zip',
            'country' => 'Country',
            'city' => 'City',
            'street' => 'Street',
            'house' => 'House',
            'flat' => 'Office/Flat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
