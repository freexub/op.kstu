<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Universitys */

$this->title = 'Update Universitys: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Universitys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="universitys-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
