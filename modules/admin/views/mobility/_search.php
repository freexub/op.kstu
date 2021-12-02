<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\MobilitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobility-in-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'firstName') ?>

    <?= $form->field($model, 'lastName') ?>

    <?= $form->field($model, 'specialityId') ?>

    <?= $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'homeUniver') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'major') ?>

    <?php // echo $form->field($model, 'course') ?>

    <?php // echo $form->field($model, 'reason') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
