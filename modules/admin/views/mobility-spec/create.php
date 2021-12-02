<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MobilitySpec */

$this->title = 'Create Mobility Spec';
$this->params['breadcrumbs'][] = ['label' => 'Mobility Specs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobility-spec-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
