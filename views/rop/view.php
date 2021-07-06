<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Rop */
/* @var $competencies app\models\Competencies */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->eduProgramName;
$this->params['breadcrumbs'][] = ['label' => 'Образовательные программы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="modal remote fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content loader-lg" style="border: 0"></div>
    </div>
</div>
<?php for($i=0;count($competencies)>$i;$i++){?>
    <div class="modal remote fade" id="modal<?=$competencies[$i]->id?>">
        <div class="modal-dialog">
            <div class="modal-content loader-lg" style="border: 0"></div>
        </div>
    </div>
<?php }?>
<div class="rop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы хотите УДАЛИТЬ образовательную программу?',
                'method' => 'post',
            ],
        ]) ?>
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

    <hr>
    <p>
        <?=Html::a('<span class="glyphicon glyphicon-plus"></span> Добавить компетенцию',
            [
                'competencies-add',
                'id' => $model->id,
            ],
            [
                'class'=>'btn btn-success ',
                'data-toggle'=>'modal',
                'data-target'=>'#add',
            ]
        );?>
    </p>

    <?php
    echo Tabs::widget([
        'items' => $items,

    ]);
    ?>

    <?php
    foreach ($competencies as $competence){
        echo "<h3>".$competence->name."</h3>";
        echo GridView::widget([
            'dataProvider' => $dataProviders[$competence->id],
    //        'filterModel' => $searchModel,
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
    }
    ?>

</div>

<?php

$script = <<< JS
$('document').ready(function(){
    var i=0;
    $('#addInp').on('click', function(){
        $('<div class="added col-md-12"><div class="col-md-6" style="margin-top:15px; margin-left:-15px">' +
         '<input name="Field['+(i++)+']" type="code" placeholder="Введите название поля" class="form-control rem"  required/></div>' +
         '<div class="col-md-6" style="margin-top:15px; margin-left:-20px" ><button class="btn btn-danger glyphicon glyphicon-trash rem"></button></div><div class="added">'
         ).fadeIn('slow').appendTo('#forAddedInputs');			 
        $('#save-competention').attr('disabled', false);
        $('#discipline_type').css('display','block');
    });
    $('#forAddedInputs').on('click', 'button', function(){
        $(this).parent().parent().remove();
        if($('#forAddedInputs input').length == 0){
            $('#save-competention').attr('disabled', true);
            $('#discipline_type').css('display','none');
        }
    });
});



JS;
$this->registerJs($script);
?>