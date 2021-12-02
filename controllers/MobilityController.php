<?php

namespace app\controllers;

use app\models\MobilitySpec;
use Yii;
use app\models\Mobility;
use app\models\MobilityIn;

class MobilityController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdd($k, $t){
        $model = new MobilityIn();
        $modelSpec = new MobilitySpec();
        if ($model->load(Yii::$app->request->post())){

            if (isset($_POST['speciality']))
                $model->specialityId = $_POST['speciality'];

            if ($model->save()){
                Yii::$app->session->addFlash('success', 'Ваша заявка принята, в ближайее время с вами свяжется наш менеджер.');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        if ($k==1){
            $form = 'forms/in_form';
            $arr = [
                'model' => $model
            ];
        }else{
            $form = 'forms/out_form';
            $arr = [
                'model' => $model,
                'modelSpec' => $modelSpec
            ];
        }
        return $this->renderAjax($form, $arr);
    }

    public function actionUniversity(){
        if (isset($_POST["id"])) {
            $country = $_POST["id"];
            $model = new MobilitySpec();
            $universitys = $model->getUniversity($country);
            $option = "<option value=''>Выберать ...</option>";

            if (count($universitys) > 0) {
                foreach ($universitys as $operation) {
                    $option .= "<option value='" . $operation->university . "'>" . $operation->university . "</option>";
                }
            }
            return $option;
        }
    }

    public function actionSpeciality(){
        if (isset($_POST["id"])) {
            $university = $_POST["id"];
            $model = new MobilitySpec();
            $speciality = $model->getSpeciality($university);
            $option = "<option value=''>Выберать ...</option>";

            if (count($speciality) > 0) {
                foreach ($speciality as $operation) {
                    $option .= "<option value='" . $operation->id . "'>" . $operation->name . " (" . $operation->degree . ")</option>";
                }
            }
            return $option;
        }
    }

    public function actionCreate(){
        $model = new MobilityIn();

        return $this->render('forms/in_form', [
            'model' => $model
        ]);

    }

}
