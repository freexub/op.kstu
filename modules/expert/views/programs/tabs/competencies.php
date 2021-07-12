<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Rop */
/* @var $competencies app\models\Competencies */
/* @var $dataProviders yii\data\ActiveDataProvider */

?>

<div class="rop-view" style="margin-top:20px;">

    <div class="row" >
        <div class="col-lg-12" style="margin-bottom:20px;">
        <?php echo Html::a('<span class=" glyphicon glyphicon-plus"></span> Добавить компетенцию',
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
        echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">                
                    <div class="row">
                        <div class="col-sm-10"> 
                            <small>#'.$competence->id.' / </small>
                            <strong>'.$competence->name.'</strong>
                        </div>
                        <div class="col-sm-2">   
                            <span class="pull-right">
                                '.Html::a('<span class="btn btn-xl btn-success glyphicon glyphicon-plus"></span>',
                                            [
                                                'learning-result-add',
                                                'id' => $competence->id,
                                                'rop_id' => $_GET['id'],
                                            ],
                                            [
                                                'data-toggle'=>'modal',
                                                'title'=>'Добавить результат обучения',
                                                'data-target'=>'#modal'.($competence->id),
                                            ]
                                        ).'
                            </span>
                        </div>
                    </div>
                </span>
            </div>
            <div class="panel-body" style="margin-bottom:-20px; padding:0px">                
';
        echo "";
        echo GridView::widget([
            'dataProvider' => $dataProviders[$competence->id],
    //        'filterModel' => $searchModel,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn',
                    'options' => ['width' => '3%']],
                'name',
                [
//                    'label' => 'Удалить',
                    'format' => 'raw',
                    'options' => ['width' => '65'],
                    'value' => function($data){
                        return Html::a('',
                            [
                                'learning-result-vote',
                                'id' => $data->id,
                                'vote' => 1
                            ],
                            [
                                "class"=> "btn btn-info btn-lg glyphicon glyphicon-thumbs-up",
                                'data' => [
                                    'method' => 'post',
                                    'params' => [
                                        'competencies_id' => $data->id,
                                        'result' => 1
                                    ],
                                ],
                            ]
                        );
                    }
                ],
                [
//                    'label' => 'Удалить',
                    'format' => 'raw',
                    'options' => ['width' => '65'],
                    'value' => function($data){
                        return Html::a('',
                            [
                                'learning-result-vote',
                                'id' => $data->id,
                                'vote' => 0
                            ],
                            [
                                "class"=> "btn btn-warning btn-lg glyphicon glyphicon-thumbs-down",
                                'data' => [
                                    'method' => 'post',
                                    'params' => [
                                        'competencies_id' => $data->id,
                                        'result' => 0
                                    ],
                                ],
                            ]
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
        ]);

        echo '
            </div>
        </div>
        ';
    }
    ?>

</div>


