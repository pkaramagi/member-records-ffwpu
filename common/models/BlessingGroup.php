<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blessing_group".
 *
 * @property integer $id
 * @property integer $name
 * @property string $date
 *
 * @property User[] $users
 */
class BlessingGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blessing_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['name'], 'integer'],
            [['date'], 'safe'],
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
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['blessing_group_id' => 'id']);
    }
}
