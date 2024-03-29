<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingDirection */

$this->title = 'Create Training Direction';
$this->params['breadcrumbs'][] = ['label' => 'Training Directions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-direction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
