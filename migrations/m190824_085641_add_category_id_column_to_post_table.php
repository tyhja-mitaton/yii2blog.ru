<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m190824_085641_add_category_id_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%post}}', 'category_id', $this->integer());
        $this->addForeignKey('fk-post_category_id','{{%post}}','category_id', '{{%category}}',
            'id', 'CASCADE');
        $this->createIndex('idx-post-category_id','{{%post}}','category_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%post}}', 'category_id');
        $this->dropForeignKey('fk-post_category_id','{{%post}}');
        $this->dropIndex('idx-post-category_id','{{%post}}');
    }
}
