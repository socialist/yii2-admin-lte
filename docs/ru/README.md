Admin LTE for Yii2
==================
Тема Admin LTE для Yii2

Установка
------------

Установка расширения с помощью [composer](http://getcomposer.org/download/).

Просто запустите в консоли команду

```
composer require --prefer-dist socialist/yii2-admin-lte "*"
```

или внесите строку

```
"socialist/yii2-admin-lte": "*"
```

в секцию `require` вашего файла `composer.json`.


Использование
-----

После того, как расширение установлено, просто добавьте в нужном файле, например в начале `@views/layout/admin`  :

```php
<?php

use socialist\adminlte\assets\AdminAsset;

AdminAsset::register($this);

?>
```

Или можно заменить стандартный layout в настройках приложения:

```php
<?php
return [
    // ...
    
    'layout' => '@adminlte/layout/main',
    
    // ...
]
?>
```

Конфигурация расширения
-----------

Сконфигурировать расширение можно несколькими способами:

Через параметры приложения (в файле ``` config/params.php ```):
```php
<?php

return [
    // ...
    
    'adminlte' => [
        // Здесь указать параметры расширения
    ]
    
    // ...
];
```

Указать параметры в отдельном файле ``` @app/config/adminlte.php ```:

```php
<?php

return [
    // Здесь указать параметры расширения
];
```

Плагины
------

По умолчанию никакие javascript плагины не подключаются, но их можно добавить в конфигурации:

```php
<?php

return [
    // ...
    
    'plugins' => [
        'jvectormap',
        'datepicker',
    ],
    
    // ...
];
```

Подгружаться плагины будут в том порядке, в котором они указаны.

#### Доступные плагины ####

+ [jquery-ui](https://jqueryui.com/)
+ [raphael](http://raphaeljs.com/)
+ [morris](http://morrisjs.github.io/morris.js/)
+ [sparkline](http://omnipotent.net/jquery.sparkline/)
+ [jvectormap](http://jvectormap.com/)
+ [jquery-knob](https://github.com/aterrien/jQuery-Knob)
+ [moment](http://momentjs.com/)
+ [daterangepicker](https://github.com/dangrossman/bootstrap-daterangepicker)
+ [datepicker](https://github.com/eternicode/bootstrap-datepicker)
+ [bootstrap3-wysihtml5](https://github.com/schnawel007/bootstrap3-wysihtml5)
+ [jquery-slimscroll](http://rocha.la/jQuery-slimScroll)
+ [fastclick](https://github.com/ftlabs/fastclick)
+ [iCheck](https://github.com/fronteed/iCheck)


Доступные виджеты
-----------------

[Виджеты](https://github.com/socialist/yii2-admin-lte/blob/master/docs/ru/widgets.md)

