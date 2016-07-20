<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property integer $contact_type_id
 * @property string $value
 * @property integer $user_id
 *
 * @property ContactType $contactType
 * @property User $user
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_type_id', 'value', 'user_id'], 'required'],
            [['contact_type_id', 'user_id'], 'integer'],
            [['value'], 'string', 'max' => 200],
            [['contact_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ContactType::className(), 'targetAttribute' => ['contact_type_id' => 'id']],
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
            'contact_type_id' => Yii::t('app', 'Contact Type ID'),
            'value' => Yii::t('app', 'Value'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactType()
    {
        return $this->hasOne(ContactType::className(), ['id' => 'contact_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
