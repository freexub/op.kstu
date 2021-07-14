<?php

namespace app\controllers;

use app\models\Competencies;
use app\models\EduArea;
use app\models\GroupEduProgram;
use app\models\LearningResult;
use app\models\RopExperts;
use app\models\TrainingDirection;
use app\models\User;
use Yii;
use app\models\Rop;
use app\models\RopSearch;
use app\models\ProfessionType;
use app\models\Universitys;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * RopController implements the CRUD actions for Rop model.
 */
class RopController extends Controller
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
     * Lists all Rop models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RopSearch();
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

    function Competencies($competencies){
        $dataProviders = [];
        foreach ($competencies as $competence){
            $learningResult = LearningResult::find()->where(['competencies_id'=>$competence->id]);
            $dataProviders[$competence->id] = new ActiveDataProvider([
                'query' => $learningResult,
                'sort' => false
            ]);
        }
        return $dataProviders;
    }

    public function actionView($id)
    {
        $competencies = Competencies::find()->where(['rop_id'=>$id])->orderBy('id DESC')->all();
        $activeTab = 0;
        if (isset($_GET['tab'])){
            $activeTab = (int)$_GET['tab'];
        }
        switch ($activeTab) {
            case 0:
                $contentTab = 'tabs/passport';
                break;
            case 1:
                $contentTab = 'tabs/competencies';
                $dataProviders = $this->Competencies($competencies);
                break;
            case 2:
                $contentTab = 'tabs/experts';
                $dataProviders = new ActiveDataProvider([
                    'query' => RopExperts::find()->where(['rop_id'=>$id, 'turn'=>0]),
                    'sort' => false
                ]);
                break;
        }

        $items = [
            [
                'label' => '<b>Паспорт ОП</b>',
                'url' => 'view?id='.$id,
                'active' => $activeTab == 0,
            ],
            [
                'label' => 'Компетенции ОП',
                'url' => 'view?id='.$id.'&tab=1',
                'active' => $activeTab == 1,
            ],
            [
                'label' => 'Эксперты',
                'url' => 'view?id='.$id.'&tab=2',
                'active' => $activeTab == 2,
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

    public function actionExpertAdd($rop_id = 0)
    {
        $model = new RopExperts();
        $users = User::find()
            ->where("id NOT IN (Select user_id From rop_experts Where rop_id = ".$rop_id.") ")
            ->all();

        if ($model->load(Yii::$app->request->post())){
            $model->rop_id = $rop_id;
            if ($model->save()){
                return $this->redirect(Yii::$app->request->referrer);
            }else{
                var_dump(Yii::$app->request->post());
                die();
            }
        }
        return $this->renderAjax('forms/add_expert', [
            'model' => $model,
            'users' => $users,
            'rop_id' => $rop_id,
        ]);

    }

    public function actionExpertsAdd($rop_id = 0)
    {

//        var_dump(Yii::$app->request->post());
//        die();

        $model = new RopExperts();
        $model2 = new RopExperts();
        $users = User::find()
            ->where("id NOT IN (Select user_id From rop_experts Where rop_id = ".$rop_id.") ")
            ->all();

        if (isset($_POST['RopExperts'])){
            $data = $_POST['RopExperts'];
            $model->rop_id = $rop_id;
            $model->user_id = $data['user1'];
            if ($model->save()){
                $model2->rop_id = $rop_id;
                $model2->user_id = $data['user2'];
                $model2->active = 1;
                $model2->turn = $model->id;
                if ($model2->save())
                    return $this->redirect(Yii::$app->request->referrer);
            }else{
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->renderAjax('forms/add_experts', [
            'model' => $model,
            'model2' => $model2,
            'users' => $users,
            'rop_id' => $rop_id,
        ]);

    }

    /**
     * @param $id
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCompetenciesAdd($id)
    {
        $model = new Competencies();
        if ($model->load(Yii::$app->request->post())){
            $model->rop_id = $id;
            if ($model->save()){
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        return $this->renderAjax('forms/add_competencies', [
            'model' => $model,
        ]);

    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionLearningResultStatus($id, $rop_id){
        $model = LearningResult::findOne($id);

//        var_dump($model->status);die();
        $model->status = 1;
        if ($model->save())
            return $this->redirect(Yii::$app->request->referrer);
        else
            var_dump($model->status);die();

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

    /**
     * Creates a new Rop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rop();
        $universitys = Universitys::find()->all();
        $eduArea1 = EduArea::find()->all();
        $eduArea = $this->CodeName($eduArea1);

        $trainingDirection1 = TrainingDirection::find()->all();
        $trainingDirection = $this->CodeName($trainingDirection1);

        $groupEduProgram = GroupEduProgram::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'universitys' => $universitys,
            'eduArea' => $eduArea,
            'trainingDirection' => $trainingDirection,
        ]);
    }

    function CodeName($model){
        foreach ($model as $operation){
            $array[$operation->id] = $operation->code . " " . $operation->name;
        }
        return $array;
    }

    public function actionGetTrainingDirection(){
        if ($_POST['id'])
            $id = $_POST['id'];
        else
            $id = 1;
        $data = TrainingDirection::find()->where(['ea_id'=>$id])->all();

        if (count($data)>0){
//            echo "<option value=''>Выберать ...</option>";
            foreach ($data as $operation){
                echo "<option value='" . $operation->id . "'>" . $operation->code ." ". $operation->name . "</option>";
            }
        }else{
            echo "<option>".$_POST['data']."</option>";
        }
    }

    public function actionGetGroupEduProgram(){
        if ($_POST['id'])
            $id = $_POST['id'];
        else
            $id = 1;
        $data = GroupEduProgram::find()->where(['td_id'=>$id])->all();

        if (count($data)>0){
//            echo "<option value=''>Выберать ...</option>";
            foreach ($data as $operation){
                echo "<option value='" . $operation->id . "'>" . $operation->code ." ". $operation->name . "</option>";
            }
        }else{
            echo "<option>---</option>";
        }
    }

    /**
     * Updates an existing Rop model.
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
     * Deletes an existing Rop model.
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

    public function actionDeleteExperts($id)
    {
        $ropExpert = RopExperts::deleteAll("id = ".$id." or turn =".$id);
//        $ropExpert->

        return $this->redirect(Yii::$app->request->referrer);
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
        if (($model = Rop::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
