<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%advantages}}`.
 */
class m230419_185339_create_advantages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%advantages}}', [
            'id' => $this->primaryKey(),
            'icon'=>$this->string(255)->notNull(),
            'title'=>$this->string(255)->notNull(),
            'description'=>$this->string(255)->notNull(),
            'order_by'=>$this->integer(10)->null(),
            'status'=>$this->integer(10)->defaultValue(1)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%advantages}}');
    }
}
