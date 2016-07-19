<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "foreign_languages".
 *
 * @property integer $id
 * @property string $name
 *
 * @property MemberForeignLanguage[] $memberForeignLanguages
 * @property User[] $users
 */
class ForeignLanguages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'foreign_languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
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
    public function getMemberForeignLanguages()
    {
        return $this->hasMany(MemberForeignLanguage::className(), ['foreign_langauge_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('member_foreign_language', ['foreign_langauge_id' => 'id']);
    }
}
