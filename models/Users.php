<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $gender
 * @property string $date
 * @property string $email
 *
 * @property Addresses[] $addresses
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'surname', 'gender', 'date', 'email'], 'required'],
            [['date'], 'safe'],
            [['login', 'password', 'name', 'surname'], 'string', 'max' => 30],
            [['login'], 'string', 'min' => 4],
            [['password'], 'string', 'min' => 6],
            [['gender'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 40],
            [['login'], 'unique'],
            [['email'], 'unique'],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'name' => 'Name',
            'surname' => 'Surname',
            'gender' => 'Gender',
            'date' => 'Creation Date',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Addresses::className(), ['user_id' => 'id']);
    }
}
