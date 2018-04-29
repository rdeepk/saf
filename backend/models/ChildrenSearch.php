<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Children;

/**
 * ChildrenSearch represents the model behind the search form of `common\models\Children`.
 */
class ChildrenSearch extends Children
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'grade', 'father_id', 'mother_id', 'district', 'phone_no', 'water_filter_year', 'wash_year', 'field_officer_id', 'year_graduated', 'sponsered', 'sponser_id', 'school_id', 'created_at', 'updated_at'], 'integer'],
            [['code', 'old_code', 'name', 'gender', 'race', 'city', 'approval_date', 'sponsership_start_date', 'notes', 'medical_aid'], 'safe'],
            [['gpa', 'yearly_school_fee'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Children::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'grade' => $this->grade,
            'gpa' => $this->gpa,
            'father_id' => $this->father_id,
            'mother_id' => $this->mother_id,
            'district' => $this->district,
            'phone_no' => $this->phone_no,
            'approval_date' => $this->approval_date,
            'sponsership_start_date' => $this->sponsership_start_date,
            'yearly_school_fee' => $this->yearly_school_fee,
            'water_filter_year' => $this->water_filter_year,
            'wash_year' => $this->wash_year,
            'field_officer_id' => $this->field_officer_id,
            'year_graduated' => $this->year_graduated,
            'sponsered' => $this->sponsered,
            'sponser_id' => $this->sponser_id,
            'school_id' => $this->school_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'old_code', $this->old_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'race', $this->race])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'medical_aid', $this->medical_aid]);

        return $dataProvider;
    }
}
