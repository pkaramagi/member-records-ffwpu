<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $username
 * @property string $nationality
 * @property integer $blessing_group_id
 * @property string $date_of_birth
 * @property string $spiritual_date_of_birth
 * @property string $spiritual_parent
 * @property string $passport
 * @property string $picture
 * @property string $joined_at
 * @property string $sex
 * @property integer $religion_id
 * @property integer $generation_id
 *
 * @property Address[] $addresses
 * @property Award[] $awards
 * @property CertifiedQualification[] $certifiedQualifications
 * @property Contact[] $contacts
 * @property Credentials $credentials
 * @property Donation[] $donations
 * @property GeneralCareerRecord[] $generalCareerRecords
 * @property MemberChronicDiseases[] $memberChronicDiseases
 * @property ChronicDisease[] $chronicDiseases
 * @property MemberForeignLanguage[] $memberForeignLanguages
 * @property ForeignLanguages[] $foreignLangauges
 * @property MemberWorkshopAttendance[] $memberWorkshopAttendances
 * @property Workshop[] $workshops
 * @property Punishment[] $punishments
 * @property Qualification[] $qualifications
 * @property Relationship[] $relationships
 * @property UnificationCareerRecord[] $unificationCareerRecords
 * @property Generation $generation
 * @property Religion $religion
 * @property BlessingGroup $blessingGroup
 */
class AppUser extends \yii\db\ActiveRecord
{
    /**
     * @const NATIONALITIES
     */

    const NATIONALITIES  = array("Afghan" =>"Afghan","Albanian" =>"Albanian","Algerian" =>"Algerian","American" =>"American","Andorran" =>"Andorran","Angolan" =>"Angolan","Antiguans" =>"Antiguans","Argentinean" =>"Argentinean","Armenian" =>"Armenian","Australian" =>"Australian","Austrian" =>"Austrian","Azerbaijani" =>"Azerbaijani","Bahamian" =>"Bahamian","Bahraini" =>"Bahraini","Bangladeshi" =>"Bangladeshi","Barbadian" =>"Barbadian","Barbudans" =>"Barbudans","Batswana" =>"Batswana","Belarusian" =>"Belarusian","Belgian" =>"Belgian","Belizean" =>"Belizean","Beninese" =>"Beninese","Bhutanese" =>"Bhutanese","Bolivian" =>"Bolivian","Bosnian" =>"Bosnian","Brazilian" =>"Brazilian","British" =>"British","Bruneian" =>"Bruneian","Bulgarian" =>"Bulgarian","Burkinabe" =>"Burkinabe","Burmese" =>"Burmese","Burundian" =>"Burundian","Cambodian" =>"Cambodian","Cameroonian" =>"Cameroonian","Canadian" =>"Canadian","Cape Verdean" =>"Cape Verdean","Central African" =>"Central African","Chadian" =>"Chadian","Chilean" =>"Chilean","Chinese" =>"Chinese","Colombian" =>"Colombian","Comoran" =>"Comoran","Congolese" =>"Congolese","Costa Rican" =>"Costa Rican","Croatian" =>"Croatian","Cuban" =>"Cuban","Cypriot" =>"Cypriot","Czech" =>"Czech","Danish" =>"Danish","Djibouti" =>"Djibouti","Dominican" =>"Dominican","Dutch" =>"Dutch","East Timorese" =>"East Timorese","Ecuadorean" =>"Ecuadorean","Egyptian" =>"Egyptian","Emirian" =>"Emirian","Equatorial Guinean" =>"Equatorial Guinean","Eritrean" =>"Eritrean","Estonian" =>"Estonian","Ethiopian" =>"Ethiopian","Fijian" =>"Fijian","Filipino" =>"Filipino","Finnish" =>"Finnish","French" =>"French","Gabonese" =>"Gabonese","Gambian" =>"Gambian","Georgian" =>"Georgian","German" =>"German","Ghanaian" =>"Ghanaian","Greek" =>"Greek","Grenadian" =>"Grenadian","Guatemalan" =>"Guatemalan","Guinea-Bissauan" =>"Guinea-Bissauan","Guinean" =>"Guinean","Guyanese" =>"Guyanese","Haitian" =>"Haitian","Herzegovinian" =>"Herzegovinian","Honduran" =>"Honduran","Hungarian" =>"Hungarian","I-Kiribati" =>"I-Kiribati","Icelander" =>"Icelander","Indian" =>"Indian","Indonesian" =>"Indonesian","Iranian" =>"Iranian","Iraqi" =>"Iraqi","Irish" =>"Irish","Israeli" =>"Israeli","Italian" =>"Italian","Ivorian" =>"Ivorian","Jamaican" =>"Jamaican","Japanese" =>"Japanese","Jordanian" =>"Jordanian","Kazakhstani" =>"Kazakhstani","Kenyan" =>"Kenyan","Kittian and Nevisian" =>"Kittian and Nevisian","Kuwaiti" =>"Kuwaiti","Kyrgyz" =>"Kyrgyz","Laotian" =>"Laotian","Latvian" =>"Latvian","Lebanese" =>"Lebanese","Liberian" =>"Liberian","Libyan" =>"Libyan","Liechtensteiner" =>"Liechtensteiner","Lithuanian" =>"Lithuanian","Luxembourger" =>"Luxembourger","Macedonian" =>"Macedonian","Malagasy" =>"Malagasy","Malawian" =>"Malawian","Malaysian" =>"Malaysian","Maldivan" =>"Maldivan","Malian" =>"Malian","Maltese" =>"Maltese","Marshallese" =>"Marshallese","Mauritanian" =>"Mauritanian","Mauritian" =>"Mauritian","Mexican" =>"Mexican","Micronesian" =>"Micronesian","Moldovan" =>"Moldovan","Monacan" =>"Monacan","Mongolian" =>"Mongolian","Moroccan" =>"Moroccan","Mosotho" =>"Mosotho","Motswana" =>"Motswana","Mozambican" =>"Mozambican","Namibian" =>"Namibian","Nauruan" =>"Nauruan","Nepalese" =>"Nepalese","New Zealander" =>"New Zealander","Nicaraguan" =>"Nicaraguan","Nigerian" =>"Nigerian","Nigerien" =>"Nigerien","North Korean" =>"North Korean","Northern Irish" =>"Northern Irish","Norwegian" =>"Norwegian","Omani" =>"Omani","Pakistani" =>"Pakistani","Palauan" =>"Palauan","Panamanian" =>"Panamanian","Papua New Guinean" =>"Papua New Guinean","Paraguayan" =>"Paraguayan","Peruvian" =>"Peruvian","Polish" =>"Polish","Portuguese" =>"Portuguese","Qatari" =>"Qatari","Romanian" =>"Romanian","Russian" =>"Russian","Rwandan" =>"Rwandan","Saint Lucian" =>"Saint Lucian","Salvadoran" =>"Salvadoran","Samoan" =>"Samoan","San Marinese" =>"San Marinese","Sao Tomean" =>"Sao Tomean","Saudi" =>"Saudi","Scottish" =>"Scottish","Senegalese" =>"Senegalese","Serbian" =>"Serbian","Seychellois" =>"Seychellois","Sierra Leonean" =>"Sierra Leonean","Singaporean" =>"Singaporean","Slovakian" =>"Slovakian","Slovenian" =>"Slovenian","Solomon Islander" =>"Solomon Islander","Somali" =>"Somali","South African" =>"South African","South Korean" =>"South Korean","Spanish" =>"Spanish","Sri Lankan" =>"Sri Lankan","Sudanese" =>"Sudanese","Surinamer" =>"Surinamer","Swazi" =>"Swazi","Swedish" =>"Swedish","Swiss" =>"Swiss","Syrian" =>"Syrian","Taiwanese" =>"Taiwanese","Tajik" =>"Tajik","Tanzanian" =>"Tanzanian","Thai" =>"Thai","Togolese" =>"Togolese","Tongan" =>"Tongan","Trinidadian/Tobagonian" =>"Trinidadian/Tobagonian","Tunisian" =>"Tunisian","Turkish" =>"Turkish","Tuvaluan" =>"Tuvaluan","Ugandan" =>"Ugandan","Ukrainian" =>"Ukrainian","Uruguayan" =>"Uruguayan","Uzbekistani" =>"Uzbekistani","Venezuelan" =>"Venezuelan","Vietnamese" =>"Vietnamese","Welsh" =>"Welsh","Yemenite" =>"Yemenite","Zambian" =>"Zambian","Zimbabwean" =>"Zimbabwean");


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'middle_name', 'last_name', 'username', 'nationality', 'blessing_group_id', 'date_of_birth', 'spiritual_date_of_birth', 'spiritual_parent', 'passport', 'picture', 'joined_at', 'sex', 'religion_id', 'generation_id'], 'required'],
            [['blessing_group_id', 'religion_id', 'generation_id'], 'integer'],
            [['date_of_birth', 'spiritual_date_of_birth'], 'safe'],
            [['first_name', 'middle_name', 'last_name', 'username', 'nationality', 'passport', 'picture', 'joined_at'], 'string', 'max' => 200],
            [['spiritual_parent'], 'string', 'max' => 100],
            [['sex'], 'string', 'max' => 1],
            [['generation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Generation::className(), 'targetAttribute' => ['generation_id' => 'id']],
            [['religion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Religion::className(), 'targetAttribute' => ['religion_id' => 'id']],
            [['blessing_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => BlessingGroup::className(), 'targetAttribute' => ['blessing_group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'username' => Yii::t('app', 'Username'),
            'nationality' => Yii::t('app', 'Nationality'),
            'blessing_group_id' => Yii::t('app', 'Blessing Group ID'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'spiritual_date_of_birth' => Yii::t('app', 'Spiritual Date Of Birth'),
            'spiritual_parent' => Yii::t('app', 'Spiritual Parent'),
            'passport' => Yii::t('app', 'Passport'),
            'picture' => Yii::t('app', 'Picture'),
            'joined_at' => Yii::t('app', 'Joined At'),
            'sex' => Yii::t('app', 'Sex'),
            'religion_id' => Yii::t('app', 'Religion ID'),
            'generation_id' => Yii::t('app', 'Generation ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAwards()
    {
        return $this->hasMany(Award::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCertifiedQualifications()
    {
        return $this->hasMany(CertifiedQualification::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contact::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCredentials()
    {
        return $this->hasOne(Credentials::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donation::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralCareerRecords()
    {
        return $this->hasMany(GeneralCareerRecord::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberChronicDiseases()
    {
        return $this->hasMany(MemberChronicDiseases::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChronicDiseases()
    {
        return $this->hasMany(ChronicDisease::className(), ['id' => 'chronic_disease_id'])->viaTable('member_chronic_diseases', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberForeignLanguages()
    {
        return $this->hasMany(MemberForeignLanguage::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForeignLangauges()
    {
        return $this->hasMany(ForeignLanguages::className(), ['id' => 'foreign_langauge_id'])->viaTable('member_foreign_language', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberWorkshopAttendances()
    {
        return $this->hasMany(MemberWorkshopAttendance::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshops()
    {
        return $this->hasMany(Workshop::className(), ['id' => 'workshop_id'])->viaTable('member_workshop_attendance', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPunishments()
    {
        return $this->hasMany(Punishment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQualifications()
    {
        return $this->hasMany(Qualification::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelationships()
    {
        return $this->hasMany(Relationship::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnificationCareerRecords()
    {
        return $this->hasMany(UnificationCareerRecord::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneration()
    {
        return $this->hasOne(Generation::className(), ['id' => 'generation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReligion()
    {
        return $this->hasOne(Religion::className(), ['id' => 'religion_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlessingGroup()
    {
        return $this->hasOne(BlessingGroup::className(), ['id' => 'blessing_group_id']);
    }
}
