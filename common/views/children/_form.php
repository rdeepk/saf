<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Children */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="children-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'female' => 'Female', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'race')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade')->textInput() ?>

    <?= $form->field($model, 'gpa')->textInput() ?>

    <?= $form->field($model, 'father_id')->textInput() ?>

    <?= $form->field($model, 'mother_id')->textInput() ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district')->textInput() ?>

    <?= $form->field($model, 'phone_no')->textInput() ?>

    <?= $form->field($model, 'approval_date')->textInput() ?>

    <?= $form->field($model, 'sponsership_start_date')->textInput() ?>

    <?= $form->field($model, 'yearly_school_fee')->textInput() ?>

    <?= $form->field($model, 'water_filter_year')->textInput() ?>

    <?= $form->field($model, 'wash_year')->textInput() ?>

    <?= $form->field($model, 'field_officer_id')->textInput() ?>

    <?= $form->field($model, 'year_graduated')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'medical_aid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sponsered')->textInput() ?>

    <?= $form->field($model, 'sponser_id')->textInput() ?>

    <?= $form->field($model, 'school_id')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
