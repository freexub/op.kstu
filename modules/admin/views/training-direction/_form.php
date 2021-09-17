<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\TrainingDirection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="training-direction-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'ea_id')->dropDownList(ArrayHelper::map(app\models\EduArea::find()->asArray()->all(), 'id', 'name'),[
        'prompt' => 'Выберите ...',
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
