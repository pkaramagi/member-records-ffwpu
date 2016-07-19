<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property integer $street
 * @property integer $city
 * @property integer $district
 * @property integer $region
 * @property integer $country
 * @property integer $user_id
 *
 * @property User $user
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['street', 'city', 'district', 'region', 'country', 'user_id'], 'required'],
            [['street', 'city', 'district', 'region', 'country', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'street' => Yii::t('app', 'Street'),
            'city' => Yii::t('app', 'City'),
            'district' => Yii::t('app', 'District'),
            'region' => Yii::t('app', 'Region'),
            'country' => Yii::t('app', 'Country'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
