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
            [['name'], 'integer'],
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
}
