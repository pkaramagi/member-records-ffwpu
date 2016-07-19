<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "award".
 *
 * @property integer $id
 * @property string $name
 * @property string $issued_by
 * @property string $remarks
 * @property integer $user_id
 *
 * @property User $user
 */
class Award extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'award';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'issued_by', 'remarks', 'user_id'], 'required'],
            [['remarks'], 'string'],
            [['user_id'], 'integer'],
            [['name', 'issued_by'], 'string', 'max' => 200],
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
            'issued_by' => Yii::t('app', 'Issued By'),
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
