<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RopSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $eduArea app\models\EduArea */
/* @var $universitys app\models\Universitys */
/* @var $form yii\widgets\ActiveForm */
/* @var $trainingDirection app\models\TrainingDirection */
?>

<div class="rop-search">

    <?php $form = ActiveForm::begin([
        'action' => ['top'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'eduProgramName')->textInput() ?>

            <?= $form->field($model, 'universityId')->dropDownList(ArrayHelper::map($universitys, 'id', 'name'))?>

            <?= $form->field($model, 'eduArea')->dropDownList($eduArea,
                [
                    'prompt' => 'Выберерите область образования',
                    'onchange' => '
                          $.post(
                            "' . Url::toRoute('get-training-direction') . '", 
                            {id: $(this).val()}, 
                            function(data){
                              $("select#topsearch-trainingdirections").html(data).attr("disabled", false); 
                            }
                          );
                        ',
                ])?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'trainingDirections')->dropDownList($trainingDirection,
                [
                    'prompt' => 'Выберерите область образования',
                    'disabled' => !isset($_GET['TopSearch']) ? 'disabled' : false,
                    'onchange' => '
                          $.post(
                            "' . Url::toRoute('get-group-edu-program') . '", 
                            {id: $(this).val()}, 
                            function(data){
                                $("select#topsearch-groupeduprogram").html(data).attr("disabled", false);
                            }
                          );
                        ',

                ])?>

            <?= $form->field($model, 'groupEduProgram')->dropDownList([],
        [
            'prompt' => 'Выберерите группу образовательных программ',
            'disabled' => !isset($_GET['TopSearch']) ? 'disabled' : false,
        ])?>

            <div class="form-group pull-right" style="margin-top: 25px">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Reset', ['top'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
