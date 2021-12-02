<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MobilityIn */

$this->title = 'Create Mobility In';
$this->params['breadcrumbs'][] = ['label' => 'Mobility Ins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobility-in-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
