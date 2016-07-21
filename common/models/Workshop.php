<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workshop".
 *
 * @property integer $id
 * @property integer $workshop_type_id
 * @property string $title
 * @property string $theme
 * @property string $location
 * @property string $date_started
 * @property string $date_end
 * @property string $details
 *
 * @property MemberWorkshopAttendance[] $memberWorkshopAttendances
 * @property User[] $users
 * @property WorkshopType $workshopType
 */
class Workshop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workshop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['workshop_type_id', 'title', 'theme', 'location', 'date_started', 'date_end', 'details'], 'required'],
            [['workshop_type_id'], 'integer'],
            [['date_started', 'date_end'], 'safe'],
            [['details','theme'], 'string'],
            [['title', 'location'], 'string', 'max' => 200],
            [['workshop_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkshopType::className(), 'targetAttribute' => ['workshop_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'workshop_type_id' => Yii::t('app', 'Workshop Type ID'),
            'title' => Yii::t('app', 'Title'),
            'theme' => Yii::t('app', 'Theme'),
            'location' => Yii::t('app', 'Location'),
            'date_started' => Yii::t('app', 'Date Started'),
            'date_end' => Yii::t('app', 'Date End'),
            'details' => Yii::t('app', 'Details'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberWorkshopAttendances()
    {
        return $this->hasMany(MemberWorkshopAttendance::className(), ['workshop_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('member_workshop_attendance', ['workshop_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshopType()
    {
        return $this->hasOne(WorkshopType::className(), ['id' => 'workshop_type_id']);
    }
}
