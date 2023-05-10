<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%section_slider}}`.
 */
class m230420_100950_create_section_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%section_slider}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255)->notNull(),
            'description'=>$this->string(255)->notNull(),
            'image'=>$this->string(255)->null(),
            'btn_link'=>$this->string(255)->notNull(),
            'btn_text'=>$this->string(255)->notNull(),
            'created_date'=>$this->dateTime()->defaultExpression('NOW()'),
            'status'=>$this->integer(2)->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%section_slider}}');
    }
}
