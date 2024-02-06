<?php
use app\models\Category;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $categories Category[] */

$this->title = 'Категории';
$this->registerJs("
    $(document).on('click', '.expand-category', function(e) {
        e.preventDefault();
        $(this).next('ul').slideToggle(); // Переключаем видимость следующего элемента ul
        $(this).text($(this).text() == '+' ? '-' : '+'); // Меняем текст на '-' или '+'
    });
", yii\web\View::POS_READY);

$this->registerCss("
    .category-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .category-list li {
        padding: 10px;
        margin: 5px 0;
        border-bottom: 1px solid #eaeaea;
        transition: all 0.3s ease;
        position: relative;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .category-list li:hover {
        background-color: #f8f8f8;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .category-link {
        color: #337ab7;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .category-link:hover {
        color: #23527c;
    }

    .expand-category {
        font-size: 1.2em;
        margin-left: 5px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .expand-category:hover {
        transform: scale(1.1);
    }
");
?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="body-content">
        <?= $this->render('_categoryList', ['categories' => $categories]) ?>
    </div>
</div>
