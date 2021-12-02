<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\MobilitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mobility Ins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobility-in-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mobility In', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'firstName',
            'lastName',
//            'sex',
            //'homeUniver',
            //'department',
            //'major',
            //'course',
            //'reason',
            'email:email',
            'phone',
            'speciality.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
