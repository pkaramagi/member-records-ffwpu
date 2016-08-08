<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "qualification".
 *
 * @property integer $id
 * @property string $name
 * @property string $institution
 * @property string $date_of_completion
 * @property string $date_of_start
 * @property string $major
 * @property string $remarks
 * @property integer $user_id
 *
 * @property User $user
 */
class Qualification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qualification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'institution', 'date_of_completion', 'date_of_start', 'major', 'remarks', 'user_id'], 'required'],
            [['date_of_completion', 'date_of_start'], 'safe'],
            [['remarks'], 'string'],
            [['user_id'], 'integer'],
            [['name', 'institution', 'major'], 'string', 'max' => 200],
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
            'institution' => Yii::t('app', 'Institution'),
            'date_of_completion' => Yii::t('app', 'Date Of Completion'),
            'date_of_start' => Yii::t('app', 'Date Of Start'),
            'major' => Yii::t('app', 'Major'),
            'remarks' => Yii::t('app', 'Remarks'),
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
