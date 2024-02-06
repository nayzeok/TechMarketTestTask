<?php
use yii\helpers\Html;
use app\models\Category;

/* @var $categories Category[] */

foreach ($categories as $category) {
    echo "<li id='category_{$category->id}'>";
    echo Html::a(Html::encode($category->name), $category->getUrl(), ['class' => 'category-link']);

    if ($category->getChildren()->count() > 0) {
        echo Html::a("+", '#', ['class' => 'expand-category']);
        echo "<ul class='category-list' style='display:none;'>"; // Скрытый по умолчанию
        echo $this->render('_categoryList', ['categories' => $category->getChildren()->all()]);
        echo "</ul>";
    }

    echo "</li>";
}
?>
