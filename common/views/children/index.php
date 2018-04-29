<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ChildrenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Childrens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Children', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'user_id',
            'code',
            'old_code',
            'name',
            'gender',
            'race',
            'grade',
            'gpa',
            'father_id',
            'mother_id',
            'city',
            'district',
            'phone_no',
            'approval_date',
            'sponsership_start_date',
            'yearly_school_fee',
            'water_filter_year',
            'wash_year',
            'field_officer_id',
            'year_graduated',
            'notes:ntext',
            'medical_aid',
            'sponsered',
            'sponser_id',
            'school_id',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
