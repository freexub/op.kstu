<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrainingDirectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Training Directions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-direction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Training Direction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'code',
            'name',
            'eduArea.name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
