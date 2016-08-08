<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donation".
 *
 * @property integer $id
 * @property string $name
 * @property integer $amount
 * @property integer $donation_type
 * @property string $description
 * @property integer $user_id
 *
 * @property DonationType $donationType
 * @property User $user
 */
class Donation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'amount', 'donation_type', 'description', 'user_id'], 'required'],
            [['amount', 'donation_type', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['donation_type'], 'exist', 'skipOnError' => true, 'targetClass' => DonationType::className(), 'targetAttribute' => ['donation_type' => 'id']],
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
            'name' => Yii::t('app', 'Name'),
            'amount' => Yii::t('app', 'Amount'),
            'donation_type' => Yii::t('app', 'Donation Type'),
            'description' => Yii::t('app', 'Description'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonationType()
    {
        return $this->hasOne(DonationType::className(), ['id' => 'donation_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
