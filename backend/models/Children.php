<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "children".
 *
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property string $old_code
 * @property string $name
 * @property string $gender
 * @property string $race
 * @property int $grade
 * @property double $gpa
 * @property int $father_id
 * @property int $mother_id
 * @property string $city
 * @property int $district
 * @property int $phone_no
 * @property string $approval_date
 * @property string $sponsership_start_date
 * @property double $yearly_school_fee
 * @property int $water_filter_year
 * @property int $wash_year
 * @property int $field_officer_id
 * @property int $year_graduated
 * @property string $notes
 * @property string $medical_aid
 * @property int $sponsered
 * @property int $sponser_id
 * @property int $school_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Children extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'children';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'code', 'old_code', 'name', 'grade', 'city', 'district', 'sponsered', 'school_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'grade', 'father_id', 'mother_id', 'district', 'phone_no', 'water_filter_year', 'wash_year', 'field_officer_id', 'year_graduated', 'sponsered', 'sponser_id', 'school_id', 'created_at', 'updated_at'], 'integer'],
            [['gender', 'notes'], 'string'],
            [['gpa', 'yearly_school_fee'], 'number'],
            [['approval_date', 'sponsership_start_date'], 'safe'],
            [['code', 'old_code', 'name', 'race', 'city', 'medical_aid'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'code' => 'Code',
            'old_code' => 'Old Code',
            'name' => 'Name',
            'gender' => 'Gender',
            'race' => 'Race',
            'grade' => 'Grade',
            'gpa' => 'Gpa',
            'father_id' => 'Father ID',
            'mother_id' => 'Mother ID',
            'city' => 'City',
            'district' => 'District',
            'phone_no' => 'Phone No',
            'approval_date' => 'Approval Date',
            'sponsership_start_date' => 'Sponsership Start Date',
            'yearly_school_fee' => 'Yearly School Fee',
            'water_filter_year' => 'Water Filter Year',
            'wash_year' => 'Wash Year',
            'field_officer_id' => 'Field Officer ID',
            'year_graduated' => 'Year Graduated',
            'notes' => 'Notes',
            'medical_aid' => 'Medical Aid',
            'sponsered' => 'Sponsered',
            'sponser_id' => 'Sponser ID',
            'school_id' => 'School ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
