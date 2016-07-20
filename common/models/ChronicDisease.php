<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "chronic_disease".
 *
 * @property integer $id
 * @property integer $name
 *
 * @property MemberChronicDiseases[] $memberChronicDiseases
 * @property User[] $users
 */
class ChronicDisease extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chronic_disease';
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
    public function getMemberChronicDiseases()
    {
        return $this->hasMany(MemberChronicDiseases::className(), ['chronic_disease_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('member_chronic_diseases', ['chronic_disease_id' => 'id']);
    }
}
