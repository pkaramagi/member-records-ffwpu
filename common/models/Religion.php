<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "religion".
 *
 * @property integer $id
 * @property string $name
 *
 * @property User[] $users
 */
class Religion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'religion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
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
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['religion_id' => 'id']);
    }

    /**
     * Returns Religion objects
     * @return \yii\activeQuery -> Religions
     * */
    public static function getReligions(){
        return static::find()->all();
    }

    /**
    * Returns Religion Array helper
    *  @return \yii\helpers\ArrayHelper
    * */
    public static function getReligionsArray(){
        return \yii\helpers\ArrayHelper::map(static::find()->all(),'id','name');
    }


}
