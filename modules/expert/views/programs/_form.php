<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\expert\models\Programs */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="programs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eduProgramName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'regNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'universityId')->textInput() ?>

    <?= $form->field($model, 'eduArea')->textInput() ?>

    <?= $form->field($model, 'trainingDirections')->textInput() ?>

    <?= $form->field($model, 'groupEduProgram')->textInput() ?>

    <?= $form->field($model, 'eduGoalName')->textInput() ?>

    <?= $form->field($model, 'eduType')->textInput() ?>

    <?= $form->field($model, 'levelNrk')->textInput() ?>

    <?= $form->field($model, 'levelOrk')->textInput() ?>

    <?= $form->field($model, 'distinctType')->textInput() ?>

    <?= $form->field($model, 'universityPartner')->textInput() ?>

    <?= $form->field($model, 'creditsCount')->textInput() ?>

    <?= $form->field($model, 'academicDegree')->textInput() ?>

    <?= $form->field($model, 'trainingPeriod')->textInput() ?>

    <?= $form->field($model, 'licenseNumber')->textInput() ?>

    <?= $form->field($model, 'dateCreate')->textInput() ?>

    <?= $form->field($model, 'dateUpdate')->textInput() ?>

    <?= $form->field($model, 'statusId')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
