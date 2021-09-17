<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Rop */
/* @var $eduArea app\models\EduArea */
/* @var $universitys app\models\Universitys */
/* @var $form yii\widgets\ActiveForm */
/* @var $trainingDirection app\models\TrainingDirection */
/* @var $row app\models\Universitys */
?>

<div class="rop-form">
    <?php
//        var_dump($eduArea);die();
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?php
//    $a = ArrayHelper::map($row, 'id', 'id');
//    var_dump($a);die();
    echo '<label class="control-label">Provinces</label>';
        echo Select2::widget([
            'name' => 'test',
//            'data' => $data,
//            'value' => ['1'],
            'data' => ArrayHelper::map($universitys, 'id', 'shortName'),
            'value' => ArrayHelper::map($row, 'id', 'id'),
            'options' => [
                'placeholder' => 'Select provinces ...',
                'multiple' => true
            ],
            'pluginOptions' => [
                'tags' => true,
                'allowClear' => true,
                'multiple' => true
            ],
        ]);

    ?>


<hr>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
