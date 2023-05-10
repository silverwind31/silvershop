<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_gallery}}`.
 */
class m230406_054218_create_product_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_gallery}}', [
            'id' => $this->primaryKey(),
            'product_id' =>$this->tinyInteger(10)->notNull(),
            'image'=>$this->string(255)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_gallery}}');
    }
}
