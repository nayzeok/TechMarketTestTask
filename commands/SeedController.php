<?php
namespace app\commands;

use yii\console\Controller;
use app\models\Category;

class SeedController extends Controller
{
    public function actionIndex()
    {
        // Очищаем таблицу перед заполнением
        Category::deleteAll();

        // Создаем корневую категорию
        $rootCategory = new Category([
            'name' => 'Root',
            'parent_id' => null,
            'level' => 0
        ]);
        $rootCategory->save(false);

        // Генерируем категории
        for ($i = 1; $i <= 5000; $i++) {
            $parent = Category::find()
                ->orderBy('RAND()')
                ->limit(1)
                ->one();

            $category = new Category([
                'name' => 'Category ' . $i,
                'parent_id' => $parent->id,
                'level' => $parent->level + 1
            ]);
            $category->save(false);
        }

        echo "Категории успешно созданы.\n";
    }
}
