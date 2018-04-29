<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ChildrenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="children-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'old_code') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'race') ?>

    <?php // echo $form->field($model, 'grade') ?>

    <?php // echo $form->field($model, 'gpa') ?>

    <?php // echo $form->field($model, 'father_id') ?>

    <?php // echo $form->field($model, 'mother_id') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'phone_no') ?>

    <?php // echo $form->field($model, 'approval_date') ?>

    <?php // echo $form->field($model, 'sponsership_start_date') ?>

    <?php // echo $form->field($model, 'yearly_school_fee') ?>

    <?php // echo $form->field($model, 'water_filter_year') ?>

    <?php // echo $form->field($model, 'wash_year') ?>

    <?php // echo $form->field($model, 'field_officer_id') ?>

    <?php // echo $form->field($model, 'year_graduated') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'medical_aid') ?>

    <?php // echo $form->field($model, 'sponsered') ?>

    <?php // echo $form->field($model, 'sponser_id') ?>

    <?php // echo $form->field($model, 'school_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
