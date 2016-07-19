<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_chronic_diseases".
 *
 * @property integer $user_id
 * @property integer $chronic_disease_id
 *
 * @property ChronicDisease $chronicDisease
 * @property User $user
 */
class MemberChronicDiseases extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_chronic_diseases';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'chronic_disease_id'], 'required'],
            [['user_id', 'chronic_disease_id'], 'integer'],
            [['chronic_disease_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChronicDisease::className(), 'targetAttribute' => ['chronic_disease_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'chronic_disease_id' => Yii::t('app', 'Chronic Disease ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChronicDisease()
    {
        return $this->hasOne(ChronicDisease::className(), ['id' => 'chronic_disease_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
