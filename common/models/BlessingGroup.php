<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blessing_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $year
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
            [['name', 'year'], 'required'],
            [['name'], 'string'],
            [['year'], 'safe'],
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
            'year' => Yii::t('app', 'Year'),
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
