<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Поиск..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

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
                    [
                        'label' => 'ОП',
                        'icon' => 'book',
                        'badge' => '',
                        'items' => [
//                            ['label' => '', 'options' => ['class' => 'header', 'style'=>'color: #ffffff; background: #2c3b41;']],
                            ['label' => 'Университеты', 'url' => ['universitys/index'], 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                            ['label' => 'Области образования', 'url' => ['edu-area/index'], 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                            ['label' => 'Направления подготовки', 'url' => ['training-direction/index'], 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                            ['label' => 'Группы ОП', 'url' => ['group-edu-program/index'], 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                        ]
                    ],
                    [
                        'label' => 'Мобильность',
                        'icon' => 'book',
                        'badge' => '',
                        'items' => [
                            ['label' => 'Специальности по странам', 'url' => ['mobility-spec/index'], 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                            ['label' => 'Реестр МОП', 'url' => ['mobility-mop/index'], 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                        ]
                    ],
                    ['label' => 'Приложения', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Система',
                        'icon' => 'file-code',
                        'badge' => '',
                        'items' => [
                            ['label' => 'Gii',  'iconStyle' => 'far', 'url' => ['/gii'], 'target' => '_blank', 'iconClassAdded' => 'text-warning'],
                            ['label' => 'Rbac',  'iconStyle' => 'far', 'url' => ['/rbac'], 'target' => '_blank', 'iconClassAdded' => 'text-warning'],
                            ['label' => 'Debug', 'iconStyle' => 'far', 'url' => ['/debug'], 'target' => '_blank', 'iconClassAdded' => 'text-warning'],
                        ]
                    ],

                ],
            ]
        ) ?>

    </section>

</aside>
