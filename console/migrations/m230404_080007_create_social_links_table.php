<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social_links}}`.
 */
class m230404_080007_create_social_links_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%social_links}}', [
            'id' => $this->primaryKey(),
            'name' => $this ->string(255)->notNull(),
            'class' => $this->string(255)->notNull(),
            'link' => $this->string(255)->notNull(),
            'position'=>$this->tinyInteger(10)->notNull(),
            'order_by'=>$this->tinyInteger(10)->defaultValue(0),
            'status' => $this->tinyInteger(2)->defaultValue(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%social_links}}');
    }
}
