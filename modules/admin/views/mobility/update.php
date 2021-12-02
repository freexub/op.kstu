<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MobilityIn */

$this->title = 'Update Mobility In: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mobility Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mobility-in-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
