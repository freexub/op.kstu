<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */
/* @var $profile \app\models\UserProfile */
$this->registerCssFile("@web/css/signUp.css",
    ['rel' => 'stylesheet',
        'depends'=> ['app\assets\AppAsset']],
    'mystyle');

//$this->title = 'Регистрация';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="login-signup">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 nav-tab-holder">
                <ul class="nav nav-tabs row" role="tablist">
                    <li role="presentation" class="active col-sm-6"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation" class="col-sm-6"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Create User Account</a></li>
                </ul>
            </div>
            <div class="col-sm-3"></div>

        </div>


        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <article role="login">
                            <h3 class="text-center"><i class="fa fa-lock"></i>USER</h3>
                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                            ]); ?>

                            <?= $form->field($model, 'username')->textInput(['placeholder'=>'Введите Ваш логин', 'autofocus' => true])->label(false) ?>

                            <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Введите Ваш пароль'])->label(false) ?>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Please accept the terms and conditions to proceed with your request.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>

                            <footer role="signup" class="text-center">
                                <ul>
                                    <li>
                                        <a href="#">Terms of Use</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Statement</a>
                                    </li>
                                </ul>
                            </footer>

                        </article>
                    </div>
                    <div class="col-sm-3"></div>

                </div>
                <!-- end of row -->
            </div>
            <!-- end of home -->

            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="row">

                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <article role="login">
                            <h3 class="text-center"><i class="fa fa-lock"></i> Create User Account</h3>

                            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                <?= $form->field($profile, 'sname')->textInput(['placeholder'=>'Введите вашу фамилию'])->label(false)?>

                                <?= $form->field($profile, 'name')->textInput(['placeholder'=>'Введите ваше имя'])->label(false) ?>

                                <?= $form->field($profile, 'pname')->textInput(['placeholder'=>'Введите ваше отчество'])->label(false) ?>

                                <?= $form->field($model, 'email')->textInput(['placeholder'=>'Укажите Ваш e-mail'])->label(false) ?>

                                <?= $form->field($model, 'username')->textInput(['placeholder'=>'Придумайте логин'])->label(false) ?>

                                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Придумайте пароль'])->label(false) ?>

                                <?= $form->field($model, 'retypePassword')->passwordInput(['placeholder'=>'Подтвердить пароль'])->label(false) ?>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Please accept the terms and conditions to proceed with your request.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success btn-block', 'name' => 'signup-button']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
                            <footer role="signup" class="text-center">
                                <ul>
                                    <li>
                                        <a href="#">Terms of Use</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Statement</a>
                                    </li>
                                </ul>
                            </footer>
                        </article>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

