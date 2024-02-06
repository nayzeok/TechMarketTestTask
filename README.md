### CRM
#### How to install
##### Clone repository
```sh
git clone https://github.com/nayzeok/TechMarketTestTask
```
##### Install composer requirements
```sh
composer install
```
##### Initialize Yii
```sh
docker exec -it prod-app php ../app/init
```
##### Configure Yii
in `app/common/config/main-local.php` file change db host and name

`return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
`

##### Start Yii migration
```sh
php yii migrate
```

##### Running a script for generating 5000 thousand categories of different nesting levels
```sh
php yii seed
```

##### Server Startup (application will be available at http://localhost:8080)
```sh
php yii serve
```
