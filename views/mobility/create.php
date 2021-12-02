<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rop */
/* @var $eduArea app\models\EduArea */
/* @var $universitys app\models\Universitys */
/* @var $trainingDirection app\models\TrainingDirection */

$this->title = 'Добавление ОП';
$this->params['breadcrumbs'][] = ['label' => '1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('forms/in_form', [
        'model' => $model,
    ]) ?>

</div>