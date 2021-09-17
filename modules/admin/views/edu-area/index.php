<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EduAreaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edu Areas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edu-area-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Edu Area', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'pt_id',
            'code',
            'name',
//            'classifier',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
