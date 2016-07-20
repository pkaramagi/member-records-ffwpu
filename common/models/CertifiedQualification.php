<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "certified_qualification".
 *
 * @property integer $id
 * @property string $name
 * @property string $certification_institution
 * @property string $date
 * @property integer $user_id
 * @property string $remarks
 *
 * @property User $user
 */
class CertifiedQualification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certified_qualification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'certification_institution', 'date', 'user_id', 'remarks'], 'required'],
            [['date'], 'safe'],
            [['user_id'], 'integer'],
            [['remarks'], 'string'],
            [['name', 'certification_institution'], 'string', 'max' => 200],
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
            'certification_institution' => Yii::t('app', 'Certification Institution'),
            'date' => Yii::t('app', 'Date'),
            'user_id' => Yii::t('app', 'User ID'),
            'remarks' => Yii::t('app', 'Remarks'),
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
