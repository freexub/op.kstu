<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GroupEduProgram */

$this->title = 'Create Group Edu Program';
$this->params['breadcrumbs'][] = ['label' => 'Group Edu Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="group-edu-program-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
