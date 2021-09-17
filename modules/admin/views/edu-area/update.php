<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EduArea */

$this->title = 'Update Edu Area: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Edu Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edu-area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
