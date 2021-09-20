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
<div class="modal remote fade" id="add1">
    <div class="modal-dialog">
        <div class="modal-content loader-lg" style="border: 0"></div>
    </div>
</div>
<div class="modal remote fade" id="add2">
    <div class="modal-dialog">
        <div class="modal-content loader-lg" style="border: 0"></div>
    </div>
</div>
<div class="passport-view" style="margin-top:20px;">

    <div class="row" >
        <div class="col-lg-12" style="margin-bottom:20px;">
            <div class="btn-group pull-right">
                <button class="btn btn-success  dropdown-toggle " type="button" data-toggle="dropdown">
                    <span >Добавить</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><?php echo Html::a('Параллельное оценивание',
                            [
                                'expert-add',
                                'rop_id' => $model->id,
                            ],
                            [
//                                'class'=>'btn btn-success pull-right',
                                'title' =>'Эксперты оценивают ОП одновременно',
                                'data-toggle'=>'modal',
                                'data-target'=>'#add1',
                            ]
                        ); ?></li>
                    <li class="divider"></li>
                    <li><?php echo Html::a('Последовательное оценивание',
                            [
                                'experts-add',
                                'rop_id' => $model->id,
                            ],
                            [
//                                'class'=>'btn btn-success pull-right',
                                'title' =>'Эксперты оценивают ОП в порядке очереди',
                                'data-toggle'=>'modal',
                                'data-target'=>'#add2',
                            ]
                        ); ?></li>
                </ul>
            </div>

        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProviders,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'format' => 'raw',
                'options' => ['width' => '100%'],
                'value' => function($data){
                    return $data->getExpertName($data->id);
                }
            ],
            [
//               'label' => 'Удалить',
                'format' => 'raw',
                'options' => ['width' => '65'],
                'value' => function($data){
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                        [
                            'delete-experts',
                            'id' => $data->id,
                        ],
                        [
                            'title' => 'Удалить',
                            'class'=>'btn btn-danger btn-lg'
                        ]
                    );
                }
            ],

        ],
    ]); ?>


</div>
