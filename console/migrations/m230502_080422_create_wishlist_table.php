<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wishlist}}`.
 */
class m230502_080422_create_wishlist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wishlist}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this -> integer() ->notNull(),
            'product_ids'=>$this->string()->notNull(),
            'created_date'=>$this->dateTime()->defaultExpression('NOW()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wishlist}}');
    }
}
