<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "organisation".
 *
 * @property integer $id
 * @property integer $name
 *
 * @property UnificationCareerRecord[] $unificationCareerRecords
 */
class Organisation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organisation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
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
    public function getUnificationCareerRecords()
    {
        return $this->hasMany(UnificationCareerRecord::className(), ['organisation_id' => 'id']);
    }

    /**
     * @param boolean $arr
     * @return array | \yii\db\ActiveQuery
     */
    public static function getOrganisations($arr){
        if($arr){
            return \yii\helpers\ArrayHelper::map(static::find()->all(),'id','name');
        }
        else{
            return static::find()->all();
        }
    }
}
