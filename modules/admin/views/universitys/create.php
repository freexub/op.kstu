<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Universitys */

$this->title = 'Create Universitys';
$this->params['breadcrumbs'][] = ['label' => 'Universitys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="universitys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
