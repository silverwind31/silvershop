<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_char}}`.
 */
class m230416_032945_create_product_char_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_char}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(10)->notNull(),
            'name' => $this->string(255)->notNull(),
            'value'=>$this->string(255)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_char}}');
    }
}
