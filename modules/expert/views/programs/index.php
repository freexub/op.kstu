<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\expert\models\ProgramsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Programs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
<!--                    <div class="row mb-2">-->
<!--                        <div class="col-md-12">-->
                            <?php // echo  Html::a(Yii::t('app', 'Create Programs'), ['create'], ['class' => 'btn btn-success']) ?>
<!--                        </div>-->
<!--                    </div>-->


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
                            'eduProgramName',
                            [
//                               'label' => 'Удалить',
                                #'visible' => Yii::$app->user->can('admin'),
                                'format' => 'raw',
                                'options' => ['width' => '65'],
                                'value' => function($data){
                                    return Html::a('<span class="fa fa-eye" ></span>',
                                        [
                                            'view',
                                            'id' => $data->id,
                                        ],
                                        [
                                                'class'=>'btn btn-primary'
                                        ]
                                    );
                                }
                            ],
//                            'regNumber',
//                            'universityId',
//                            'eduArea',
                            //'trainingDirections',
                            //'groupEduProgram',
                            //'eduGoalName',
                            //'eduType',
                            //'levelNrk',
                            //'levelOrk',
                            //'distinctType',
                            //'universityPartner',
                            //'creditsCount',
                            //'academicDegree',
                            //'trainingPeriod',
                            //'licenseNumber',
                            //'dateCreate',
                            //'dateUpdate',
                            //'statusId',
                            //'active',

//                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
