<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EduArea */

$this->title = 'Create Edu Area';
$this->params['breadcrumbs'][] = ['label' => 'Edu Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
