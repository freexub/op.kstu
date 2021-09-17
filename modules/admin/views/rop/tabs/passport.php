<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap4\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Rop */
/* @var $competencies app\models\Competencies */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="passport-view" style="margin-top:20px;">

    <p>
        <?php // echo Html::a('', ['update', 'id' => $model->id], ['class' => 'btn btn-info glyphicon glyphicon-pencil', 'title'=>'Редактировать']) ?>
        <?php /* echo Html::a('', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger glyphicon glyphicon-trash',
            'title'=>'Удалить',
            'data' => [
                'confirm' => 'Вы хотите УДАЛИТЬ образовательную программу?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'university.name',
            [
                'label'  => 'Область образования',
                'value'  => function ($data) {
                    return $data->eduAreas->CodeName;
                },
            ],
            [
                'label'  => 'Направление подготовки',
                'value'  => function ($data) {
                    return $data->trainingDirection->CodeName;
                },
            ],
            [
                'label'  => 'Группа образовательных программ',
                'value'  => function ($data) {
                    return $data->groupEduPrograms->CodeName;
                },
            ],
            'eduGoalName',
            'levelNrk',
            'levelOrk',
            'creditsCount',
            'academicDegree',
            'trainingPeriod',
        ],
    ]) ?>


</div>
