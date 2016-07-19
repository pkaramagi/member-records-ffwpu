<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "relationship".
 *
 * @property integer $id
 * @property integer $relationship_type_id
 * @property string $name
 * @property string $remarks
 * @property integer $user_id
 * @property integer $related_user_id
 *
 * @property RelationshipType $relationshipType
 * @property User $user
 */
class Relationship extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relationship';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relationship_type_id', 'name', 'remarks', 'user_id', 'related_user_id'], 'required'],
            [['relationship_type_id', 'user_id', 'related_user_id'], 'integer'],
            [['remarks'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['relationship_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RelationshipType::className(), 'targetAttribute' => ['relationship_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'relationship_type_id' => Yii::t('app', 'Relationship Type ID'),
            'name' => Yii::t('app', 'Name'),
            'remarks' => Yii::t('app', 'Remarks'),
            'user_id' => Yii::t('app', 'User ID'),
            'related_user_id' => Yii::t('app', 'Related User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationshipType()
    {
        return $this->hasOne(RelationshipType::className(), ['id' => 'relationship_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
