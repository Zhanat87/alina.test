<?php

use console\my\yii2\Migration;

class m150930_093255_create_comment_table extends Migration
{

    public function safeUp()
    {
        $this->createTable(
            '{{%comment}}',
            [
                'id' => $this->primaryKey(),
                'email' => $this->string()->notNull(),
                'text' => $this->string()->notNull(),
                'news_id' => $this->integer(),
            ]
        );
        $this->addForeignKey('commentNewsFk', '{{%comment}}', 'news_id', '{{%news}}', 'id');
        echo "create comment table: success up\n";
    }

    public function safeDown()
    {
        $this->dropForeignKey('commentNewsFk', '{{%user}}');
        $this->dropTable('{{%comment}}');
        echo "create comment table: success down\n";
    }

}