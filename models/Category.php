<?php
namespace app\models;

use yii\helpers\Url;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property int $level
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'level'], 'required'],
            [['parent_id', 'level'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'level' => 'Level',
        ];
    }

    /**
     * Возвращает родительскую категорию.
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * Возвращает дочерние категории.
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    public function getUrl()
    {
        return Url::to(['/category/view', 'id' => $this->id]);
    }


    public static function showCategories($parent_id = null, $isChild = false)
    {
        $categories = self::find()
            ->where(['parent_id' => $parent_id])
            ->orderBy('order, name') // сортировка сначала по порядку, затем по имени
            ->all();

        if (!empty($categories)) {
            $style = $isChild ? " style='display:none;'" : "";
            echo "<ul class='category-list'$style>";
            foreach ($categories as $category) {
                echo "<li id='category_{$category->id}'>";
                echo Html::a(Html::encode($category->name), $category->getUrl(), ['class' => 'category-link']);
                if ($category->getChildren()->count() > 0) {
                    echo Html::a("+", '#', ['class' => 'expand-category']);
                    self::showCategories($category->id, true);
                }
                echo "</li>";
            }
            echo "</ul>";
        }
    }

    /**
     * Возвращает строку пути для текущей категории.
     * @return string
     */
    public function getCategoryPath()
    {
        $path = [$this->name];
        $parent = $this->parent;

        while ($parent) {
            array_unshift($path, $parent->name);
            $parent = $parent->parent;
        }

        return implode(' > ', $path);
    }
}
