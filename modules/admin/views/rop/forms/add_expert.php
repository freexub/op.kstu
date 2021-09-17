<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\RopExperts */
/* @var $form yii\widgets\ActiveForm */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $users app\models\User */
?>

<div class="expert-form">
    <div class="row">

        <div class="col-md-12" style="margin-left: 20px">
            <h3>Добавление эксперта</h3>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-11" style="margin-left: 20px">
            <?php
            $form = ActiveForm::begin([
                    'action'=>[
                        'expert-add?rop_id='.$rop_id
                    ]
            ]); ?>
                    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map($users, 'id', 'username')) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                    </div>
            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

    </div>
</div>
