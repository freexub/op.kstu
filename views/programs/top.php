<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $eduArea app\models\EduArea */
/* @var $universitys app\models\Universitys */
/* @var $form yii\widgets\ActiveForm */
/* @var $trainingDirection app\models\TrainingDirection */

$this->title = 'ТОП образовательных программ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rop-index">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php  echo $this->render('_search', [
                    'universitys' => $universitys,
                    'eduArea' => $eduArea,
                    'trainingDirection' => $trainingDirection,
                    'model' => $searchModel
            ]); ?>
        </div>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            [
                'label'  => '',
                'options' => ['width' => '10px'],
                'format' => 'raw',
                'value'  => function () {
                    return '<span class="glyphicon glyphicon-star fa-4x" style="color: #ffc107"></span>';
                },
            ],
            [
                'label'  => '',
                'format' => 'raw',
                'value'  => function ($data) {
                    return Html::a($data->eduProgramName, [
                            'view',
                            'id'=>$data->id
                        ],
                        [
                            'target' => '_blank'
                        ]);
                },
            ],
            [
                'label'=>'ВУЗ разработчик',
                'options' => ['width' => '50px'],
                'value' => 'university.shortName',
            ],
//            [
//                'value' => 'eduAreas.CodeName',
////                'label'=>'eduAreas.eduProgramName',
//            ],

//            'trainingDirections',
            //'groupEduProgram',
            //'eduProgramName',
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

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
