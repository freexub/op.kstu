<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\expert\models\ProgramsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'eduProgramName') ?>

    <?= $form->field($model, 'regNumber') ?>

    <?= $form->field($model, 'universityId') ?>

    <?= $form->field($model, 'eduArea') ?>

    <?php // echo $form->field($model, 'trainingDirections') ?>

    <?php // echo $form->field($model, 'groupEduProgram') ?>

    <?php // echo $form->field($model, 'eduGoalName') ?>

    <?php // echo $form->field($model, 'eduType') ?>

    <?php // echo $form->field($model, 'levelNrk') ?>

    <?php // echo $form->field($model, 'levelOrk') ?>

    <?php // echo $form->field($model, 'distinctType') ?>

    <?php // echo $form->field($model, 'universityPartner') ?>

    <?php // echo $form->field($model, 'creditsCount') ?>

    <?php // echo $form->field($model, 'academicDegree') ?>

    <?php // echo $form->field($model, 'trainingPeriod') ?>

    <?php // echo $form->field($model, 'licenseNumber') ?>

    <?php // echo $form->field($model, 'dateCreate') ?>

    <?php // echo $form->field($model, 'dateUpdate') ?>

    <?php // echo $form->field($model, 'statusId') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
