<?php

use yii\bootstrap4\Tabs;

/* @var $this yii\web\View */
/* @var $model app\modules\expert\models\Programs */

$this->title = $model->eduProgramName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php for($i=0;count($competencies)>$i;$i++){?>
    <div class="modal fade" id="modal<?=$competencies[$i]->id?>" tabindex="-1" role="dialog" aria-labelledby="modal<?=$competencies[$i]->id?>" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content loader-lg">
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
<?php }?>
<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">


                </div>
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
//                        'rop_id' => $rop_id,
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
