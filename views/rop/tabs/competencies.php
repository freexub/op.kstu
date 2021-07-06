<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Rop */
/* @var $competencies app\models\Competencies */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="rop-view" style="margin-top:20px;">

    <p>
        <?php echo Html::a('<span class=" glyphicon glyphicon-plus"></span> Добавить компетенцию',
            [
                'competencies-add',
                'id' => $model->id,
            ],
            [
                'class'=>'btn btn-success',
                'title' =>'Добавить компетенцию',
                'data-toggle'=>'modal',
                'data-target'=>'#add',
            ]
        ); ?>
    </p>

    <?php
    foreach ($competencies as $competence){
        echo '
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title"><small>#'.$competence->id.' / </small><strong>'.$competence->name.'</strong></span>
            </div>
            <div class="panel-body" style="margin-bottom:-20px; padding:0px">                
';
        echo "";
        echo GridView::widget([
            'dataProvider' => $dataProviders[$competence->id],
    //        'filterModel' => $searchModel,
            'summary' => false,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                [
                    'label' => 'Добавить',
                    #'visible' => Yii::$app->user->can('admin'),
                    'format' => 'raw',
                    'options' => ['width' => '50'],
                    'value' => function($data){
                        return Html::a('<span class="btn btn-default glyphicon glyphicon-plus"></span>',
                            [
                                'learning-result-add',
                                'id' => $data->id,
                                'rop_id' => $_GET['id'],
                            ],
                            [
                                'data-toggle'=>'modal',
                                'data-target'=>'#modal'.($data->id),
                            ]
                        );
                    }
                ],

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


