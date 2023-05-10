<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230405_121714_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()->null(),
            'category_id' =>$this->integer(10)->notNull(),
            'brand_id' =>$this->integer(2)->notNull(),
            'new_price' =>$this->double(10),
            'old_price' =>$this->double(10),
            'new' =>$this->tinyInteger(2)->defaultValue(0),
            'top' =>$this->tinyInteger(2)->defaultValue(0),
            'sale' =>$this->tinyInteger(2)->defaultValue(0),
            'image' =>$this->string(255)->null(),
            'created_date' =>$this->dateTime()->defaultExpression('NOW()'),
            'updated_date' =>$this->dateTime()->defaultExpression("NOW()"),
            'status' => $this->tinyInteger(2)->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
