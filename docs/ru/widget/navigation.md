Виджет Navigation
=================

Виджет **Navigation** создет две навигационные панели. Одна вверху, с логотипом сайта, вторая панель слевой стороны.

Использование
-------------

```php
use socialist\adminlte\widgets\Navigation;
```

В `<body>` нужно добавить классы `hold-transition skin-blue sidebar-mini`

```php
<?= Navigation::widget() ?>
```

###Настройка верхнего (горизонтального) меню

####Логотип сайта

По умолчанию текст для логотипа берется из параметра `Yii::$app->name`, но можно указать и свои данные:

```php
<?= Navigation::widget([
    'logoText' => [
			'logoLg'   => Yii::$app->name,
			'logoMini' => substr(Yii::$app->name, 0, 1),
		],
    // ...
]); ?>
```

####Элементы навигации и уведомлений

Горизонтальное меню принимает виджеты в качестве выпадающих элементов с уведомлениями или навигации.

Например, можно использовать виджет из стандартного набора виджетов Yii2 `yii\bootstrap\Nav`:

```php
use yii\bootstrap\Nav;

...

<?= Navigation::widget([
    'navbarWidgets' => [
        Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home',    'url' => ['/site/index']],
                    ['label' => 'About',   'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        [
                            'label'       => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url'         => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ],
                ],
            ]),

    ],
]); ?>
```

###Настройка боковой панели

####Поле поиска

По умолчанию поле поиска включено и нацелено на стартовую страницу. Это можно изменить изменив нужные параметры:

```php
<?= Navigation::widget([
    
    // ...

    'searchForm' => [
    	'show'   => true, 				// показывать или не показывать поле поиска.
    									// По умолчанию true
    									
    	'url'    => ['search/results'], // Страница с результатами поиска
    	'label'  => 'Поиск...',			// Placeholder
    ]

    // ...
]); ?>
```

Для вывода меню в боковой панели, достаточно передать массив с элементами меню. Каждый элемент должен содержать такие параметры:

+ *label* - текст ссылки
+ *url*   - ссылка
+ *icon*  - НЕ ОБЯЗАТЕЛЬНО. Иконка [FontAwesome](http://fortawesome.github.io/Font-Awesome/) слева от текста ссылки. По умолчанию исспользуется `fa-circle-o`
+ *show*  - По умолчанию true. НЕ ОБЯЗАТЕЛЬНО.
+ *items* - НЕ ОБЯЗАТЕЛЬНО. Вложенные пункты меню (Для них используются те же параметры)
+ *count* - Счетчик

Пример:

```php
<?= Navigation::widget([
    // ...


    'sideMenu' => [
    	'title' => 'Главное меню', // По умолчанию MAIN NAVIGATION
        'items' => [
            [
                'label' => 'Home',
                'url'   => ['/site/index'],
                'icon'  => 'home',
            ],
            [
                'label' => 'About',
                'url'   => ['/site/about'],
                'icon'  => 'info-circle',
                'items' => [
                    [
                        'label' => 'About us',
                        'url'   => ['/site/test1'],
                    ],
                    [
                        'label' => 'About company',
                        'url'   => ['/site/test2'],
                    ],
                    [
                        'label' => 'Contacts',
                        'url'   => ['/site/test3'],
                        'count' => 10
                    ],
                ],
            ],
            [
                'label' => 'Contact',
                'url'   => ['/site/contact'],
                'icon'  => 'envelope',
            ],
        ]
    ],

    // ...
]); ?>
```

Этот массив можно переместить в [конфигурацию расширения](https://github.com/socialist/yii2-admin-lte/blob/master/docs/ru/README.md),
чтобы убрать большой массив из шаблона страницы.

Если параметр `sideMenu` не указан, то меню не выводится вообще. Но сама боковая панель остается.