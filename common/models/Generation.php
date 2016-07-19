<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "generation".
 *
 * @property integer $id
 * @property string $name
 *
 * @property User[] $users
 */
class Generation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'generation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
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
        return $this->hasMany(User::className(), ['generation_id' => 'id']);
    }
    /**
     * Returns a list of generations
     * @param boolean $arr
     * @return array | \yii\db\Query
    */
    public static function getGenerations($arr=false){
        //check if array is enabled
        if($arr){
            return \yii\helpers\ArrayHelper::map(static::find()->all(), 'id','name');
        }
        return static::find()->all();
    }


}
