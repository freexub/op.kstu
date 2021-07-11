<?php

use yii\bootstrap4\Tabs;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\expert\models\Programs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php for($i=0;count($competencies)>$i;$i++){?>
    <div class="modal remote fade" id="modal<?=$competencies[$i]->id?>">
        <div class="modal-dialog">
            <div class="modal-content loader-lg" style="border: 0"></div>
        </div>
    </div>
<?php }?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                <div class="col-md-12">
                    <?= Tabs::widget([
                        'navType' => 'nav-pills ',
                        'options' => ['class' => 'course-manager'],
                        'encodeLabels' => false,
                        'items' => $items,
                    ]) ?>
                </div>
                    <?= $this->render($contentTab, [
                        'model' => $model,
                        'dataProviders' => $dataProviders,
                        'competencies' => $competencies,
                        'rop_id' => $rop_id,
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>