<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m190824_082919_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'parent_id'=> $this->integer()->null()
        ]);
        $this->addForeignKey('fk-parent_category_id','{{%category}}','parent_id', '{{%category}}',
            'id', 'CASCADE');
        $this->createIndex('idx-category-parent_id','{{%category}}','parent_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
        $this->dropForeignKey('fk-parent_category_id','{{%category}}');
        $this->dropIndex('idx-category-parent_id','{{%category}}');
    }
}
