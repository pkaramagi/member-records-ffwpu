<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "workshop_type".
 *
 * @property integer $id
 * @property integer $type
 *
 * @property Workshop[] $workshops
 */
class WorkshopType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workshop_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'integer'],
            [['type'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshops()
    {
        return $this->hasMany(Workshop::className(), ['workshop_type_id' => 'id']);
    }

    /**
     * Returns an array or activeQuery object of workshoptypes
     * @param $arr
     * @return array | \yii\db\ActiveQuery
     */
    public static function getWorkshopTypes($arr=false){
        if($arr){
            return ArrayHelper::map(static::find()->all(),'id','name');
        }
        return static::find()->all();
    }
}
