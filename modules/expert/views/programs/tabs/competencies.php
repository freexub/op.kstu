<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Rop */
/* @var $competencies app\models\Competencies */
/* @var $dataProviders yii\data\ActiveDataProvider */

?>


<div class="rop-view" style="margin-top:20px;">

    <div class="row" >
        <div class="col-lg-12" style="margin-bottom:20px;">
        <?php echo Html::a('<span class="fa fa-plus"></span> Добавить компетенцию',
            [
                'competencies-add',
                'id' => $model->id,
            ],
            [
                'class'=>'btn btn-success pull-right',
                'title' =>'Добавить компетенцию',
                'data-toggle'=>'modal',
                'data-target'=>'#add',
            ]
        ); ?>
        </div>
    </div>

    <div class="clearfix"></div>
    <?php
        foreach ($competencies as $competence){
    ?>
                <div class="card">
                    <h5 class="card-header h5">
                        <?= '<small>#'.$competence->id.' / </small>'?>
                        <?= '<strong>'.$competence->name.'</strong>'?>
                        <?=Html::a('<span class="fa fa-plus"></span>',
                            [
                                'learning-result-add',
                                'id' => $competence->id,
                                'rop_id' => $_GET['id'],
                            ],
                            [
                                'class'=>'btn btn-xl btn-success float-right',
                                'data-toggle'=>'modal',
                                'title'=>'Добавить результат обучения',
                                'data-target'=>'#modal'.$competence->id,
                            ]
                        )?>
                    </h5>
                    <div class="card-body">
                    <?= GridView::widget([
                        'dataProvider' => $dataProviders[$competence->id],
                        'summary' => false,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name',
                            [
                                //                    'label' => 'Удалить',
                                #'visible' => Yii::$app->user->can('admin'),
                                'format' => 'raw',
                                'options' => ['width' => '65'],
                                'value' => function($data) use ($rop_id){
                                    $class = '';
                                    if ($data->status == 0){
                                        $class ='btn btn-danger btn-xl fa fa-remove-sign';
                                    }
                                    if ($data->status == 1){
                                        $class ='btn btn-info btn-xl fa fa-ok-circle';
                                    }
                                    return Html::a('<span class="'.$class.'">1</span>',
                                        [
                                            'learning-result-status',
                                            'id' => $data->id,
                                            'rop_id' => $rop_id
                                        ]
                                    //                            [
                                    ////                                'class'=>'pull-right',
                                    //                                'data-toggle'=>'modal',
                                    //                                'data-target'=>'#modal'.($data->id),
                                    //                            ]
                                    );
                                }
                            ],
                            //                [
                            //                    'label' => 'Добавить',
                            //                    #'visible' => Yii::$app->user->can('admin'),
                            //                    'format' => 'raw',
                            //                    'options' => ['width' => '50'],
                            //                    'value' => function($data){
                            //                        return Html::a('<span class="btn btn-default glyphicon glyphicon-plus"></span>',
                            //                            [
                            //                                'learning-result-add',
                            //                                'id' => $data->id,
                            //                                'rop_id' => $_GET['id'],
                            //                            ],
                            //                            [
                            //                                'data-toggle'=>'modal',
                            //                                'data-target'=>'#modal'.($data->id),
                            //                            ]
                            //                        );
                            //                    }
                            //                ],

                            //            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);?>
                    </div>
                </div>

    <?php } ?>

</div>


