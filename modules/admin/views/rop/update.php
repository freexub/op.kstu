<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rop */

$this->title = 'Update Rop: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
