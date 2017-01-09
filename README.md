Admin LTE for Yii2
==================
Admin LTE themr for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist socialist/yii2-admin-lte "@dev"
```

or add

```
"socialist/yii2-admin-lte": "@dev"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply add in the right file, for example in the beginning of the file `@views/layout/main`:

```php
<?php

use socialist\adminlte\assets\AdminAsset;

AdminAsset::register($this);

?>
```

Or you can replace the default layout in the app settings:

```php
<?php
return [
    // ...
    
    'layout' => '@vendor/socialist/yii2-admin-lte/views/layout/main',
    
    // ...
]
?>
```

More documentations
---

[Russian](https://github.com/socialist/yii2-admin-lte/blob/master/docs/ru/README.md)