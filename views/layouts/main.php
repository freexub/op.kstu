<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            ['label' => 'Expert', 'visible' => Yii::$app->user->can('expertAccess'), 'url' => ['expert/programs/index']],
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'About', 'url' => ['/site/about']],
//            ['label' => 'Contact', 'url' => ['/site/contact']],
            [
                'label' => 'Управление',
                'visible' => Yii::$app->user->can('admin'),
                #'url' => ['/data/'],
                'items' => [
                    ['label' => 'ОП', 'url' => ['rop/index']],
                    ['label' => 'Университеты', 'url' => ['universitys/index']],
                    ['label' => 'Expert', 'url' => ['expert/index']],
//                    ['label' => '-', 'options'=>['class'=>'divider']],
//                    ['label' => 'Подразделения', 'url' => ['levels/index']],
//                    ['label' => 'Должности', 'url' => ['position/index']],
                    #['label' => '-', 'options'=>['class'=>'divider']],
                ]
            ],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),

            '<li><div class="navbar-text pull-right">'
//            .\lajax\languagepicker\widgets\LanguagePicker::widget([
//                'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
//                'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE,
//            ])
            . '</div></li>',
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
