<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Welcome!';
$this->registerCss("
    .site-index h1 {
        text-transform: uppercase;
        text-align: center;
        color: #555;
        transition: all 0.3s ease;
    }
    .site-index h1:hover {
        color: #f06d06;
        letter-spacing: 3px;
    }
    .lead {
        font-size: 1.5em;
        color: #777;
        font-style: italic;
    }
    .body-content p {
        background: #f9f9f9;
        padding: 15px;
        border-left: 5px solid #ccc;
    }
    .body-content p:hover {
        border-left: 5px solid #f06d06;
        background: #e9e9e9;
    }
");
?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p class="lead">Добро пожаловать в систему управления категориями!</p>

    <div class="body-content">
        <p>Этот раздел предназначен для ознакомления с функциями управления категориями.</p>
        <p>Используйте панель навигации для перехода к разделу 'Категории', где вы найдёте инструменты для просмотра категорий.</p>
    </div>
</div>
