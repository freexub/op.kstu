<?php

namespace app\modules\expert\controllers;

use app\models\RopExperts;
use app\modules\expert\models\Programs;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Competencies;
use app\models\LearningResult;
use app\models\LearningResultVote;
use app\models\Rop;
use app\modules\expert\models\ProgramsSearch;

class ProgramsController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all Rop models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $expertPrograms = RopExperts::find()->select('rop_id')->where(['active'=>0, 'user_id'=>Yii::$app->user->id])->asArray()->all();
//        var_dump($expertPrograms);die();
        $searchModel = new ProgramsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rop model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $competencies = Competencies::find()->where(['rop_id'=>$id])->orderBy('id DESC')->all();
        foreach ($competencies as $competence){
            $learningResult = LearningResult::find()->where(['competencies_id'=>$competence->id]);
            $dataProviders[$competence->id] = new ActiveDataProvider([
                'query' => $learningResult,
                'sort' => false
            ]);
        }
//        var_dump($dataProviders);die();

        $activeTab = false;
        $contentTab = 'tabs/passport';
        if (isset($_GET['tab'])){
            $activeTab = true;
            $contentTab = 'tabs/competencies';
        }

        $items = [
            [
                'label' => '<b>Паспорт ОП</b>',
                'url' => 'view?id='.$id,
            ],
            [
                'label' => 'Компетенции ОП',
                'url' => 'view?id='.$id.'&tab=1',
                'active' => $activeTab,
            ],
        ];

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProviders' => $dataProviders,
            'competencies' => $competencies,
            'items' => $items,
            'rop_id' => $id,
            'contentTab' => $contentTab,
        ]);
    }

    public function actionLearningResultAdd($id, $rop_id)
    {
        $model = new LearningResult();
        $competencies = LearningResult::find()->where(['competencies_id'=>$id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $competencies,
            'sort' => false
        ]);
        if ($model->load(Yii::$app->request->post())){
            $model->competencies_id = $id;
            if ($model->save()){
//                return $this->redirect(['view', 'id' => $rop_id]);
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->renderAjax('forms/add_result', [
            'model' => $model,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'rop_id' => $rop_id
        ]);

    }

    public function actionCompetenciesAdd($id)
    {
        $model = new Competencies();
        if ($model->load(Yii::$app->request->post())){
            $model->rop_id = $id;
            $model->autor = Yii::$app->user->id;
            if ($model->save()){
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->renderAjax('forms/add_competencies', [
            'model' => $model,
        ]);

    }

    public function actionLearningResultVote($id, $vote){
        $autor = Yii::$app->user->id;
        $model = LearningResultVote::findOne([
            'autor'=>$autor,
            'lr_id'=>$id
        ]);
//        if (count($model) > 0){
        if (isset($model->id)){
            if ($model->load(Yii::$app->request->post(), '')){
                if ($model->save())
                    return $this->redirect(Yii::$app->request->referrer);
            }
        }else{
            $model = new LearningResultVote();
            if ($model->load(Yii::$app->request->post(), '')){
                $model->autor = $autor;
                if ($model->save())
                    return $this->redirect(Yii::$app->request->referrer);
            }
        }
    }


    /**
     * Finds the Rop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Programs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

//    protected function findLearningResult($autor, $id)
//    {
//        if (($model = CompetenciesVote::find()->where(['autor'=>$autor, ])) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }

}
