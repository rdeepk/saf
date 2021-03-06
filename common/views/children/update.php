<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Children */

$this->title = 'Update Children: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Childrens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="children-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
