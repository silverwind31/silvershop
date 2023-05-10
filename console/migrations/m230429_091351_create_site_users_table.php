<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_users}}`.
 */
class m230429_091351_create_site_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%site_users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(100)->notNull(),
            'password_reset_token' => $this->string(100)->unique(),
            'email' => $this->string(50)->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'phone' => $this->string(12)->notNull()->unique(),
            'sms_verification' => $this->string(4)->notNull(),

            'fio' => $this->string(255)->null(),
            'district' => $this->integer(255)->null(),
            'region' => $this->integer(255)->null(),
            'address' => $this->string(255)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_users}}');
    }
}
