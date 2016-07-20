<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property string $street
 * @property string $city
 * @property string $district
 * @property string $region
 * @property string $country
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
            [[ 'city', 'district', 'country', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['street', 'city', 'district', 'region', 'country'], 'string', 'max' => 200],
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
