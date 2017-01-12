Виджет UserMenu
===========

Виджет **UserMenu** добавляет в верхнюю панель кнопку с выпадающей карточкой пользователя или ссылками на авторизацию или регистрацию нового.

Настройка виджета
-----

По умолчанию в виджете используется класс пользователя из расширения ``` socialist\adminlte\base\User ```,
но это поведение можно переопределить используя конфигурацию расширения.
Для начала нужно чтобы класс пользователя (например, ```common\models\User```) наследовался от сласса ``` socialist\adminlte\base\User ```

```php
<?php
namespace common\models;
// ...

class User extends socialist\adminlte\base\User
{
    // ...
    
    // Переопределяем необходимые методы
    public function getUsername()
    {
        return $this->username;
    }
    
    // ...
    
}
```

И в [конфигурации](https://github.com/socialist/yii2-admin-lte/blob/master/docs/ru/README.md) расширения указываем класс, которыый будем использовать в виджете:
```php
<?php

return [
    // ...
    
    'userClass' => 'common\models\User',
    
    // ...
];
```
Можно переопределить методы:

string User::getUsername()
---
Метод должен возвращать строку с именем пользователя.

По умолчанию возвращается пустая строка.

string User::getAvatar()
---
Метод должен возвращать строку с адресом изображения.

По умолчанию возвращается пустая строка.

string User::getProfession()
---
Метод должен возвращать строку с профессией пользователя.

По умолчанию возвращается пустая строка.

string User::getCreateTime()
---
Метод должен возвращать строку с датой регистрации пользователя.

По умолчанию возвращается пустая строка.

boolean User::getPermition()
---
Используется для предоставления доступа к определенным пунктам меню
и для отображения карточки пользователя на навигационной панели.

По умолчанию доступ предоставляется всем авторизированным пользователям,
но это можно переопределить в классе-наследнике:

```php
<?php
// ...
class User extends socialist\adminlte\base\User
{
    // ...
    
    public function getPermition()
    {
        return Yii::$app->getUser()->can('Необходимая_роль');
    }
    
    // ...
}

```

Параметры
---

Все параметры можно указать в [конфигурации](https://github.com/socialist/yii2-admin-lte/blob/master/docs/ru/README.md)
 расширения с ключем `userMenu`.
 
```php
<?php

return [
    // ...
    
    'userMenu' => [
        'signOutUrl' => 'Logout',
    ],
    
    // ...
];

?>
```

##### user
**defaul:** `\socialist\adminlte\base\User`

**description:** Класс пользователя.

По умолчанию используется класс `\socialist\adminlte\base\User` или из [конфигурации расширения](https://github.com/socialist/yii2-admin-lte/blob/master/docs/ru/README.md)
Но можно указать и в параметрах виджета

##### signInUrl
**default:** `['/user/login']`

**description:** Адрес страницы авторизации

##### signInLabel
**default:** `'Sign in'`

**description:** Текст ссылки на страницу авторизации

##### signUpUrl
**default:** `['/user/signup']`

**description:** Адрес страницы регистрации

##### signUpLabel
**default:** `'Sign up'`

**description:** Текст сыылки на страницу регистрации

##### profileUrl
**default:** `['user/profile']`

**description:** Адрес страницы профиля пользователя

##### signOutUrl
**default:** `['/user/logout']`

**description:** Адрес страницы выхода

##### canRegister
**default:** `true`

**description:** Показывать ли ссылку на страницу регистрации
