<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("
    .site-about {
        text-align: center;
        background: #f7f7f7;
        padding: 20px;
    }
    .site-about h1 {
        color: #2c3e50;
        font-size: 2.5em;
        margin-bottom: 20px;
    }
    .site-about img {
        max-width: 30%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .site-about p {
        margin-top: 20px;
        font-size: 1.2em;
        color: #34495e;
    }
    @media (max-width: 768px) {
        .site-about img {
            max-width: 70%;
        }
    }
");
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <img src="<?= Yii::getAlias('@web') ?>/img/cat.jpeg" alt="Cat">

    <p>
        This application is deployed for a test job for a Techno Market company
    </p>

</div>
