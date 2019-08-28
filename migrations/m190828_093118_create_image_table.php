<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m190828_093118_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(),
            'path' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
