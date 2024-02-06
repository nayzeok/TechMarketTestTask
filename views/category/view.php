<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $category app\models\Category */

$this->title = $category->name;
?>

<div class="category-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::encode($category->getCategoryPath()) ?></p>
</div>

