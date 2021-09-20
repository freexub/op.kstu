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
?>

<div class="rop-form">
    <?php
//        var_dump($eduArea);die();
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'eduProgramName')->textInput() ?>

    <?= $form->field($model, 'universityId')->dropDownList(ArrayHelper::map($universitys, 'id', 'name'))?>

    <?php //echo $form->field($model, 'eduArea')->dropDownList(ArrayHelper::map($eduArea, 'id', 'name.code'),?>
    <?= $form->field($model, 'eduArea')->dropDownList($eduArea,
        [
            'prompt' => 'Выберерите область образования',
            'onchange' => '
                  $.post(
                    "' . Url::toRoute('get-training-direction') . '", 
                    {id: $(this).val()}, 
                    function(data){
                      $("select#rop-trainingdirections").html(data).attr("disabled", false); 
                    }
                  );
                ',
        ])?>

    <?= $form->field($model, 'trainingDirections')->dropDownList($trainingDirection,
        [
            'prompt' => 'Выберерите область образования',
            'disabled' => $model->isNewRecord ? 'disabled' : false,
            'onchange' => '
                  $.post(
                    "' . Url::toRoute('get-group-edu-program') . '", 
                    {id: $(this).val()}, 
                    function(data){
                        $("select#rop-groupeduprogram").html(data).attr("disabled", false);
                    }
                  );
                ',

        ])?>

    <?= $form->field($model, 'groupEduProgram')->dropDownList([],
        [
            'prompt' => 'Выберерите группу образовательных программ',
            'disabled' => $model->isNewRecord ? 'disabled' : false,
//            'onchange' => '
//                  $.post(
//                    "' . Url::toRoute('get-group-edu-program') . '",
//                    {id: $(this).val()},
//                    function(data){
//                      $("select#rop-trainingdirections").html(data).attr("disabled", false);
//                    }
//                  );
//                ',

        ])?>



    <?= $form->field($model, 'eduGoalName')->textInput() ?>

    <?= $form->field($model, 'levelNrk')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'levelOrk')->textInput(['type'=>'number']) ?>

    <?= $form->field($model, 'academicDegree')->textInput() ?>

    <?= $form->field($model, 'trainingPeriod')->textInput() ?>

    <?= $form->field($model, 'creditsCount')->textInput(['type'=>'number']) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
