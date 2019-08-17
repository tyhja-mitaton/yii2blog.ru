<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m190817_131028_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'content' => $this->text(),
            'author_id' => $this->integer()->notNull(),
            'date_created' => $this->dateTime()->notNull(),
            'date_updated' => $this->dateTime(),
        ]);

        $this->addForeignKey('fk-post_author_id','{{%post}}','author_id', 'user',
            'id', 'CASCADE');
        $this->createIndex('idx-post-author_id','{{%post}}','author_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
        $this->dropForeignKey('fk-post_author_id','{{%post}}');
        $this->dropIndex('idx-post-author_id','{{%post}}');
    }
}
