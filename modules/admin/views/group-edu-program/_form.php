<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\GroupEduProgram */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="group-edu-program-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'td_id')->dropDownList(ArrayHelper::map(app\models\TrainingDirection::find()->asArray()->all(), 'id', 'name'),[
        'prompt' => 'Выберите ...',
    ])  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
