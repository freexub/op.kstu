<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Образовательные программы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ОП', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'eduProgramName',
            'university.name',
            [
                'value' => 'eduAreas.CodeName',
//                'label'=>'eduAreas.eduProgramName',
            ],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
