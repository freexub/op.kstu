<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Мобильность';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="modal remote fade" id="in">
    <div class="modal-dialog">
        <div class="modal-content loader-lg" style="border: 0"></div>
    </div>
</div>
<div class="modal remote fade" id="out">
    <div class="modal-dialog">
        <div class="modal-content loader-lg" style="border: 0"></div>
    </div>
</div>

<h1>Мобильность</h1>

<div class="row">
    <div class="col-lg-12 ">
        <h4>
            <strong>Академи́ческая моби́льность</strong> — перемещение студентов и преподавателей высших учебных заведений на определённый период
            времени в другое образовательное или научное заведение в пределах или за пределами своей страны с целью обучения или преподавания.
        </h4>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Входящая академическая мобильность</h3>
            </div>
            <div class="panel-body">
                <p>Для обучающихся студентов из ВУЗов-партнеров в рамках программы академической мобильности.</p>
                <p>Студенты приезжают учиться из различных стран мира на период от 3 до 9 месяцев.</p>
                <p>Обучающимся предлогается высококачественное образование на трех языках: <b>казахском</b>, <b>русском</b> и <b>английском</b>.</p>
                <p>Иностранные студенты имеют возможность познакомиться с культурой и обрести бесценный международный образовательный опыт в динамично развивающемся мегаполисе.</p>

                <div class="row">
                    <div class="col-md-6">
                        <?=  Html::a('Внутренняя мобильность',
                            [
                                'add',
                                'k' => 1,
                                't' => 1,
                            ],
                            [
                                'class'=>'btn btn-lg btn-info pull-right',
                                'title' =>'Заполнить заявку на входящую академическую мобильность',
                                'data-toggle'=>'modal',
                                'data-target'=>'#in',
                            ]
                        );?>
                    </div>
                    <div class="col-md-6">
                        <?=  Html::a('Внешняя мобильность',
                            [
                                'add',
                                'k' => 1,
                                't' => 2,
                            ],
                            [
                                'class'=>'btn btn-lg btn-success pull-right',
                                'title' =>'Заполнить заявку на входящую академическую мобильность',
                                'data-toggle'=>'modal',
                                'data-target'=>'#in',
                            ]
                        );?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3>Исходящая академическая мобильность</h3>
            </div>
            <div class="panel-body">
                <p>Предлагает студентам ряд возможностей для обучения в одном из зарубежных ВУЗов по академической мобильности. Студент может подавать заявку на один семестр:</p>
                <ul>
                    <li>на государственный грант от МОН РК, выделенный на осуществление академической мобильности студентов с полным или частичным покрытием расходов в зависимости от выбранного университета.</li>
                    <li>на программу Erasmus+, в определённые университеты с полным покрытием расходов</li>
                    <li>а также в любой ВУЗ партнёр с бесплатным обучением, но самостоятельным покрытием прочих расходов.</li>
                </ul>
                <div class="row">
                    <div class="col-md-6">
                        <?=  Html::a('Внутренняя мобильность',
                            [
                                'add',
                                'k' => 2,
                                't' => 1,
                            ],
                            [
                                'class'=>'btn btn-lg btn-info pull-right',
                                'title' =>'Заполнить заявку на исходящую академическую мобильность',
                                'data-toggle'=>'modal',
                                'data-target'=>'#out',
                            ]
                        );?>
                    </div>
                    <div class="col-md-6">
                        <?=  Html::a('Внешняя мобильность',
                            [
                                'add',
                                'k' => 2,
                                't' => 2,
                            ],
                            [
                                'class'=>'btn btn-lg btn-success pull-right',
                                'title' =>'Заполнить заявку на исходящую академическую мобильность',
                                'data-toggle'=>'modal',
                                'data-target'=>'#out',
                            ]
                        );?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>