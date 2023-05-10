<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_products}}`.
 */
class m230428_172047_create_order_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_products}}', [
            'id' => $this->primaryKey(),
            'order_id'=>$this->integer()->notNull(),
            'product_id'=>$this->integer()->notNull(),
            'quantity'=>$this->integer()->notNull(),
            'sum'=>$this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_products}}');
    }
}
