<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Contact[] $contacts
 */
class ContactType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
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
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['contact_type_id' => 'id']);
    }

    /**
     * Get all contacts
     * @param boolean $arr
     * @return array | \yii\db\ActiveQuery
     */
    public static function getContactTypes($arr=false){
        if($arr){
            return \yii\helpers\ArrayHelper::map(static::find()->all() ,'id','name');
        }
        return static::find()->all();
    }
}
