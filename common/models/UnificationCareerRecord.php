<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unification_career_record".
 *
 * @property integer $id
 * @property string $position
 * @property integer $organisation_id
 * @property string $department
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $current
 * @property integer $user_id
 *
 * @property User $user
 */
class UnificationCareerRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unification_career_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'organisation_id', 'department', 'description', 'start_date', 'end_date', 'current', 'user_id'], 'required'],
            [['organisation_id', 'current', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['position', 'department'], 'string', 'max' => 200],
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
            'organisation_id' => Yii::t('app', 'Organisation ID'),
            'department' => Yii::t('app', 'Department'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'current' => Yii::t('app', 'Current'),
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
