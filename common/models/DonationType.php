<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donation_type".
 *
 * @property integer $id
 * @property integer $name
 *
 * @property Donation[] $donations
 */
class DonationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donation_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'integer'],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donation::className(), ['donation_type' => 'name']);

    }
    /**
    * @param boolean $arr
     * @return array | \yii\db\ActiveQuery
     */
    public static function  getDonationTypes($arr=false){
        if($arr){
            return \yii\helpers\ArrayHelper::map(static::find()->all(),'id','name');
        }
        return static::find()->all();
    }
}
