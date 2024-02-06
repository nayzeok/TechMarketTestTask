<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Category;
use app\models\Task;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $categories = Category::find()->all();

        return $this->render('index', [
            'categories' => $categories,
        ]);
    }

    public function actionView($id)
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
