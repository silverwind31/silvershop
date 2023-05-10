<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_categories}}`.
 */
class m230404_100125_create_product_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_categories}}', [
            'id' => $this->primaryKey(),
            'parent' => $this->integer(10)->defaultValue(0),
            'name' => $this ->string(255)->notNull(),
            'image' => $this->string(255)->null(),
            'status' => $this->tinyInteger(2)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_categories}}');
    }
}
