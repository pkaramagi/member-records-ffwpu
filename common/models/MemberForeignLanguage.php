<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_foreign_language".
 *
 * @property integer $user_id
 * @property integer $foreign_langauge_id
 *
 * @property ForeignLanguages $foreignLangauge
 * @property User $user
 */
class MemberForeignLanguage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_foreign_language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'foreign_langauge_id'], 'required'],
            [['user_id', 'foreign_langauge_id'], 'integer'],
            [['foreign_langauge_id'], 'exist', 'skipOnError' => true, 'targetClass' => ForeignLanguages::className(), 'targetAttribute' => ['foreign_langauge_id' => 'id']],
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
            'foreign_langauge_id' => Yii::t('app', 'Foreign Langauge ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForeignLangauge()
    {
        return $this->hasOne(ForeignLanguages::className(), ['id' => 'foreign_langauge_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
