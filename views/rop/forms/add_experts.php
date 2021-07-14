<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\RopExperts */
/* @var $model2 app\models\RopExperts */
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
                        'experts-add?rop_id='.$rop_id
                    ]
            ]); ?>
<!--                <div class="row">-->
                    <div class="form-group field-ropexperts-user_id required">
                        <label class="control-label" for="ropexperts-user_id">Expert 1</label>
                        <select class="form-control" aria-required="true" name="RopExperts[user1]">
                            <?php foreach ($users as $user) {?>
                                <option value="<?=$user->id?>"><?=$user->username?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group field-ropexperts-user_id required">
                        <label class="control-label" for="ropexperts-user_id">Expert 2</label>
                        <select class="form-control" aria-required="true" name="RopExperts[user2]">
                            <?php foreach ($users as $user) {?>
                                <option value="<?=$user->id?>"><?=$user->username?></option>
                            <?php }?>
                        </select>
                    </div>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                        </div>
<!--                </div>-->
            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

    </div>
</div>
