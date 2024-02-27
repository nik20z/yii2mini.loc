<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m240227_095112_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Создаём таблицу post
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey()->unsigned(),
            'category_id' => $this->integer()->unsigned(),
            'title' => $this->string()->notNull(),
            'excerpt' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'img' => $this->string(),
            'created_at' => $this->dateTime()->notNull(),
            'keywords' => $this->string(),
            'description' => $this->string()
        ]);

        // Создаём индекс category_id
        $this->createIndex(
            'idx-post-category_id',
            'post',
            'category_id'
        );

        // Добавляем внешний ключ category_id
        $this->addForeignKey(
            'fk-post-category_id',
            'post',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем внешний ключ category_id
        $this->dropForeignKey(
            'fk-post-category_id',
            'post'
        );

        // Удаляем индекс category_id
        $this->dropIndex(
            'idx-post-category_id',
            'post'
        );

        // Удаляем таблицу post
        $this->dropTable('{{%post}}');
    }
}
