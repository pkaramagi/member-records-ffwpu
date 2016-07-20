<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "relationship_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Relationship[] $relationships
 */
class RelationshipType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relationship_type';
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
    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['relationship_type_id' => 'id']);
    }

    /**
     * returns an array or a yii active Query of relationship types
     * @param boolean $arr
     * @return array | \yii\db\ActiveQuery
     */
    public static function getRelationshipTypes($arr=false){
        if($arr){
            return \yii\helpers\ArrayHelper::map(static::find()->all(),'id','item');
        }
        return static::find()->all();
    }
}
