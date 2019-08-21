<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m190821_130457_add_checked_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%post}}', 'checked', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%post}}', 'checked');
    }
}
