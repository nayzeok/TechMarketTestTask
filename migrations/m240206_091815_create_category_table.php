<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m240206_091815_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'parent_id' => $this->integer()->null(),
            'level' => $this->integer()->notNull(), // уровень вложенности
        ]);

        // создаем индекс для колонки `parent_id`
        $this->createIndex(
            '{{%idx-category-parent_id}}',
            '{{%category}}',
            'parent_id'
        );

        // добавляем внешний ключ для таблицы `category`
        $this->addForeignKey(
            '{{%fk-category-parent_id}}',
            '{{%category}}',
            'parent_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        // удаляем внешний ключ
        $this->dropForeignKey(
            '{{%fk-category-parent_id}}',
            '{{%category}}'
        );

        // удаляем индекс
        $this->dropIndex(
            '{{%idx-category-parent_id}}',
            '{{%category}}'
        );

        $this->dropTable('{{%category}}');
    }
}
