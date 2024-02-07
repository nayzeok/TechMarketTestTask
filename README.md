### Подготовка

Для развертки приложения вы должны иметь установленный php и MySQL на своем ПК

#### Установка
##### Клонирование репозитория
```sh
git clone https://github.com/nayzeok/TechMarketTestTask
```
##### Установка зависимостей Composer
```sh
composer install
```

##### Конфигурация
in `config/db.php` file change db host and name

`return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
];
`
### Создание базы данных

Необходимо иметь установленный MySQL [MySQL Downloads](https://dev.mysql.com/downloads/mysql/)
После установки или если он уже установлен.

1. Откройте MySQL Command Line Client из меню Пуск.
2. Введите пароль для пользователя `root`, который вы указали при установке.
3. Создайте новую базу данных, выполнив следующую команду:
   ```sql
   CREATE DATABASE yii2basic;
   ```

##### После создания БД 
```sh
php yii migrate
```

##### Запуск скрипта для генерации 5000 тысяч категорий разной степени вложенности
```sh
php yii seed
```

##### Запуск сервера (приложение будет доступно на сайте http://localhost:8080)
```sh
php yii serve
```
