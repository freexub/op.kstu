<?php

namespace app\modules\expert\controllers;

use app\models\Competencies;
use app\models\LearningResult;
use Yii;
use app\modules\expert\models\Programs;
use app\modules\expert\models\ProgramsSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgramsController implements the CRUD actions for Programs model.
 */
class ProgramsController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
     * Lists all Programs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProgramsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Programs model.
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
//        var_dump($rop_id);die();
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
        return 123;
//        return $this->renderAjax('forms\add_result', [
//            'model' => $model,
//            'dataProvider' => $dataProvider,
//            'id' => $id,
//            'rop_id' => (int)$rop_id
//        ]);

    }
    /**
     * Creates a new Programs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Programs();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Programs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Programs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Programs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Programs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Programs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
