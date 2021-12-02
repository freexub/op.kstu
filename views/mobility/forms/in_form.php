<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\MobilityIn */
?>

<div class="add-form">
    <div class="panel panel-default">
        <div class="panel-heading"><h1>Форма подачи заявки</h1></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">

                    <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'firstName')->textInput(["placeholder"=>"John"]) ?>

                        <?= $form->field($model, 'lastName')->textInput(["placeholder"=>"Smith"]) ?>

                        <?= $form->field($model, 'sex')
                            ->radioList(
                                [
                                    '1'=>'Женский',
                                    '2'=>'Мужской',
                                ],
                                [
                                    'class' => 'form-control input-lg',
                                    'item' => function($index, $label, $name, $checked, $value) {

                                        $return = '<label class="modal-radio" style="padding-left:20%">';
                                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                                        $return .= '<i></i>';
                                        $return .= '<span> ' . ucwords($label) . '</span>';
                                        $return .= '</label>';

                                        return $return;
                                    }
                                ]
                            )?>

                        <?= $form->field($model, 'homeUniver')->textInput(["placeholder"=>"http://"]) ?>

                        <?= $form->field($model, 'department')->textInput(["placeholder"=>"Faculty of Information Technology"]) ?>

                        <?= $form->field($model, 'major')->textInput() ?>

                        <?= $form->field($model, 'course')
                            ->radioList(
                                [
                                    '1'=>'1 курс',
                                    '2'=>'2 курс',
                                    '3'=>'3 курс',
                                    '4'=>'4 курс',
                                    '5'=>'5 курс',
                                ],
                                [
                                    'class' => 'form-control input-lg',
                                    'item' => function($index, $label, $name, $checked, $value) {

                                        $return = '<label class="modal-radio" style="padding-left:5%">';
                                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '" tabindex="3">';
                                        $return .= '<i></i>';
                                        $return .= '<span> ' . ucwords($label) . '</span>';
                                        $return .= '</label>';

                                        return $return;
                                    }
                                ]
                            )?>

                        <?= $form->field($model, 'reason')->textInput(["placeholder"=>"State the reason"]) ?>

                        <?= $form->field($model, 'email')->textInput(["placeholder"=>"hello@gmail.com"]) ?>

                        <?= $form->field($model, 'phone')->textInput(["placeholder"=>"+7 777 777 77 77"]) ?>


                        <div class="form-group">
                            <?= Html::submitButton('Отправить заявку', ['class' => 'btn btn-success']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>



</div>
