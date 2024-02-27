<?php

use yii\db\Migration;
use yii\db\Expression;


/**
 * Class m240227_101506_change_created_at_column_format
 */
class m240227_101506_change_created_at_column_format extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Изменяем тип данных в колонки created_at (к bigint)
        $this->alterColumn(
            'post', 
            'created_at', 
            'bigint unsigned'
        );
        
        // Обновляем данные в created_at (из datetime в timestamp)
        $this->update(
            'post', 
            [
                'created_at' => new Expression('UNIX_TIMESTAMP(created_at)')
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Восстанавливаем тип данных колонки created_at (к datetime)
        $this->alterColumn(
            'post', 
            'created_at', 
            'datetime'
        );
        
        // Восстанавливаем данные в created_at (из timestamp в datetime)
        $this->update(
            'post', 
            [
                'created_at' => new Expression('FROM_UNIXTIME(created_at)')
            ]
        );
    }
}
