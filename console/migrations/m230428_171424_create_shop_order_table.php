<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shop_order}}`.
 */
class m230428_171424_create_shop_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shop_order}}', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(10)->null(),
            'fio'=>$this->string(255)->notNull(),
            'phone'=>$this->string(20)->notNull(),
            'district_id'=>$this->integer(2),
            'region_id'=>$this->integer(2)->notNull(),
            'address'=>$this->string(255)->notNull(),
            'delivery'=>$this->tinyInteger(2)->null(),
            'created_date'=>$this->dateTime()->defaultExpression('NOW()'),
            'status'=>$this->tinyInteger()->defaultValue(1),
            'total_sum'=>$this->string(255)->notNull(),
            'total_products_count'=>$this->string(255)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shop_order}}');
    }
}
