<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%districts}}`.
 */
class m230428_192857_create_districts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%districts}}', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(255)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%districts}}');
    }
}
