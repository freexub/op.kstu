<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UniversitysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Университеты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="universitys-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить университет', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'shortName',
//            'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
