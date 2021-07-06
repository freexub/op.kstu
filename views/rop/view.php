<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $contentTab yii\web\View */
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
    <hr>
    <?= Tabs::widget([
        'navType' => 'nav-pills ',
        'options' => ['class' => 'course-manager'],
        'encodeLabels' => false,
        'items' => $items,
    ]) ?>

    <div class="clearfix"></div>

    <?= $this->render($contentTab, [
        'model' => $model,
        'dataProviders' => $dataProviders,
        'competencies' => $competencies,
    ]) ?>

</div>
