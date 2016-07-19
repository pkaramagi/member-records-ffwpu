<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "general_career_record".
 *
 * @property integer $id
 * @property string $position
 * @property string $organisation
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $user_id
 *
 * @property User $user
 */
class GeneralCareerRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'general_career_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'organisation', 'description', 'start_date', 'end_date', 'user_id'], 'required'],
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['user_id'], 'integer'],
            [['position', 'organisation'], 'string', 'max' => 200],
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
            'position' => Yii::t('app', 'Position'),
            'organisation' => Yii::t('app', 'Organisation'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
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
