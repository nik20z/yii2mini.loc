<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m240227_094044_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Создаём таблицу category
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string()->notNull(),
            'alias' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем таблицу category
        $this->dropTable('{{%category}}');
    }
}
