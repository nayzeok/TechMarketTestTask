<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;
use app\models\Task;

class CategoryController extends Controller
{
    /**
     * Отображение списка всех категорий.
     *
     * @return string Отрендеренный вид для отображения списка категорий.
     */
    public function actionIndex()
    {
        $categories = Category::find()
            ->where(['parent_id' => null])
            ->all();

        return $this->render('index', [
            'categories' => $categories,
        ]);
    }


    /**
     * Отображение детальной информации о конкретной категории.
     *
     * @param int $id Идентификатор категории.
     * @return string Отрендеренный вид для отображения детальной информации категории.
     * @throws NotFoundHttpException Если категория не найдена.
     */
    public function actionView($id): string
    {
        $category = Category::findOne($id);

        if ($category === null) {
            throw new NotFoundHttpException('The requested category does not exist.');
        }

        return $this->render('view', [
            'category' => $category,
        ]);
    }
}
