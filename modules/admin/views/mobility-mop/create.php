<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MobilityMop */

$this->title = 'Create Mobility Mop';
$this->params['breadcrumbs'][] = ['label' => 'Mobility Mops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobility-mop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
