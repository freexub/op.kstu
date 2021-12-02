<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->

        <div class="user-panel">
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Все ОП','icon' => 'folder', 'url' => ['rop/index']],
                    ['label' => 'Мобильность',  'icon' => 'paper-plane', 'url' => ['mobility/index']],
                    ['label' => 'Пользователи', 'icon' => 'users', 'badge' => '',
                        'items' => [
                            ['label' => 'Эксперты',  'iconStyle' => 'far', 'url' => ['experts/index'], 'target' => '_blank', 'iconClassAdded' => 'text-info'],
                            ['label' => 'Все пользователи',  'iconStyle' => 'far', 'url' => ['user/index'], 'target' => '_blank', 'iconClassAdded' => 'text-info'],
                        ]
                    ],
                    ['label' => 'Справочники', 'options' => ['class' => 'header']],


                ],
            ]
        ) ?>

    </section>

</aside>
