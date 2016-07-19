<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%credentials}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
			'email_activation_token' => $this->string()->unique(),
			'user_id' => $this->integer()->notNull()->unique(),
			'role'=>$this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
		
		        // creates index for column `modifiedby`
        $this->createIndex(
            'idx-credentials-user_id',
            'credentials',
            'user_id'
        );

		// add foreign key for table `user`
        $this->addForeignKey(
            'fk-credentials-user_id',
            'credentials',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        $this->dropTable('{{%credentials}}');
    }
}
