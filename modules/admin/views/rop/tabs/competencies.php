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
            'showHeader'=> false,
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
                            $class ='btn btn-danger btn-xl glyphicon glyphicon-remove-sign';
                        }
                        if ($data->status == 1){
                            $class ='btn btn-info btn-xl glyphicon glyphicon-ok-circle';
                        }
                        return Html::a('<span class="'.$class.'"></span>',
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
        ]);

        echo '
            </div>
        </div>
        ';
    }
    ?>

</div>


