<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupEduProgram */

$this->title = 'Update Group Edu Program: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Group Edu Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="group-edu-program-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
